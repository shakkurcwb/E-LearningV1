@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.preferences.title',
        'show_status' => true,
        'is_filled' => $user->preferences->isFilled() ?? false,
        'hidden' => $user->preferences->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="biography">* @lang('account.attributes.preferences.biography')</label>
            @include('shared.components.elements.textarea', [
                'name' => 'biography',
                'value' => $user->preferences->biography,
            ])
        </div>
        <div class="form-group">
            <label for="video">@lang('account.attributes.preferences.video')</label>
            @input([
                'type' => 'text',
                'name' => 'video',
                'value' => $user->preferences->video,
            ])
        </div>
        <div class="form-group">
            <label for="allow_trial_sessions">@lang('account.attributes.preferences.allow_trial_sessions')</label>
            @include('shared.components.elements.switch', [
                'name' => 'allow_trial_sessions',
                'value' => $user->preferences->allow_trial_sessions,
            ])
        </div>
        <div class="form-group">
            <label for="allow_public_view">@lang('account.attributes.preferences.allow_public_view')</label>
            @include('shared.components.elements.switch', [
                'name' => 'allow_public_view',
                'value' => $user->preferences->allow_public_view,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform