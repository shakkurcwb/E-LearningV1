import * as React from 'react';

import { PlanSelectionComponent } from '../shared/plan-selection';
import { PlanSummaryComponent } from '../shared/plan-summary';
import { SubscriptionQuantityComponent } from '../shared/subscription-quantity';
import { SubscriptionSummaryComponent } from '../shared/subscription-summary';
import { StepperButtonsComponent } from '../shared/stepper-buttons';

import { MerchantService } from '../merchant.service';

import { PlanModel } from '../../core/models/plan.model';
import { InvoiceModel } from '../../core/models/invoice.model';
import { SubscriptionModel } from '../../core/models/subscription.model';

export class Step1Component extends React.Component<any, any> {
    constructor(props: any) {
        super(props);
        this.handlePlanSelection = this.handlePlanSelection.bind(this);
        this.handleQuantityInput = this.handleQuantityInput.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this);
    }

    /** ngOnInit */
    componentDidMount() {
        if (this.props.form.plans.length === 0) {
            this.fetchDependencies();
        }
    }

    private fetchDependencies() {
        this.props.setLoader({ loading: true });
        const p = MerchantService.getPlans();
        p.then((plans: PlanModel[]) => {
            this.props.setForm({ plans });
        }).then(() => {
            this.props.setLoader({ loading: false });
        });
    }

    protected handlePlanSelection(e: any) {
        const plan: PlanModel = this.props.form.plans.find((plan: PlanModel) => plan.id === +e.target.value);
        if (plan) {
            const invoice: InvoiceModel = this.props.form.invoice;
            invoice.subscription.plan = plan;
            invoice.subscription.quantity = 1;
            this.props.setForm({ invoice })
        }
    }

    protected handleQuantityInput(e: any) {
        const quantity = e.target.value;
        if (quantity > 0) {
            const invoice: InvoiceModel = this.props.form.invoice;
            invoice.subscription.quantity = quantity;
            this.props.setForm({ invoice })
        }
    }

    protected handleNextClick(e: any) {
        this.props.setStepper({ current: 2 });
    }

    render() {
        const plans: PlanModel[] = this.props.form.plans;
        const invoice: InvoiceModel = this.props.form.invoice;
        const subscription: SubscriptionModel = invoice.subscription;
        const plan: PlanModel = subscription.plan;
        return (
            <section>
                <PlanSelectionComponent
                    lang={ this.props.lang }
                    onChange={ this.handlePlanSelection }
                    plan={ plan } plans={ plans }>
                </PlanSelectionComponent>
                { plan.id &&
                    <PlanSummaryComponent
                        lang={ this.props.lang }
                        plan={ plan }>
                    </PlanSummaryComponent>
                }
                { plan.frequency === 'Unique' &&
                    <SubscriptionQuantityComponent
                        lang={ this.props.lang }
                        onChange={ this.handleQuantityInput }
                        quantity={ subscription.quantity }>
                    </SubscriptionQuantityComponent>
                }
                { plan.price && subscription.quantity &&
                    <SubscriptionSummaryComponent
                        lang={ this.props.lang }
                        subscription={ subscription }>
                    </SubscriptionSummaryComponent>
                }
                <StepperButtonsComponent
                    lang={ this.props.lang }
                    hiddenPrevious={ true }
                    hiddenNext={ plan.id ? false : true }
                    handleNextClick={ this.handleNextClick }>
                </StepperButtonsComponent>
            </section>
        );
    }
}

