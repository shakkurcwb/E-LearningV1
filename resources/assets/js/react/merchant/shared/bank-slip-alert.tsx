import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
};

export class BankSlipAlertComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const labelBankSlip = this.props.lang.get('merchant.general.payments.methods.bank_slip');
        const labelStatus = this.props.lang.get('merchant.general.payments.alerts.bank_slip.status');
        const labelInstructions = this.props.lang.get('merchant.general.payments.alerts.bank_slip.instructions');
        return (
            <div className="form-group">
                <div className="alert alert-primary">
                    <h3 className="alert-heading font-w600 my-2">{ labelBankSlip }</h3>
                    <p className="mb-0">{ labelStatus }</p>
                    <p className="mb-0 font-w600">{ labelInstructions }</p>
                </div>
            </div>
        );
    }
}