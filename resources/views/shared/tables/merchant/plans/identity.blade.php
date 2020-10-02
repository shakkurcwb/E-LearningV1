<!-- Plan Identity -->
<div>
    <p class="mb-0 font-w600">@lang($plan->name)</p>
    <p class="mb-0 text-muted">{{ $plan->price }} {{ config('app.currency') }} / @lang($plan->interval)</p>
    @if($plan->is_recommended)
        <p class="mb-0">
            @badge([
                'label' => __('merchant.general.labels.recommended'),
                'color' => 'success',
            ])
        </p>
    @endif
</div>
<!-- END Plan Identity -->