import * as React from 'react';

import { PlanSummaryComponent } from '../shared/plan-summary';
import { SubscriptionSummaryComponent } from '../shared/subscription-summary';
import { InvoiceSummaryComponent } from '../shared/invoice-summary';
import { CreditCardSummaryComponent } from '../shared/credit-card-summary';

import { StepperButtonsComponent } from '../shared/stepper-buttons';

import { MerchantService } from '../merchant.service';

import { InvoiceModel } from '../../core/models/invoice.model';
import { SubscriptionModel } from '../../core/models/subscription.model';
import { PlanModel } from '../../core/models/plan.model';
import { CreditCardModel } from '../../core/models/credit-card.model';

export class Step3Component extends React.Component<any, any> {
    constructor(props: any) {
        super(props);
        this.handlePreviousClick = this.handlePreviousClick.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this);
    }

    protected handlePreviousClick(e: any) {
        this.props.setStepper({ current: 2 });
    }

    protected handleNextClick(e: any) {
        this.props.setLoader({ sending: true });
        const p = MerchantService.subscribePlan(this.props.form.invoice);
        p.then((res) => {
            this.props.setStatus({ submitted: true });
        }).catch((error: any) => {
            this.props.setStatus({ submitted: true, error: true });
        }).then(() => {
            this.props.setLoader({ sending: false });
        });
    }

    render() {
        const invoice: InvoiceModel = this.props.form.invoice;
        const subscription: SubscriptionModel = invoice.subscription;
        const plan: PlanModel = subscription.plan;
        const creditCard: CreditCardModel = this.props.form.creditCard;
        const labelConfirmation = this.props.lang.get('merchant.forms.subscribe.confirm_subscription');
        return (
            <section>
                <PlanSummaryComponent
                    lang={ this.props.lang }
                    plan={ plan }>
                </PlanSummaryComponent>
                <SubscriptionSummaryComponent
                    lang={ this.props.lang }
                    subscription={ subscription }>
                </SubscriptionSummaryComponent>
                <InvoiceSummaryComponent
                    lang={ this.props.lang }
                    invoice={ invoice }>
                </InvoiceSummaryComponent>
                <CreditCardSummaryComponent
                    lang={ this.props.lang }
                    creditCard={ creditCard }>
                </CreditCardSummaryComponent>
                <p className="text-success">{ labelConfirmation }</p>
                <StepperButtonsComponent
                    lang={ this.props.lang }
                    handlePreviousClick={ this.handlePreviousClick }
                    handleNextClick={ this.handleNextClick }>
                </StepperButtonsComponent>
            </section>
        );
    }
}

