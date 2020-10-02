import { JsonAdapter } from "./json-adapter.interface";

import { PlanModel } from "./plan.model";
import { CouponModel } from "./coupon.model";

export class SubscriptionModel implements JsonAdapter {
    id: number;
    plan: PlanModel;
    coupon?: CouponModel;
    quantity: number;
    discount: number;

    constructor(payload?: Partial<SubscriptionModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        return this;
    }

    toJson(): any {
        return {
            id: this.id,
            plan: this.plan.toJson(),
            coupon: this.coupon.toJson(),
            quantity: this.quantity,
            discount: this.discount,
        }
    }
}