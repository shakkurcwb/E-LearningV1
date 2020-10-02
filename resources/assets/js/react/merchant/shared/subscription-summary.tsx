import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { SubscriptionModel } from '../../core/models/subscription.model';

type P = {
    lang: TranslateService,
    subscription: SubscriptionModel,
};

export class SubscriptionSummaryComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }

    render() {
        const subscription: SubscriptionModel = this.props.subscription;
        const labelCurrency = this.props.lang.get('general.currency');
        const labelUnitPrice = this.props.lang.get('merchant.general.labels.unit_price');
        const labelQuantity = this.props.lang.get('merchant.general.labels.quantity');
        const labelDiscount = this.props.lang.get('merchant.general.labels.discount');
        const labelTotalPrice = this.props.lang.get('merchant.general.labels.total_price');
        return (
            <div className="form-group">
                <p className="font-w600">
                    { labelUnitPrice }: <span className="text-primary">
                        { labelCurrency } { +subscription.plan.price }
                    </span>
                </p>
                <p className="font-w600">
                    { labelQuantity }: <span className="text-primary">
                        { subscription.quantity }x
                    </span>
                </p>
                { subscription.coupon && subscription.coupon.id &&
                    <p className="font-w600">
                        { labelDiscount }: <span className="text-primary">
                            { labelCurrency } { +subscription.coupon.discount }
                        </span>
                    </p> }
                { subscription.coupon && !subscription.coupon.id &&
                    <p className="font-w600">
                        { labelTotalPrice }: <span className="text-primary">
                            { labelCurrency } { ( +subscription.plan.price * subscription.quantity ) }
                        </span>
                    </p> }
                { subscription.coupon && subscription.coupon.id &&
                    <p className="font-w600">
                        { labelTotalPrice }: <span className="text-primary">
                            { labelCurrency } { ( +subscription.plan.price * subscription.quantity ) - +subscription.coupon.discount }
                        </span>
                    </p> }
            </div>
        );
    }
}