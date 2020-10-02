import { PlanModel } from "../../core/models/plan.model";
import { InvoiceModel } from "../../core/models/invoice.model";
import { CreditCardModel } from "../../core/models/credit-card.model";

export type Form = {
    plans: PlanModel[],
    invoice: InvoiceModel,
    creditCard: CreditCardModel,
};

export type Stepper = {
    max: number,
    min: number,
    current: number,
};

export type Loader = {
    loading: boolean,
    sending: boolean,
};

export type Status = {
    submitted: boolean,
    error: boolean,
};

export type S = {
    form: Form,
    errors: any,
    stepper: Stepper,
    loader: Loader,
    status: Status,
};