import * as React from 'react';

import { FormStyle } from '../../core/models/form-style.enum';

import { TranslateService } from '../../core/services/translate.service';

import { CouponModel } from '../../core/models/coupon.model';

type P = {
    lang: TranslateService,
    coupon: CouponModel,
    onChange: any,
    validateCoupon: any,
};

export class CouponInputComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
    }

    render() {
        const labelInputCoupon = this.props.lang.get('merchant.forms.subscribe.input_coupon');
        const labelValidate = this.props.lang.get('general.validate');
        const style = this.props.coupon && this.props.coupon.id ? FormStyle.valid : FormStyle.invalid;
        return (
            <div>
                <div className="form-inline">
                    <label className="mr-2">{ labelInputCoupon }</label>
                    <input className={ "form-control mr-2 " + style }
                        onChange={ this.props.onChange }
                        value={ this.props.coupon.slug }
                    />
                    <button type="button" className="btn btn-primary"
                        onClick={ this.props.validateCoupon }>{ labelValidate }</button>
                </div>
            </div>
        );
    }
}