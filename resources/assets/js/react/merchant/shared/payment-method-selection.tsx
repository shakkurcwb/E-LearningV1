import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { PaymentMethod } from '../../core/models/payment-method.enum';
import { FormStyle } from '../../core/models/form-style.enum';

type P = {
    lang: TranslateService,
    paymentMethod: PaymentMethod,
    onChange: any,
};

export class PaymentMethodSelectionComponent extends React.Component<any, any> {
    constructor(props: any) {
        super(props);
    }
    render() {
        const labelChoosePaymentMethod = this.props.lang.get(
            'merchant.forms.subscribe.choose_payment_method'
        );
        const methods = Object.keys(PaymentMethod).map((key: string) => {
            return { key, value: PaymentMethod[key] };
        });
        const style = this.props.paymentMethod ? FormStyle.valid : FormStyle.invalid;
        return (
            <div className="form-group">
                <label>{ labelChoosePaymentMethod }</label>
                <select className={ "form-control " + style }
                    onChange={ this.props.onChange }
                    value={ this.props.paymentMethod }>
                        <option></option>
                        { methods.map(
                            (method: any, idx: number) => {
                                return <option key={ method.key }
                                    value={ method.value }>{ this.props.lang.get(
                                        'merchant.general.payments.methods.' + method.value
                                    ) }</option>
                            }) }
                </select>
            </div>
        );
    }
}