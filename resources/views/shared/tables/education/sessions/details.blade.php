<!-- Session Details -->
<div>
    <p class="mb-0 font-w600">{{ $session->start_at->setTimezone(Auth::user()->settings->timezone)->toFormattedDateString() }}</p>
    <p class="mb-0 text-muted">{{ $session->start_at->setTimezone(Auth::user()->settings->timezone)->format('H:i A') }} - {{ $session->end_at->setTimezone(Auth::user()->settings->timezone)->format('H:i A') }}</p>
    <p class="mb-0 text-muted"><small>* {{ Auth::user()->settings->timezone }}</small></p>
</div>
<!-- END Session Details -->