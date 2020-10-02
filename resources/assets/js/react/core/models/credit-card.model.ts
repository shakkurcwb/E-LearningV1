import Iugu from '../../core/services/iugu.adapter';

export class CreditCardModel {
    number: string;
    expiration: string;
    cvv: string;
    fullName: string;

    private Iugu: any = Iugu;

    constructor(payload?: Partial<CreditCardModel>) {
        Object.assign(this, payload);
    }

    get firstName(): string {
        return this.fullName ? this.fullName : null;
    }

    get lastName(): string {
        return this.fullName ? this.fullName : null;
    }

    get expirationMonth(): string {
        return this.expiration ? this.expiration.substr(0, 2) : null;
    }

    get expirationYear(): string {
        return this.expiration ? this.expiration.substr(3) : null;
    }

    validate() {
        return this.Iugu.CreditCard(
            this.number,
            this.expirationMonth, this.expirationYear,
            this.firstName, this.lastName,
            this.cvv
        );
    }

    tokenize(validator: any, closure: any) {
        this.Iugu.createPaymentToken(validator, closure);
    }

}