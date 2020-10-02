import * as React from 'react';
import * as ReactDOM from 'react-dom';

import { ConfirmationComponent } from '../shared/confirmation';
import { StepperComponent } from './stepper';

import { Step1Component } from './step1';
import { Step2Component } from './step2';
import { Step3Component } from './step3';

import { PageLoader } from '../../shared/components/page-loader.component';
import { ProgressBar } from '../../shared/components/progress-bar.component';

import { TranslateService } from '../../core/services/translate.service';

import { Form, Stepper, Loader, Status, S } from './types';

import { InvoiceModel } from '../../core/models/invoice.model';
import { SubscriptionModel } from '../../core/models/subscription.model';
import { PlanModel } from '../../core/models/plan.model';
import { CreditCardModel } from '../../core/models/credit-card.model';
import { CouponModel } from '../../core/models/coupon.model';

class SubscribePlanComponent extends React.Component<any, S> {

    lang: TranslateService;

    readonly state: S = {
        form: {
            plans: [],
            invoice: new InvoiceModel({
                subscription: new SubscriptionModel({
                    plan: new PlanModel(),
                    coupon: new CouponModel({
                        slug: '',
                    }),
                    quantity: 1,
                }),
            }),
            creditCard: new CreditCardModel({
                number: '4111111111111111',
                cvv: '123',
                fullName: 'AHN BAH PAG',
                expiration: '12/23',
            }),
        },
        errors: {},
        stepper: {
            max: 3,
            min: 1,
            current: 1,
        },
        loader: {
            loading: false,
            sending: false,
        },
        status: {
            submitted: false,
            error: false,
        },
    };

    constructor(props: any) {
        super(props);
        this.lang = new TranslateService();
        this.setForm = this.setForm.bind(this);
        this.setErrors = this.setErrors.bind(this);
        this.setStepper = this.setStepper.bind(this);
        this.setLoader = this.setLoader.bind(this);
        this.setStatus = this.setStatus.bind(this);
    }

    /** Helper */
    protected setForm(form: Partial<Form>) {
        this.setState({ form: { ...this.state.form, ...form } });
    }

    /** Helper */
    protected setErrors(error: any) {
        const errors = this.state.errors;
        Object.assign(errors, error);
        this.setState({ errors });
    }

    /** Helper */
    protected setStepper(stepper: Partial<Stepper>) {
        this.setState({ stepper: { ...this.state.stepper, ...stepper } });
    }

    /** Helper */
    protected setLoader(loader: Partial<Loader>) {
        this.setState({ loader: { ...this.state.loader, ...loader } });
    }

    /** Helper */
    protected setStatus(status: Partial<Status>) {
        this.setState({ status: { ...this.state.status, ...status } });
    }

    render() {
        const { stepper, loader } = this.state;
        const { setForm, setStepper, setLoader, setErrors, setStatus } = this;

        if (this.state.status.submitted) {
            return (
                <ConfirmationComponent lang={ this.lang }
                    error={ this.state.status.error }
                    onSuccess="merchant.alerts.subscriptions.subscribe_success"
                    onError="merchant.alerts.subscriptions.subscribe_failed">
                </ConfirmationComponent>
            );
        }

        return (
            <div>
                <ProgressBar percent={ stepper.current * 33.3 }></ProgressBar>
                <StepperComponent step={ stepper.current }
                    lang={ this.lang }></StepperComponent>

                { loader.loading &&
                    <PageLoader color="primary"></PageLoader> }
                { loader.sending &&
                    <PageLoader color="warning"></PageLoader> }

                { !loader.loading && !loader.sending && stepper.current === 1 &&
                    <Step1Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader }></Step1Component>
                }
                { !loader.loading && !loader.sending && stepper.current === 2 &&
                    <Step2Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader } setErrors={ setErrors }></Step2Component>
                }
                { !loader.loading && !loader.sending && stepper.current === 3 &&
                    <Step3Component { ...this.state } lang={ this.lang }
                        setForm={ setForm } setStepper={ setStepper }
                        setLoader={ setLoader } setStatus={ setStatus }></Step3Component>
                }
            </div>
        );
    }
}

if (document.getElementById('subscribe-plan')) {
    ReactDOM.render(<SubscribePlanComponent />, document.getElementById('subscribe-plan'));
}