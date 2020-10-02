@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.address.title',
        'show_status' => true,
        'is_filled' => $user->address->isFilled() ?? false,
        'hidden' => $user->address->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="address">* @lang('account.attributes.address.address')</label>
            @input([
                'type' => 'text',
                'name' => 'address',
                'value' => $user->address->address,
            ])
        </div>
        <div class="form-group">
            <label for="number">* @lang('account.attributes.address.number')</label>
            @input([
                'type' => 'text',
                'name' => 'number',
                'value' => $user->address->number,
            ])
        </div>
        <div class="form-group">
            <label for="unit">@lang('account.attributes.address.unit')</label>
            @input([
                'type' => 'text',
                'name' => 'unit',
                'value' => $user->address->unit,
            ])
        </div>
        <div class="form-group">
            <label for="complement">@lang('account.attributes.address.complement')</label>
            @input([
                'type' => 'text',
                'name' => 'complement',
                'value' => $user->address->complement,
            ])
        </div>
        <div class="form-group">
            <label for="district">@lang('account.attributes.address.district')</label>
            @input([
                'type' => 'text',
                'name' => 'district',
                'value' => $user->address->district,
            ])
        </div>
        <div class="form-group">
            <label for="city">@lang('account.attributes.address.city')</label>
            @input([
                'type' => 'text',
                'name' => 'city',
                'value' => $user->address->city,
            ])
        </div>
        <div class="form-group">
            <label for="zip_code">* @lang('account.attributes.address.zip_code')</label>
            @input([
                'type' => 'text',
                'name' => 'zip_code',
                'value' => $user->address->zip_code,
            ])
        </div>
        <div class="form-group">
            <label for="province">@lang('account.attributes.address.province')</label>
            @input([
                'type' => 'text',
                'name' => 'province',
                'value' => $user->address->province,
            ])
        </div>
        <div class="form-group">
            <label for="country">* @lang('account.attributes.address.country')</label>
            @include('shared.components.elements.select', [
                'name' => 'country',
                'value' => $user->address->country,
                'options' => App\Libraries\Account\Address\Country::getValues(),
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform