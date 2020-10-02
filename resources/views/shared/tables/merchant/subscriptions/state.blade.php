<!-- Subscription State -->
<div>

    @if($subscription->state === 'Pending')
        @badge(['label' => $subscription->state, 'color' => 'secondary'])
    @elseif($subscription->state === 'Canceled')
        @badge(['label' => $subscription->state, 'color' => 'danger'])
    @elseif($subscription->state === 'Activated' && $subscription->updated_at->addDays(30) >= now())
        @badge(['label' => $subscription->state, 'color' => 'success'])
    @elseif($subscription->state === 'Activated' && $subscription->updated_at->addDays(30) < now())
        @badge(['label' => 'Expired', 'color' => 'secondary'])
    @else - @endif

</div>
<!-- END Subscription State -->