@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.person.title',
        'show_status' => true,
        'is_filled' => $user->person->isFilled() ?? false,
        'hidden' => $user->person->isFilled() ?? false,
    ])

        <div class="form-group">
            <label for="first_name">* @lang('account.attributes.person.first_name')</label>
            @input([
                'type' => 'text',
                'name' => 'first_name',
                'value' => $user->person->first_name,
            ])
        </div>
        <div class="form-group">
            <label for="middle_names">@lang('account.attributes.person.middle_names')</label>
            @input([
                'type' => 'text',
                'name' => 'middle_names',
                'value' => $user->person->middle_names,
            ])
        </div>
        <div class="form-group">
            <label for="last_name">* @lang('account.attributes.person.last_name')</label>
            @input([
                'type' => 'text',
                'name' => 'last_name',
                'value' => $user->person->last_name,
            ])
        </div>
        <div class="form-group">
            <label for="document">* @lang('account.attributes.person.document')</label>
            @input([
                'type' => 'text',
                'name' => 'document',
                'value' => $user->person->document,
            ])
        </div>
        <div class="form-group">
            <label for="birth">* @lang('account.attributes.person.birth')</label>
            @input([
                'type' => 'date',
                'name' => 'birth',
                'value' => $user->person->birth,
            ])
        </div>
        <div class="form-group">
            <label for="gender">@lang('account.attributes.person.gender')</label>
            @include('shared.components.elements.select', [
                'name' => 'gender',
                'value' => $user->person->gender,
                'options' => App\Libraries\Account\People\Gender::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="nationality">@lang('account.attributes.person.nationality')</label>
            @include('shared.components.elements.select', [
                'name' => 'nationality',
                'value' => $user->person->nationality,
                'options' => App\Libraries\Account\Address\Country::getValues(),
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform