import * as React from 'react';

import { SubscriptionSummaryComponent } from '../shared/subscription-summary';
import { CouponInputComponent } from '../shared/coupon-input';
import { PaymentMethodSelectionComponent } from '../shared/payment-method-selection';
import { BankSlipAlertComponent } from '../shared/bank-slip-alert';
import { CreditCardAlertComponent } from '../shared/credit-card-alert';
import { CreditCardInputComponent } from '../shared/credit-card-input';
import { CreditCardFooterComponent } from '../shared/credit-card-footer';
import { StepperButtonsComponent } from '../shared/stepper-buttons';

import { PlanModel } from '../../core/models/plan.model';
import { InvoiceModel } from '../../core/models/invoice.model';
import { SubscriptionModel } from '../../core/models/subscription.model';
import { PaymentMethod } from '../../core/models/payment-method.enum';
import { CreditCardModel } from '../../core/models/credit-card.model';
import { CouponModel } from '../../core/models/coupon.model';

import { MerchantService } from '../merchant.service';

export class Step2Component extends React.Component<any, any> {

    readonly errors: any[] = [];
    
    readonly state: any = {
        couponBag: {
            show: false,
            error: false,
            msg: null,
        },
    }

    constructor(props: any) {
        super(props);
        this.handlePreviousClick = this.handlePreviousClick.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this);
        this.shouldHiddenNext = this.shouldHiddenNext.bind(this);
        this.handlePaymentMethodSelection = this.handlePaymentMethodSelection.bind(this);
        this.handleCouponInput = this.handleCouponInput.bind(this);
        this.validateCoupon = this.validateCoupon.bind(this);
    }

    protected handlePreviousClick(e: any) {
        this.props.setStepper({ current: 1 });
    }

    protected handleNextClick(e: any) {
        const invoice: InvoiceModel = this.props.form.invoice;
        const creditCard: CreditCardModel = this.props.form.creditCard;
        switch(invoice.method) {
            case PaymentMethod.bankSlip:
                // Navigate
                this.props.setStepper({ current: 3 });
                return;
            case PaymentMethod.creditCard:
                this.props.setLoader({ sending: true });
                // Validate Credit Card
                const validator = creditCard.validate();
                if (validator.valid()) {
                    // Generate Token
                    creditCard.tokenize(validator, (response: any) => {
                        // REMOVE IT ON PRODUCTION
                        console.log(response);
                        if (!response.id) {
                            this.props.setErrors({ iugu: "No response from the payment gateway provider. Please try again in few minutes." });
                        } else {
                            // Update Token on Invoice
                            invoice.ccToken = response.id;
                            this.props.setForm({ invoice });
                            // Navigate
                            this.props.setStepper({ current: 3 });
                        }
                        this.props.setLoader({ sending: false });
                    });
                    return;
                } else {
                    const errors = validator.errors();
                    Object.keys(errors).forEach((key: string) => {
                        this.props.setErrors({ [key]: errors[key] });
                    });
                    return;
                }
        }
    }

    private shouldHiddenNext() {
        if (!this.props.form.invoice.method) return true;
        return false;
    }

    protected handlePaymentMethodSelection(e: any) {
        const method: PaymentMethod = e.target.value;
        if (method) {
            const invoice = this.props.form.invoice;
            invoice.method = method;
            this.props.setForm({ invoice });
        }
    }

    protected handleCouponInput(e: any) {
        const slug: string = e.target.value;
        const invoice = this.props.form.invoice;
        const subscription = invoice.subscription;
        const coupon = subscription.coupon;
        coupon.slug = slug;
        subscription.coupon = coupon;
        invoice.subscription = subscription;
        this.props.setForm({ invoice });
    }

    protected validateCoupon() {
        const coupon: CouponModel = this.props.form.invoice.subscription.coupon;
        const p = MerchantService.getCouponBySlug(coupon);
        const couponBag = this.state.couponBag;
        p.then((coupon: CouponModel) => {
            const invoice = this.props.form.invoice;
            const subscription = invoice.subscription;
            subscription.coupon = coupon;
            invoice.subscription = subscription;
            this.props.setForm({ invoice });

            couponBag.error = false;
            couponBag.msg = this.props.lang.get('merchant.alerts.coupons.valid');
            couponBag.show = true;
            this.setState({ couponBag });
        });
        p.catch((error: any) => {
            couponBag.error = true;
            couponBag.msg = this.props.lang.get('merchant.alerts.coupons.invalid');
            couponBag.show = true;
            this.setState({ couponBag });
        });
    }

    render() {
        const invoice: InvoiceModel = this.props.form.invoice;
        const subscription: SubscriptionModel = invoice.subscription;
        const plan: PlanModel = subscription.plan;
        const coupon: CouponModel = subscription.coupon;
        const creditCard: CreditCardModel = this.props.form.creditCard;
        const couponBag = this.state.couponBag;
        return (
            <section>
                <div className="form-group">
                    <h1 className="text-muted">{ plan.name }</h1>
                </div>
                <SubscriptionSummaryComponent
                    lang={ this.props.lang }
                    subscription={ subscription }>
                </SubscriptionSummaryComponent>
                <CouponInputComponent
                    lang={ this.props.lang }
                    coupon={ coupon }
                    onChange={ this.handleCouponInput }
                    validateCoupon={ this.validateCoupon }
                ></CouponInputComponent>
                { couponBag.show &&
                    <div className="form-group mt-2">
                        <div className={ "alert alert-" + ( couponBag.error ? 'danger' : 'success' ) }>
                            <h3 className="alert-heading font-w600 my-2">{ couponBag.msg }</h3>
                        </div>
                    </div> }
                <hr />
                <PaymentMethodSelectionComponent
                    lang={ this.props.lang }
                    paymentMethod={ invoice.method }
                    onChange={ this.handlePaymentMethodSelection }>
                </PaymentMethodSelectionComponent>
                { invoice.method === PaymentMethod.bankSlip &&
                    <div>
                        <BankSlipAlertComponent
                            lang={ this.props.lang }>
                        </BankSlipAlertComponent>
                    </div>
                }
                { invoice.method === PaymentMethod.creditCard &&
                    <div>
                        <CreditCardAlertComponent
                            lang={ this.props.lang }>
                        </CreditCardAlertComponent>
                        <CreditCardInputComponent
                            lang={ this.props.lang }
                            creditCard={ creditCard }
                            setForm={ this.props.setForm }
                            errors={ this.props.errors }>
                        </CreditCardInputComponent>
                        <CreditCardFooterComponent
                            lang={ this.props.lang }>
                        </CreditCardFooterComponent>
                    </div>
                }
                <StepperButtonsComponent
                    lang={ this.props.lang }
                    handlePreviousClick={ this.handlePreviousClick }
                    hiddenNext={ this.shouldHiddenNext() }
                    handleNextClick={ this.handleNextClick }>
                </StepperButtonsComponent>
            </section>
        );
    }
}