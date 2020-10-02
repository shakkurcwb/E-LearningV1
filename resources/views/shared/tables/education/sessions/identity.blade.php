<!-- Session Identity -->
<div>
    <div class="row">
        <div class="col-sm-2 text-center">
            @if(Auth::user()->role === 'Student')
                <img class="img-avatar img-avatar48 img-avatar-thumb"
                    src="{{ url($session->tutor->settings->avatar_url) }}"
                />
            @else
                <img class="img-avatar img-avatar48 img-avatar-thumb"
                    src="{{ url($session->student->settings->avatar_url) }}"
                />
            @endif
        </div>
        <div class="col-sm-10">
            @if(Auth::user()->role === 'Student')
                <p class="mb-0 font-w600">{{ $session->tutor->person->full_name }}</p>
            @else
                <p class="mb-0 font-w600">{{ $session->student->person->full_name }}</p>
            @endif
            @if($session->additional_info)
                <p class="mb-0"><small>{{ $session->additional_info }}</small></p>
            @endif
            <p class="mb-0 text-muted">{{ $session->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
<!-- END Session Identity -->