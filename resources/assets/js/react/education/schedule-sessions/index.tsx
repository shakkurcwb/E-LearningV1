import * as React from 'react';
import * as ReactDOM from 'react-dom';

import { TranslateService } from '../../core/services/translate.service';

import { ProgressBar } from '../../shared/components/progress-bar.component';
import { PageLoader } from '../../shared/components/page-loader.component';

import { StepperComponent } from './stepper';
import { Step1Component } from './step1';
import { Step2Component } from './step2';
import { Step3Component } from './step3';

import { ConfirmationComponent } from '../../merchant/shared/confirmation';

class ScheduleSessionsComponent extends React.Component<any, any> {

    lang: TranslateService;

    readonly state: any = {
        form: {
            sessions: [],
            session: {},
            tutors: [],
            tutor: {},
            student: {},
            is_trial: false,
            additional_info: '',
        },
        errors: {},
        stepper: {
            max: 3,
            min: 1,
            current: 1,
        },
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
        this.lang = new TranslateService();
        this.setForm = this.setForm.bind(this);
        this.setErrors = this.setErrors.bind(this);
        this.setStepper = this.setStepper.bind(this);
        this.setLoader = this.setLoader.bind(this);
        this.setStatus = this.setStatus.bind(this);
    }

    /** Helper */
    protected setForm(form: Partial<any>) {
        this.setState({ form: { ...this.state.form, ...form } });
    }

    /** Helper */
    protected setErrors(errors: any) {
        this.setState({ errors });
    }

    /** Helper */
    protected setStepper(stepper: Partial<any>) {
        this.setState({ stepper: { ...this.state.stepper, ...stepper } });
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
        const { stepper, loader, errors } = this.state;
        const { setForm, setStepper, setLoader, setErrors, setStatus } = this;

        if (this.state.status.submitted) {
            return (
                <ConfirmationComponent lang={ this.lang }
                    error={ false }
                    onSuccess="education.alerts.sessions.schedule_success"
                    onError="education.alerts.sessions.schedule_failed">
                </ConfirmationComponent>
            );
        }

        return (
            <div>
                <ProgressBar percent={ stepper.current * 33.3 }></ProgressBar>
                <StepperComponent step={ stepper.current }
                    lang={ this.lang }></StepperComponent>

                { loader.loading &&
                    <PageLoader color="primary"></PageLoader> }
                { loader.sending &&
                    <PageLoader color="warning"></PageLoader> }

                { Object.keys(errors).length > 0 &&
                    <div className="alert alert-danger alert-dismissable mt-4 text-center" role="alert">
                        <p className="mb-0 font-w600">Something Wrong Happened. Please, Check Your Data.</p>
                    </div> }

                { !loader.loading && !loader.sending && stepper.current === 1 &&
                    <Step1Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader }></Step1Component> }
                { !loader.loading && !loader.sending && stepper.current === 2 &&
                    <Step2Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader }></Step2Component> }
                { !loader.loading && !loader.sending && stepper.current === 3 &&
                    <Step3Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader }
                        setStatus={ setStatus }
                        setErrors={ setErrors }></Step3Component> }

            </div>
        );
    }

}

if (document.getElementById('schedule-sessions')) {
    ReactDOM.render(<ScheduleSessionsComponent />, document.getElementById('schedule-sessions'));
}