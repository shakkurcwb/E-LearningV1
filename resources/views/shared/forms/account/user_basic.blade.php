@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.user_basic.title',
        'show_status' => true,
        'is_filled' => $user->name ?? false,
        'hidden' => $user->name ?? false,
    ])

        <div class="form-group">
            <label for="name">@lang('account.attributes.user.name')</label>
            @input([
                'type' => 'text',
                'name' => 'name',
                'value' => $user->name,
            ])
        </div>
        <div class="form-group">
            <label for="password">@lang('account.attributes.user.password')</label>
            @input([
                'type' => 'password',
                'name' => 'password',
                'value' => null,
            ])
        </div>
        <div class="form-group">
            <label for="password_confirmation">@lang('account.attributes.user.password_confirmation')</label>
            @input([
                'type' => 'password',
                'name' => 'password_confirmation',
                'value' => null,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform