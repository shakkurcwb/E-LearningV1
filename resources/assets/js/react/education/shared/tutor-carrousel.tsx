import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

type P = {
    id: number,
    lang: TranslateService,
    setForm: any,
    form: any,
};

export class TutorCarrouselComponent extends React.Component<P, any> {

    constructor(props: P) {
        super(props);
    }

    render() {
        return (
            <h1>hello</h1>
        );
    }

}