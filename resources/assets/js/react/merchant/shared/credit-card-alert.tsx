import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
};

export class CreditCardAlertComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const labelCreditCard = this.props.lang.get('merchant.general.payments.methods.credit_card');
        const labelStatus = this.props.lang.get('merchant.general.payments.alerts.credit_card.status');
        const labelInstructions = this.props.lang.get('merchant.general.payments.alerts.credit_card.instructions');
        return (
            <div className="form-group">
                <div className="alert alert-primary">
                    <h3 className="alert-heading font-w600 my-2">{ labelCreditCard }</h3>
                    <p className="mb-0">{ labelStatus }</p>
                    <p className="mb-0 font-w600">{ labelInstructions }</p>
                </div>
            </div>
        );
    }
}