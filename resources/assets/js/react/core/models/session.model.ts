import { JsonAdapter } from "./json-adapter.interface";

export class SessionModel implements JsonAdapter {
    id: number;
    student: any;
    tutor: any;
    start_at: string;
    end_at: string;
    cost: number;
    additional_info: string;

    constructor(payload?: Partial<SessionModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        return this;
    }

    toJson(): any {
        return {
            tutor_id: this.tutor.id,
            start_at: this.start_at,
            end_at: this.end_at,
            cost: this.cost,
            additional_info: this.additional_info,
        }
    }
}