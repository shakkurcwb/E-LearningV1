import { JsonAdapter } from "./json-adapter.interface";

import { SubscriptionModel } from "./subscription.model";
import { PaymentMethod } from "./payment-method.enum";

export class InvoiceModel implements JsonAdapter {
    id: number;
    subscription: SubscriptionModel;
    method: PaymentMethod;
    ccToken: string;
    slipCode: string;

    constructor(payload?: Partial<InvoiceModel>) {
        Object.assign(this, payload);
    }

    fromJson(props: any): this {
        return this;
    }

    toJson(): any {
        return {
            plan_id: this.subscription.plan.id,
            coupon_id: this.subscription.coupon.id,
            quantity: this.subscription.quantity,
            method: this.method,
            cc_token: this.ccToken,
        }
    }
}