import * as React from 'react';

import { QuestionPropertiesComponent } from '../shared/question-properties';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    id: number,
    lang: TranslateService,
    setForm: any,
    form: any,
};

export class QuestionsContainerComponent extends React.Component<P, any> {

    constructor(props: P) {
        super(props);
        this.setQuestion = this.setQuestion.bind(this);
        this.clickRemoveQuestion = this.clickRemoveQuestion.bind(this);
    }

    clickRemoveQuestion(idx: number) {
        const form = this.props.form;
        let questions = this.props.form.questions;
        questions.splice(idx, 1);
        form.questions = questions;
        this.props.setForm({ form });
    }

    /** Helpers */
    setQuestion(idx: number, question: any) {
        const form = this.props.form;
        form.questions[idx] = question;
        this.props.setForm({ form });
    }

    render() {
        const { form } = this.props;
        return (
            <section>
                { form.questions.length > 0 &&
                    form.questions.map((question: any, idx: any) => {
                        return (
                            <div className="block block-themed" key={ idx }>
                                <div className="block-header bg-primary">
                                    <h3 className="block-title">Question { idx }</h3>
                                    <div className="block-options">
                                        <button type="button" className="btn-block-option"
                                            data-toggle="block-option"
                                            data-action="content_toggle">
                                            <i className="si si-arrow-up"></i>
                                        </button>
                                        { form.questions.length !== 1 &&
                                            <button type="button" className="btn-block-option"
                                                onClick={ () => this.clickRemoveQuestion(idx) }>
                                                <i className="si si-trash"></i>
                                            </button> }
                                    </div>
                                </div>
                                <div className="block-content">
                                    <QuestionPropertiesComponent
                                        id= { this.props.id }
                                        lang={ this.props.lang }
                                        idx={ idx }
                                        question={ question }
                                        setQuestion={ this.setQuestion }
                                        form={ form }>
                                    </QuestionPropertiesComponent>
                                </div>
                            </div>
                        );
                    })
                }
            </section>
        );
    }

}