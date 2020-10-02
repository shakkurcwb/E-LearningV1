import * as React from 'react';

import { PlanModel } from '../../core/models/plan.model';
import { TranslateService } from '../../core/services/translate.service';

type P = {
    lang: TranslateService,
    plan: PlanModel,
};

export class PlanSummaryComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }

    render() {
        const plan: PlanModel = this.props.plan;
        const labelCreditsPlaceholder = this.props.lang.transform(
            'merchant.placeholders.credits', { amount: plan.credits }
        );
        const labelSessionsPlaceholder = this.props.lang.transform(
            'merchant.placeholders.sessions', { amount: plan.credits }
        );
        const labelDurationPlaceholder = this.props.lang.transform(
            'merchant.placeholders.duration', { hours: plan.duration }
        );
        const labelFrequency = this.props.lang.get(
            'merchant.enum.features.frequency.' + plan.frequency
        );
        const labelInterval = this.props.lang.get(
            'merchant.enum.plans.interval.' + plan.interval
        );
        return (
            <div className="form-group">
                <div className="p-3 bg-primary-light text-primary-dark">
                    <p className="display-4 font-w600">{ plan.name }</p>
                    <ul className="font-w600">
                        <li>{ labelCreditsPlaceholder }</li>
                        <li>{ labelSessionsPlaceholder }</li>
                        <li>{ labelDurationPlaceholder }</li>
                        <li>{ labelFrequency }</li>
                        <li>{ labelInterval }</li>
                    </ul>
                </div>
            </div>
        );
    }
}