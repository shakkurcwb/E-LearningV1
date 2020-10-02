@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.user_full.title',
        'show_status' => true,
        'is_filled' => $user->name ?? false,
        'hidden' => false,
    ])

        <div class="form-group">
            <label for="role">@lang('account.attributes.user.role')</label>
            @select([
                'name' => 'role',
                'value' => $user->role,
                'options' => App\Libraries\Account\Users\Role::getValues(),
                'disabled' => !empty($user->role),
            ])
        </div>
        <div class="form-group">
            <label for="name">@lang('account.attributes.user.name')</label>
            @input([
                'type' => 'text',
                'name' => 'name',
                'value' => $user->name,
            ])
        </div>
        <div class="form-group">
            <label for="email">@lang('account.attributes.user.email')</label>
            @input([
                'type' => 'email',
                'name' => 'email',
                'value' => $user->email,
                'disabled' => !empty($user->role),
            ])
            @if($user->email_verified_at)
                <div class="valid-feedback should-block">
                    @lang('Email Verified')
                </div>
            @else
                <div class="invalid-feedback should-block">
                    @lang('Email Not Verified')
                </div>
            @endif
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