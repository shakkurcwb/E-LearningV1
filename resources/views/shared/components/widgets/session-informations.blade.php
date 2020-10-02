<!-- Session Informations -->
@block([
    'title' => 'education.components.session_informations.title',
])

    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <p class="mb-0 font-size-sm text-muted">@lang('Student Info')</p>
                    <h4 class="mb-0">{{ $session->student->person->full_name }}</h4>
                    <p class="mb-0">{{ $session->student->person->age }} @lang('years') - {{ $session->student->person->nationality }}</p>
                </div>
                <div class="col-sm-4 mb-2">
                    <p class="mb-0">
                        <img src="{{ $session->student->settings->avatar_url }}" style="width: 96px;" />
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <p class="mb-0 font-size-sm text-muted">@lang('Tutor Info')</p>
                    <h4 class="mb-0">{{ $session->tutor->person->full_name }}</h4>
                    <p class="mb-0">{{ $session->tutor->person->age }} @lang('years') - {{ $session->tutor->person->nationality }}</p>
                </div>
                <div class="col-sm-4 mb-2">
                    <p class="mb-0">
                        <img src="{{ $session->tutor->settings->avatar_url }}" style="width: 96px;" />
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center py-sm-3 py-md-5">
        <div class="col-sm-10 col-md-8 text-center">
            <div class="flex-row mb-4">
                <div class="px-2">
                    <p class="mb-0 font-size-sm">@lang('Session Date')</p>
                    <h4 class="mb-0">{{ $session->start_at->setTimezone(Auth::user()->settings->timezone)->toFormattedDateString() }}</h4>
                </div>
                <div class="px-2">
                    <p class="mb-0 font-size-sm">@lang('Start Time')</p>
                    <h4 class="mb-0">{{ $session->start_at->setTimezone(Auth::user()->settings->timezone)->format('H:i A') }}</h4>
                </div>
                <div class="px-2">
                    <p class="mb-0 font-size-sm">@lang('End Time')</p>
                    <h4 class="mb-0">{{ $session->end_at->setTimezone(Auth::user()->settings->timezone)->format('H:i A') }}</h4>
                </div>
            </div>
            <div>
                <p class="mb-0 font-size-sm">@lang('Additional Informations')</p>
                <h4 class="mb-3">{{ $session->additional_info ?? '-' }}</h4>
            </div>
            @if($session->state === 'Canceled')
                <div>
                    <p class="mb-0 font-size-sm">@lang('Cancelation Explanation')</p>
                    <h4 class="mb-3">{{ $session->explanation ?? '-' }}</h4>
                </div>
            @endif
        </div>
    </div>

    @if(Auth::user()->is($session->student) && $session->state === 'Pending')

        <div class="text-center">
            <p class="mb-0 text-muted font-w600">@lang('Waiting the tutor confirm the session before :date.', ['date' => $session->start_at->setTimezone(Auth::user()->settings->timezone)->addHours(-24)->toFormattedDateString()])</p>
        </div>

    @endif

    @if(Auth::user()->is($session->tutor) && $session->state === 'Pending')

        <div class="text-center">
            <p class="mb-0 text-danger font-w600">@lang('You have to confirm the session before :date.', ['date' => $session->start_at->setTimezone(Auth::user()->settings->timezone)->addHours(-24)->toFormattedDateString()])</p>
            <a href="javascript:approve({{ $session->id }});" class="btn btn-success">@lang('Approve')</a>
            <a href="javascript:reject({{ $session->id }});"class="btn btn-danger">@lang('Reject')</a>
        </div>

        @include('shared.forms.education.sessions.approve', [
            'action' => '/sessions',
        ])
        @include('shared.forms.education.sessions.reject', [
            'action' => '/sessions',
        ])

    @endif

    <div class="text-center">
        @if($session->state === 'Canceled')
            <span class="p-2 badge badge-danger">
                <h3 class="text-light mb-0">@lang($session->state)</h3>
            </span>
        @endif
        @if($session->state === 'Confirmed')
            <span class="p-2 badge badge-success">
                <h3 class="text-light mb-0">@lang($session->state)</h3>
            </span>
        @endif
    </div>

@endblock
<!-- END Session Informations -->