import { JsonAdapter } from "./json-adapter.interface";

export class PlanModel implements JsonAdapter {
    id: number;
    name: string;
    price: string;
    interval: string;
    frequency: string;
    duration: string;
    credits: string;
    is_recommended: boolean;

    constructor(props?: Partial<PlanModel>) {
        Object.assign(this, props);
    }

    fromJson(props: any): this {
        this.id = props.id;
        this.name = props.name;
        this.price = props.price;
        this.interval = props.interval;
        this.frequency = props.features.frequency;
        this.duration = props.features.duration;
        this.credits = props.features.credits;
        this.is_recommended = props.is_recommended;
        return this;
    }

    toJson(): any {
        // 
    }
}