import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
    onSuccess: string,
    onError: string,
    error: boolean,
};

export class ConfirmationComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const lang = this.props.lang;
        if (this.props.error) {
            return <h1 className="py-4 text-danger text-center">{ lang.get(this.props.onError) }</h1>;
        } else {
            return <h1 className="py-4 text-success text-center">{ lang.get(this.props.onSuccess) }</h1>;
        }
    }
}