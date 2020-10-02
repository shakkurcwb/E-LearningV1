@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.settings.settings.title',
        'show_status' => true,
        'is_filled' => $user->settings->isFilled() ?? false,
        'hidden' => $user->settings->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="theme">@lang('account.attributes.settings.theme')</label>
            @include('shared.components.elements.select', [
                'name' => 'theme',
                'value' => $user->settings->theme,
                'options' => App\Libraries\Account\Settings\Theme::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="locale">@lang('account.attributes.settings.locale')</label>
            @include('shared.components.elements.select', [
                'name' => 'locale',
                'value' => $user->settings->locale,
                'options' => App\Libraries\Account\Settings\Locale::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="timezone">@lang('account.attributes.settings.timezone')</label>
            @include('shared.components.elements.select', [
                'name' => 'timezone',
                'value' => $user->settings->timezone,
                'options' => App\Libraries\Account\Settings\Timezone::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="currency">@lang('account.attributes.settings.currency')</label>
            @include('shared.components.elements.select', [
                'name' => 'currency',
                'value' => $user->settings->currency,
                'options' => App\Libraries\Account\Settings\Currency::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="allow_newsletters">@lang('account.attributes.settings.allow_newsletters')</label>
            @include('shared.components.elements.switch', [
                'name' => 'allow_newsletters',
                'value' => $user->settings->allow_newsletters,
            ])
        </div>
        <div class="form-group">
            <label for="show_hints">@lang('account.attributes.settings.show_hints')</label>
            @include('shared.components.elements.switch', [
                'name' => 'show_hints',
                'value' => $user->settings->show_hints,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform