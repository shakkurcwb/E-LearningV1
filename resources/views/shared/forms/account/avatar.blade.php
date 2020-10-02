@form([
    'action' => $action,
    'method' => $method,
    'file_upload' => true,
])

    @block_form([
        'title' => 'account.forms.settings.avatar.title',
        'show_status' => true,
        'is_filled' => $user->settings->avatar ?? false,
        'hidden' => $user->settings->avatar ?? false,
    ])

        <div class="form-group">
            <label for="avatar">@lang('account.attributes.settings.avatar')</label>
            @include('shared.components.elements.file', [
                'name' => 'avatar',
                'value' => $user->settings->avatar,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform