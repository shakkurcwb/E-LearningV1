@form([
    'action' => $action,
    'method' => $method,
    'file_upload' => true,
])

    @block_form([
        'title' => 'account.forms.settings.background.title',
        'show_status' => true,
        'is_filled' => $user->settings->background ?? false,
        'hidden' => $user->settings->background ?? false,
    ])

        <div class="form-group">
            <label for="background">@lang('account.attributes.settings.background')</label>
            @include('shared.components.elements.file', [
                'name' => 'background',
                'value' => $user->settings->background,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform