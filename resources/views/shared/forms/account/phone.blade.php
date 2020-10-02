@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.phone.title',
        'show_status' => true,
        'is_filled' => $user->phone->isFilled() ?? false,
        'hidden' => $user->phone->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="country_prefix">@lang('account.attributes.phone.country_prefix')</label>
            @input([
                'type' => 'text',
                'name' => 'country_prefix',
                'value' => $user->phone->country_prefix,
            ])
        </div>
        <div class="form-group">
            <label for="prefix">* @lang('account.attributes.phone.prefix')</label>
            @input([
                'type' => 'text',
                'name' => 'prefix',
                'value' => $user->phone->prefix,
            ])
        </div>
        <div class="form-group">
            <label for="phone">* @lang('account.attributes.phone.phone')</label>
            @input([
                'type' => 'text',
                'name' => 'phone',
                'value' => $user->phone->phone,
            ])
        </div>
        <div class="form-group">
            <label for="allow_messages">@lang('account.attributes.phone.allow_messages')</label>
            @include('shared.components.elements.switch', [
                'name' => 'allow_messages',
                'value' => $user->phone->allow_messages,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform