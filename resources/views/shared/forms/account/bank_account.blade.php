@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.bank_account.title',
        'show_status' => true,
        'is_filled' => $user->bank_account->isFilled() ?? false,
        'hidden' => $user->bank_account->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="bank">* @lang('account.attributes.bank_account.bank')</label>
            @input([
                'type' => 'text',
                'name' => 'bank',
                'value' => $user->bank_account->bank,
            ])
        </div>
        <div class="form-group">
            <label for="agency">* @lang('account.attributes.bank_account.agency')</label>
            @input([
                'type' => 'text',
                'name' => 'agency',
                'value' => $user->bank_account->agency,
            ])
        </div>
        <div class="form-group">
            <label for="account">* @lang('account.attributes.bank_account.account')</label>
            @input([
                'type' => 'text',
                'name' => 'account',
                'value' => $user->bank_account->account,
            ])
        </div>
        <div class="form-group">
            <label for="preferred_currency">@lang('account.attributes.bank_account.preferred_currency')</label>
            @include('shared.components.elements.select', [
                'name' => 'preferred_currency',
                'value' => $user->bank_account->preferred_currency,
                'options' => App\Libraries\Account\Settings\Currency::getValues(),
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform