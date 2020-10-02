import { JsonAdapter } from "./json-adapter.interface";

export class QuestionModel implements JsonAdapter {
    id: number;
    title: string;
    type: string;
    is_matchable: boolean = false;
    show_matches: boolean = false;
    options: any[];
    correct_answers: any[];

    constructor(payload?: Partial<QuestionModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        if (props) {
            this.id = props.id ? props.id : this.id;
            this.title = props.title ? props.title : this.title;
            this.type = props.type ? props.type : this.type;
            this.is_matchable = props.is_matchable ? props.is_matchable : this.is_matchable;
            this.show_matches = props.show_matches ? props.show_matches : this.show_matches;
            this.options = props.options ?
                props.options.map((option: Partial<any>) => {
                    return { key: option.key, value: option.value }
                }) : this.options;
            this.correct_answers = props.correct_answers ? props.correct_answers : this.correct_answers;
        }
        return this;
    }

    toJson(): any {
        return {
            id: this.id,
            title: this.title,
            type: this.type,
            is_matchable: this.is_matchable,
            show_matches: this.show_matches,
            options: this.options,
            correct_answers: this.correct_answers,
        }
    }
}