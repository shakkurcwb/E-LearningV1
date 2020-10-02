import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
};

export class CreditCardFooterComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const iuguLink: string = process.env.MIX_IUGU_LINK;
        return (
            <div className="form-group" style={{ display: "flex", justifyContent: "space-between" }}>
                <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/cc-icons.e8f4c6b4db3cc0869fa93ad535acbfe7.png" />
                <a target="_blank" href={ iuguLink }>
                    <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/payments-by-iugu.1df7caaf6958f1b5774579fa807b5e7f.png" />
                </a>
            </div>
        );
    }
}