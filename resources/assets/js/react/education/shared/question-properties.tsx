import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    id: number,
    lang: TranslateService,
    idx: number,
    question: any,
    setQuestion: any,
    form: any,
};

export class QuestionPropertiesComponent extends React.Component<P, any> {

    constructor(props: P) {
        super(props);
        this.handleTitleInput = this.handleTitleInput.bind(this);
        this.handleTypeInput = this.handleTypeInput.bind(this);
        this.handleIsMatchableInput = this.handleIsMatchableInput.bind(this);
        this.handleShowMatchesInput = this.handleShowMatchesInput.bind(this);
        this.handleOptionKeyInput = this.handleOptionKeyInput.bind(this);
        this.handleOptionValueInput = this.handleOptionValueInput.bind(this);
        this.handleCorrectAnswersInput = this.handleCorrectAnswersInput.bind(this);
        this.clickRemoveOption = this.clickRemoveOption.bind(this);
        this.clickAddOption = this.clickAddOption.bind(this);
    }

    handleTitleInput(e: any) {
        const title = e.target.value;
        const question = this.props.question;
        question.title = title;
        this.props.setQuestion(this.props.idx, question);
    }

    handleTypeInput(e: any) {
        const type = e.target.value;
        if (type) {
            const question = this.props.question;
            question.type = type;
            this.props.setQuestion(this.props.idx, question);
        }
    }

    handleIsMatchableInput(e: any) {
        const is_matchable = e.target.checked;
        const question = this.props.question;
        question.is_matchable = is_matchable;
        this.props.setQuestion(this.props.idx, question);
    }

    handleShowMatchesInput(e: any) {
        const show_matches = e.target.checked;
        const question = this.props.question;
        question.show_matches = show_matches;
        this.props.setQuestion(this.props.idx, question);
    }

    handleOptionKeyInput(idx: number, e: any) {
        const key = e.target.value;
        const question = this.props.question;
        question.options[idx].key = key;
        this.props.setQuestion(this.props.idx, question);
    }

    handleOptionValueInput(idx: number, e: any) {
        const value = e.target.value;
        const question = this.props.question;
        question.options[idx].value = value;
        this.props.setQuestion(this.props.idx, question);
    }

    handleCorrectAnswersInput(e: any) {
        const options = e.target.options;
        const answers = [];
        for (var i = 0, l = options.length; i < l; i++) {
            if (options[i].selected) {
                answers.push(options[i].value);
            }
        }
        if (answers.length > 0) {
            const question = this.props.question;
            question.correct_answers = answers;
            this.props.setQuestion(this.props.idx, question);
        }
    }

    clickRemoveOption(idx: number) {
        const question = this.props.question;
        question.options.splice(idx, 1);
        this.props.setQuestion({ question });
    }

    clickAddOption() {
        const question = this.props.question;
        question.options.push({
            key: 'key_' + question.options.length,
            value: 'Answer ' + question.options.length,
        });
        this.props.setQuestion({ question });
    }

    render() {
        const { question } = this.props;
        let showOptions = false
        switch(question.type) {
            case 'Short': case 'Link': case 'Text':
                default: showOptions = false; break;
            case 'Select': case 'Check':
                showOptions = true;
        }
        console.log(question);
        return (
            <section>
                <div className="form-group">
                    <label>{ this.props.lang.get('education.attributes.question.title') }</label>
                    <input className={ "form-control" }
                        onChange={ this.handleTitleInput }
                        value={ question.title } />
                </div>
                <div className="form-group">
                    <label>{ this.props.lang.get('education.attributes.question.type') }</label>
                    <select className={ "form-control" }
                        onChange={ this.handleTypeInput }
                        value={ question.type }>
                        <option></option>
                        <option>Short</option>
                        <option>Link</option>
                        <option>Text</option>
                        <option>Select</option>
                        <option>Check</option>
                    </select>
                </div>
                { showOptions
                    && this.props.form.type !== 'Exam'
                    && this.props.form.type !== 'Exercise' &&
                    <div className="form-group">
                        <div className="form-check form-check-inline">
                            <input className="form-check-input"
                                type="checkbox"
                                value="1"
                                checked={ question.is_matchable ? true : false }
                                onChange={ this.handleIsMatchableInput }
                                id="is_matchable" />
                            <label className="form-check-label"
                                htmlFor="is_matchable">{ this.props.lang.get('education.attributes.question.is_matchable') }</label>
                        </div>
                        { question.is_matchable &&
                            <div className="form-check form-check-inline">
                                <input className="form-check-input"
                                    type="checkbox"
                                    value="1"
                                    checked={ question.show_matches ? true : false }
                                    onChange={ this.handleShowMatchesInput }
                                    id="show_matches" />
                                <label className="form-check-label"
                                    htmlFor="show_matches">{ this.props.lang.get('education.attributes.question.show_matches') }</label>
                        </div> }
                    </div> }
                { showOptions &&
                    <div>
                        <div className="form-group">
                            <label>{ this.props.lang.get('education.attributes.question.options') }
                                <button className="ml-2 btn btn-primary btn-sm btn-rounded"
                                    onClick={ () => this.clickAddOption() }>
                                    <i className="fa fa-plus"></i>
                                </button>
                            </label>
                            { question.options.map((option: any, idx: number) => {
                                return (
                                    <div className="form-group form-row" key={ idx }>
                                        <div className="col-4">
                                            <input type="text"
                                                className={ "form-control" }
                                                onChange={ (e: any) => this.handleOptionKeyInput(idx, e) }
                                                value={ option.key }
                                                placeholder="example" />
                                        </div>
                                        <div className="col-7">
                                            <input type="text"
                                                className={ "form-control" }
                                                onChange={ (e: any) => this.handleOptionValueInput(idx, e) }
                                                value={ option.value }
                                                placeholder="Example Label" />
                                        </div>
                                        <div className="col-1">
                                            <button className="mx-1 btn btn-secondary btn-sm btn-rounded"
                                                onClick={ () => this.clickRemoveOption(idx) }>
                                                <i className="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                );
                            }) }
                        </div>
                        { ( this.props.form.type === 'Exercise' || this.props.form.type === 'Exam' ) &&
                            <div className="form-group">
                                <label>{ this.props.lang.get('education.attributes.question.correct_answers') }</label>
                                <select className={ "form-control" }
                                    multiple={ true }
                                    onChange={ this.handleCorrectAnswersInput }
                                    value={ question.correct_answers }>
                                    <option></option>
                                    { question.options.map((option: any, idx: number) => {
                                        return (
                                            <option key={ 'answer_' + idx } value={ option.key }>{ option.value }</option>
                                        );
                                    }) }
                                </select>
                                </div> }
                    </div> }
            </section>
        );
    }

}