@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => __($form->title),
    ])

        <input type="hidden" name="form_id" value="{{ $form->id }}" />

        @foreach($form->questions as $idx => $question)

            <div class="form-group">
                <h4 class="text-muted">
                    {{ $question->title }}
                    @if($question->is_matchable) @icon(['slug' => 'share-alt']) @endif
                    @if($question->show_matches) @icon(['slug' => 'star', 'color' => 'warning']) @endif
                </h4>
                <ul>
                    @foreach($answers->where('question_id', $question->id)->all() as $answer)
                        @if (is_array($answer->answer))
                            @foreach($answer->answer as $selected)

                                @php
                                $label = collect($question->options)->filter(function($value, $key) use ($selected) {
                                    return $value['key'] == $selected;
                                })->first();
                                @endphp
                                <li>{{ $label['value'] }}</li>

                            @endforeach
                        @else

                            @php
                            $label = collect($question->options)->filter(function($value, $key) use ($answer) {
                                return $value['key'] == $answer->answer;
                            })->first();
                            @endphp
                            <li>{{ $label['value'] }}</li>

                        @endif
                    @endforeach
                </ul>
            </div>

        @endforeach

        @if($admission && empty($admission->verified_at))
            <a href="javascript:approve({{ $form->id }});" class="btn btn-success">@lang('Approve')</a>
            <a href="javascript:reject({{ $form->id }});"class="btn btn-danger">@lang('Reject')</a>
        @elseif($admission)
            <span class="p-2 badge badge-{{ $admission->is_approved ? 'success' : 'danger' }}">
                <h3 class="text-light mb-0">
                @if($admission->is_approved)
                    <i class="fa fa-check"></i>
                    <span>@lang('Approved') - {{ $admission->verified_at->format('d/m/Y') }}</span>
                @else
                    <i class="fa fa-times"></i>
                    <span>@lang('Rejected') - {{ $admission->verified_at->format('d/m/Y') }}</span>
                @endif
                </h3>
            </span>
        @endif

    @endblock_form

@endform

@include('shared.forms.education.admissions.approve')
@include('shared.forms.education.admissions.reject')