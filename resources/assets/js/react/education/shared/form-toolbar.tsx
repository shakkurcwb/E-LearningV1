import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    id: number,
    lang: TranslateService,
    setForm: any,
    form: any,
};

export class FormToolbarComponent extends React.Component<P, any> {

    constructor(props: P) {
        super(props);
        this.clickAddQuestion = this.clickAddQuestion.bind(this);
    }

    clickAddQuestion(e: any) {
        const form = this.props.form;
        let questions = this.props.form.questions;
        questions.push({
            title: '',
            type: '',
            options: [
                {
                    key: 'key_0',
                    value: 'Answer 0',
                }
            ],
            answer: [],
        });
        form.questions = questions;
        this.props.setForm({ form });
    }

    render() {
        return (
            <section>
                <div className="form-group">
                    <button className="btn btn-primary btn-sm"
                        onClick={ this.clickAddQuestion }>
                        <i className="fa fa-plus circle mr-1"></i>
                        { this.props.lang.get('education.forms.form.toolbar.add') }
                    </button>
                </div>
            </section>
        );
    }

}