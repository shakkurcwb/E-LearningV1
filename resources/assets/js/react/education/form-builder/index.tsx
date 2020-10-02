import * as React from 'react';
import * as ReactDOM from 'react-dom';

import { FormPropertiesComponent } from '../shared/form-properties';
import { FormToolbarComponent } from '../shared/form-toolbar';
import { QuestionsContainerComponent } from '../shared/questions-container';

import { PageLoader } from '../../shared/components/page-loader.component';

import { TranslateService } from '../../core/services/translate.service';
import { WindowService } from '../../core/services/window.service';

import { EducationService } from '../education.service';

import { FormModel } from '../../core/models/form.model';

import Swal from 'sweetalert2';

class FormBuilderComponent extends React.Component<any, any> {

    dialog: any;
    lang: TranslateService;
    id: number;

    readonly state: any = {
        form: {
            title: '',
            type: '',
            description: '',
            tags: '',
            questions: [
                {
                    title: '',
                    type: '',
                    is_matchable: false,
                    show_matches: false,
                    options: [],
                    answer: [],
                },
            ],
        },
        errors: {},
        loader: {
            loading: false,
            sending: false,
        },
        status: {
            submitted: false,
            error: false,
        },
    };

    constructor(props: any) {
        super(props);
        this.id = WindowService.getElementValueByID('form_id');
        this.lang = new TranslateService();
        this.dialog = Swal;

        this.clickSubmit = this.clickSubmit.bind(this);
        this.setForm = this.setForm.bind(this);
        this.setErrors = this.setErrors.bind(this);
        this.setLoader = this.setLoader.bind(this);
        this.setStatus = this.setStatus.bind(this);
    }

    componentDidMount() {
        this.fetchDependencies();
    }

    private fetchDependencies() {
        if (this.id) {
            this.setLoader({ loading: true });
            const p = EducationService.getForm(this.id);
            p.then((form: FormModel) => {
                this.setForm({ ...form });
            });
            p.catch((error: any) => {
                console.error('Error Loading Form ' + this.id, error);
            });
            p.finally(() => {
                this.setLoader({ loading: false });
            });
        }
    }

    clickSubmit() {
        this.setLoader({ sending: true });
        if (this.id) {
            const p = EducationService.updateForm(this.id, this.state.form);
            p.then((res: any) => {
                this.dialog.fire('Success!', 'Your form was updated.', 'success');
            });
            p.catch((error) => {
                this.dialog.fire('Error!', 'Your form was NOT updated.', 'error');
            });
            p.finally(() => {
                this.setLoader({ sending: false });
            });
        } else {
            const p = EducationService.storeForm(this.state.form);
            p.then((res: any) => {
                this.dialog.fire('Success!', 'Your form was created.', 'success');
            });
            p.catch((error) => {
                this.dialog.fire('Error!', 'Your form was NOT created.', 'error');
            });
            p.finally(() => {
                this.setLoader({ sending: false });
            });
        }
    }

    /** Helper */
    protected setForm(form: Partial<any>) {
        this.setState({ form: { ...this.state.form, ...form } });
    }

    /** Helper */
    protected setErrors(error: any) {
        const errors = this.state.errors;
        Object.assign(errors, error);
        this.setState({ errors });
    }

    /** Helper */
    protected setLoader(loader: Partial<any>) {
        this.setState({ loader: { ...this.state.loader, ...loader } });
    }

    /** Helper */
    protected setStatus(status: Partial<any>) {
        this.setState({ status: { ...this.state.status, ...status } });
    }

    render() {
        const { form } = this.state;
        if (this.state.loader.loading) {
            return <PageLoader color="primary"></PageLoader>;
        }
        if (this.state.loader.sending) {
            return <PageLoader color="warning"></PageLoader>;
        }
        return (
            <div>
                <FormPropertiesComponent
                    id={ this.id }
                    lang={ this.lang }
                    setForm={ this.setForm }
                    form={ form }
                ></FormPropertiesComponent>
                <FormToolbarComponent
                    id={ this.id }
                    lang={ this.lang }
                    setForm={ this.setForm }
                    form={ form }>
                </FormToolbarComponent>
                <QuestionsContainerComponent
                    id={ this.id }
                    lang={ this.lang }
                    setForm={ this.setForm }
                    form={ form }>
                </QuestionsContainerComponent>
                <div className="form-group">
                    <button className="btn btn-primary"
                        onClick={ this.clickSubmit }>{ this.lang.get('general.submit') }</button>
                </div>
            </div>
        );
    }
}

if (document.getElementById('form-builder')) {
    ReactDOM.render(<FormBuilderComponent />, document.getElementById('form-builder'));
}