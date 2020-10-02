import { JsonAdapter } from "./json-adapter.interface";

export class CouponModel implements JsonAdapter {
    id: number;
    slug: string;
    discount: number;
    expires_at: Date;

    constructor(payload?: Partial<CouponModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        this.id = props.id ? props.id : this.id;
        this.slug = props.slug ? props.slug : this.slug;
        this.discount = props.discount ? props.discount : this.discount;
        this.expires_at = props.expires_at ? props.expires_at : this.expires_at;
        return this;
    }

    toJson(): any {
        return {
            id: this.id,
        }
    }
}