import * as React from 'react';

export function StepperComponent(props: any) {
    const step = props.step;
    return (
        <ul className="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
            <li className="nav-item">
                <a className={ "nav-link " + ( step === 1 ? "active" : "" ) }
                    href="#" data-toggle="tab">1. { props.lang.get('merchant.forms.subscribe.stepper.step1') }</a>
            </li>
            <li className="nav-item">
                <a className={ "nav-link " + ( step === 2 ? "active" : "" ) }
                    href="#" data-toggle="tab">2. { props.lang.get('merchant.forms.subscribe.stepper.step2') }</a>
            </li>
            <li className="nav-item">
                <a className={ "nav-link " + ( step === 3 ? "active" : "" ) }
                    href="#" data-toggle="tab">3. { props.lang.get('merchant.forms.subscribe.stepper.step3') }</a>
            </li>
        </ul>
    );
}