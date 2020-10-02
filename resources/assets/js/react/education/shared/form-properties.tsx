import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    id: number,
    lang: TranslateService,
    setForm: any,
    form: any,
};

export class FormPropertiesComponent extends React.Component<P, any> {

    constructor(props: P) {
        super(props);
        this.handleTitleInput = this.handleTitleInput.bind(this);
        this.handleTypeInput = this.handleTypeInput.bind(this);
        this.handleDescriptionInput = this.handleDescriptionInput.bind(this);
        this.handleTagsInput = this.handleTagsInput.bind(this);
    }

    handleTitleInput(e: any) {
        const title = e.target.value;
        const form = this.props.form;
        form.title = title;
        this.props.setForm({ form });
    }

    handleTypeInput(e: any) {
        const type = e.target.value;
        const form = this.props.form;
        form.type = type;
        this.props.setForm({ form });
    }

    handleDescriptionInput(e: any) {
        const description = e.target.value;
        const form = this.props.form;
        form.description = description;
        this.props.setForm({ form });
    }

    handleTagsInput(e: any) {
        const tags = e.target.value;
        const form = this.props.form;
        form.tags = tags;
        this.props.setForm({ form });
    }

    render() {
        return (
            <section>
                <div className="form-group">
                    <label>{ this.props.lang.get('education.attributes.form.title') }</label>
                    <input className={ "form-control" }
                        onChange={ this.handleTitleInput }
                        value={ this.props.form.title } />
                </div>
                <div className="form-group">
                    <label>{ this.props.lang.get('education.attributes.form.type') }</label>
                    <select className={ "form-control" }
                        onChange={ this.handleTypeInput }
                        value={ this.props.form.type }
                        disabled={ this.props.form.id ? true : false }>
                        <option></option>
                        <option disabled>Admission</option>
                        <option disabled>Audition</option>
                        <option>Exercise</option>
                        <option>Exam</option>
                    </select>
                </div>
                <div className="form-group">
                    <label>{ this.props.lang.get('education.attributes.form.description') }</label>
                    <textarea className={ "form-control" }
                        onChange={ this.handleDescriptionInput }
                        value={ this.props.form.description } />
                </div>
                { ( this.props.form.type == 'Admission' || this.props.form.type == 'Audition' ) &&
                    <div className="form-group">
                        <label>{ this.props.lang.get('education.attributes.form.tags') }</label>
                        <select className={ "form-control" }
                            onChange={ this.handleTagsInput }
                            value={ this.props.form.tags }
                            disabled={ this.props.form.id ? true : false }>
                            <option></option>
                            <option>Student</option>
                            <option>Tutor</option>
                        </select>
                    </div> }
            </section>
        );
    }

}