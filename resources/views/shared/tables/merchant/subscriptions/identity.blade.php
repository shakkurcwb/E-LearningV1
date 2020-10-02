<!-- Subscription Identity -->
<div>
    <p class="mb-0 font-w600">@lang($subscription->plan->name)</p>
    @include('shared.tables.merchant.plans.features', [
        'plan' => $subscription->plan,
    ])
</div>
<!-- END Subscription Identity -->