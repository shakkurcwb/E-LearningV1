import * as React from 'react';

import { TranslateService } from '../../core/services/translate.service';

import { CreditCardModel } from '../../core/models/credit-card.model';
import { FormStyle } from '../../core/models/form-style.enum';

type P = {
    lang: TranslateService,
    creditCard: CreditCardModel,
    setForm: any,
    errors: any,
};

export class CreditCardInputComponent extends React.Component<P, any> {
    constructor(props: P) {
        super(props);
        this.handleNumberInput = this.handleNumberInput.bind(this);
        this.handleCvvInput = this.handleCvvInput.bind(this);
        this.handleFullNameInput = this.handleFullNameInput.bind(this);
        this.handleExpirationInput = this.handleExpirationInput.bind(this);
    }

    handleNumberInput(e: any) {
        const number: string = e.target.value;
        const creditCard: CreditCardModel = this.props.creditCard;
        creditCard.number = number;
        this.props.setForm({ creditCard });
    }

    handleCvvInput(e: any) {
        const cvv: string = e.target.value;
        const creditCard: CreditCardModel = this.props.creditCard;
        creditCard.cvv = cvv;
        this.props.setForm({ creditCard });
    }

    handleFullNameInput(e: any) {
        const fullName: string = e.target.value;
        const creditCard: CreditCardModel = this.props.creditCard;
        creditCard.fullName = fullName;
        this.props.setForm({ creditCard });
    }

    handleExpirationInput(e: any) {
        const expiration: string = e.target.value;
        const creditCard: CreditCardModel = this.props.creditCard;
        creditCard.expiration = expiration;
        this.props.setForm({ creditCard });
    }

    render() {
        const labelNumber = this.props.lang.get('merchant.attributes.credit_card.number');
        const labelCvv = this.props.lang.get('merchant.attributes.credit_card.cvv');
        const labelFullName = this.props.lang.get('merchant.attributes.credit_card.full_name');
        const labelExpiration = this.props.lang.get('merchant.attributes.credit_card.expiration');
        const creditCard: CreditCardModel = this.props.creditCard;
        const errors = this.props.errors;
        const numberIsValid = creditCard.number && !errors['number'];
        const cvvIsValid = creditCard.cvv && !errors['verification_value'];
        const fullNameIsValid = creditCard.fullName && !errors['full_name'];
        const expirationIsValid = creditCard.expiration && !errors['expiration'];
        return (
            <section>
                { errors && errors['iugu'] &&
                    <div className="form-group">
                        <p className="mb-0 h4 text-danger animated fadeIn">{ errors['iugu'] }</p>
                    </div>
                }
                <div className="form-group">
                    <label>{ labelNumber }</label>
                    <input type="text"
                        className={ "form-control " + ( numberIsValid ? FormStyle.valid : FormStyle.invalid ) }
                        onChange={ this.handleNumberInput }
                        value={ creditCard.number ? creditCard.number : "" } />
                    { !numberIsValid &&
                        <div className="invalid-feedback animated fadeIn">Please enter a valid card number.</div>
                    }
                </div>
                <div className="form-group">
                    <label>{ labelCvv }</label>
                    <input type="text"
                        className={ "form-control " + ( cvvIsValid ? FormStyle.valid : FormStyle.invalid ) }
                        onChange={ this.handleCvvInput }
                        value={ creditCard.cvv ? creditCard.cvv : "" } />
                    { !cvvIsValid &&
                        <div className="invalid-feedback animated fadeIn">Please enter a valid cvv.</div>
                    }
                </div>
                <div className="form-group">
                    <label>{ labelFullName }</label>
                    <input type="text"
                        className={ "form-control " + ( fullNameIsValid ? FormStyle.valid : FormStyle.invalid ) }
                        onChange={ this.handleFullNameInput }
                        value={ creditCard.fullName ? creditCard.fullName : "" } />
                    { !fullNameIsValid &&
                        <div className="invalid-feedback animated fadeIn">Please enter a valid full name.</div>
                    }
                </div>
                <div className="form-group">
                    <label>{ labelExpiration }</label>
                    <input type="text"
                        className={ "form-control " + ( expirationIsValid ? FormStyle.valid : FormStyle.invalid ) }
                        onChange={ this.handleExpirationInput }
                        value={ creditCard.expiration ? creditCard.expiration : "" } />
                    { !expirationIsValid &&
                        <div className="invalid-feedback animated fadeIn">Please enter a valid expiration date.</div>
                    }
                </div>
            </section>
        );
    }
}