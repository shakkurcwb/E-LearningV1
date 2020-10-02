import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { PlanModel } from '../../core/models/plan.model';
import { FormStyle } from '../../core/models/form-style.enum';

type P = {
    lang: TranslateService,
    plan: PlanModel,
    plans: PlanModel[],
    onChange: any,
};

export class PlanSelectionComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }

    render() {
        const labelChoosePlan = this.props.lang.get('merchant.forms.subscribe.choose_plan');
        const labelCurrency = this.props.lang.get('general.currency');
        const style = this.props.plan.id ? FormStyle.valid : FormStyle.invalid;
        return (
            <div className="form-group">
                <label>{ labelChoosePlan }</label>
                <select className={ "form-control " + style }
                    onChange={ this.props.onChange }
                    value={ this.props.plan.id }>
                        <option></option>
                        { this.props.plans && this.props.plans.map(
                            (plan: PlanModel) => {
                                return <option key={ plan.id }
                                    value={ plan.id }>{ plan.name } - { labelCurrency } { +plan.price }</option>
                            }) }
                </select>
            </div>
        );
    }
}