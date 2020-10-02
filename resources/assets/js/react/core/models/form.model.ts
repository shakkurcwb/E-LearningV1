import { JsonAdapter } from "./json-adapter.interface";

import { QuestionModel } from './question.model';

export class FormModel implements JsonAdapter {
    id: number;
    title: string;
    type: string;
    description: string;
    tags: string;
    questions: QuestionModel[];

    constructor(payload?: Partial<FormModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        if (props) {
            this.id = props.id ? props.id : this.id;
            this.title = props.title ? props.title : this.title;
            this.type = props.type ? props.type : this.type;
            this.description = props.description ? props.description : this.description;
            this.tags = props.tags ? props.tags : this.tags;
            this.questions = props.questions ?
                props.questions.map((question: Partial<QuestionModel>) => {
                    return new QuestionModel().fromJson(question);
                 }) : this.questions;
        }
        return this;
    }

    toJson(): any {
        return {
            title: this.title,
            type: this.type,
            description: this.description,
            tags: this.tags,
            questions: this.questions.map((question: QuestionModel) => {
                return new QuestionModel(question).toJson();
            }),
        }
    }
}