<!-- Session State -->
<div>

    @if($session->state === 'Pending')
        @badge(['label' => $session->state, 'color' => 'warning'])
    @elseif($session->state === 'Canceled')
        @badge(['label' => $session->state, 'color' => 'danger'])
    @elseif($session->state === 'Confirmed')
        @badge(['label' => $session->state, 'color' => 'success'])
    @elseif($session->state === 'On Going')
        @badge(['label' => $session->state, 'color' => 'info'])
    @elseif($session->state === 'Finished')
        @badge(['label' => $session->state, 'color' => 'secondary'])
    @else - @endif

</div>
@if($session->cost === 0)
    @badge(['label' => "Trial", 'color' => 'primary'])
@endif
<!-- END Session State -->