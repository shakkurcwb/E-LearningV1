import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { InvoiceModel } from '../../core/models/invoice.model';

type P = {
    lang: TranslateService,
    invoice: InvoiceModel,
};

export class InvoiceSummaryComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const invoice: InvoiceModel = this.props.invoice;
        const labelPaymentMethod = this.props.lang.get('merchant.general.labels.payment_method');
        const labelMethod = this.props.lang.get('merchant.general.payments.methods.' + invoice.method);
        return (
            <div className="form-group">
                <p className="font-w600">
                    { labelPaymentMethod }: <span className="text-primary">
                        { labelMethod }
                    </span>
                </p>
            </div>
        );
    }
}