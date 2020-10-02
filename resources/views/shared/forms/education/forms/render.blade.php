@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => __($form->title),
    ])

        <input type="hidden" name="form_id" value="{{ $form->id }}" />

        @foreach($form->questions as $idx => $question)

            <input type="hidden" name="form[{{ $idx }}][question_id]" value="{{ $question->id }}" />
            <input type="hidden" name="form[{{ $idx }}][answer]" value="" />

            @if(in_array($question->type, [ 'Short', 'Link' ]))

                <div class="form-group">
                    <label for="form[{{ $idx }}][answer]">@lang($question->title)</label>
                    @input([
                        'type' => 'text',
                        'name' => "form[{$idx}][answer]",
                        'value' => old("form.{$idx}.answer"),
                        'error' => "form.{$idx}.answer",
                    ])
                </div>

            @endif

            @if(in_array($question->type, [ 'Text' ]))

                <div class="form-group">
                    <label for="form[{{ $idx }}][answer]">@lang($question->title)</label>
                    @include('shared.components.elements.textarea', [
                        'name' => "form[{$idx}][answer]",
                        'value' => old("form.{$idx}.answer"),
                        'error' => "form.{$idx}.answer",
                    ])
                </div>

            @endif

            @if(in_array($question->type, [ 'Select' ]))

                <div class="form-group">
                    <label for="form[{{ $idx }}][answer]">@lang($question->title)</label>
                    @include('shared.components.elements.select', [
                        'name' => "form[{$idx}][answer]",
                        'value' => old("form.{$idx}.answer"),
                        'options' => $question->options,
                        'error' => "form.{$idx}.answer",
                    ])
                </div>

            @endif

            @if(in_array($question->type, [ 'Check' ]))

                <div class="form-group">
                    <label for="form[{{ $idx }}][answer]">@lang($question->title)</label>
                    @include('shared.components.elements.checkbox', [
                        'name' => "form[{$idx}][answer]",
                        'value' => old("form.{$idx}.answer"),
                        'options' => $question->options,
                        'error' => "form.{$idx}.answer",
                    ])
                </div>

            @endif

        @endforeach

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform