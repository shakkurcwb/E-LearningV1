import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
    quantity: number,
    onChange: any,
};

export class SubscriptionQuantityComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }

    render() {
        const labelChooseQuantity = this.props.lang.get('merchant.forms.subscribe.choose_quantity');
        return (
            <div className="form-group">
                <label>{ labelChooseQuantity }</label>
                <input type="number" className="form-control"
                    value={ this.props.quantity }
                    onChange={ this.props.onChange } />
            </div>
        );
    }
}