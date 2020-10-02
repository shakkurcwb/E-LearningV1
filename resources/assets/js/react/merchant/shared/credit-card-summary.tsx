import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { CreditCardModel } from '../../core/models/credit-card.model';

type P = {
    lang: TranslateService,
    creditCard: CreditCardModel,
};

export class CreditCardSummaryComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const creditCard: CreditCardModel = this.props.creditCard;
        const labelNumber = this.props.lang.get('merchant.attributes.credit_card.number');
        const maskedNumber = creditCard.number.replace(/.(?=.{4})/g, 'x');
        return (
            <div className="form-group">
                <p className="font-w600">
                    { labelNumber }: <span className="text-primary">
                        { maskedNumber }
                    </span>
                </p>
            </div>
        );
    }
}