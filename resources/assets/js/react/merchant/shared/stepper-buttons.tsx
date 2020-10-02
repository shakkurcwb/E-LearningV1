import * as React from 'react';
import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
    handlePreviousClick?: any,
    handleNextClick: any,
    hiddenPrevious?: boolean,
    hiddenNext?: boolean,
};

export class StepperButtonsComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }
    render() {
        const hiddenPrevious: boolean = this.props.hiddenPrevious ?
            this.props.hiddenPrevious : false;
        const hiddenNext: boolean = this.props.hiddenNext ?
            this.props.hiddenNext : false;
        const labelPrevious = this.props.lang.get('general.previous');
        const labelNext = this.props.lang.get('general.next');
        return (
            <div className="form-group" style={{ display: "flex", justifyContent: "space-between" }}>
                { !hiddenPrevious &&
                    <button type="button"
                        className="btn btn-lg btn-secondary"
                        onClick={ this.props.handlePreviousClick }>
                        { labelPrevious }
                    </button>
                }
                { !hiddenNext &&
                    <button type="button"
                        className="btn btn-lg btn-primary" style={{ alignSelf: "right" }}
                        onClick={ this.props.handleNextClick }>
                        { labelNext }
                    </button>
                }
            </div>
        );
    }
}