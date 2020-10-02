@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'account.forms.feedback.title',
    ])

        <div class="form-group">
            <label for="subject">@lang('account.attributes.feedback.subject')</label>
            @include('shared.components.elements.select', [
                'name' => 'subject',
                'value' => $subject,
                'options' => App\Libraries\Account\Feedbacks\Subject::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="description">@lang('account.attributes.feedback.description')</label>
            @include('shared.components.elements.textarea', [
                'name' => 'description',
                'value' => $description,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform