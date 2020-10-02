@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'merchant.forms.plan.title',
    ])

        <div class="form-group">
            <label for="name">@lang('merchant.attributes.plan.name')</label>
            @input([
                'type' => 'text',
                'name' => 'name',
                'value' => $plan->name,
            ])
        </div>
        <div class="form-group">
            <label for="price">@lang('merchant.attributes.plan.price') <small>{{ config('app.currency') }}</small></label>
            @input([
                'type' => 'number',
                'name' => 'price',
                'value' => $plan->price,
            ])
        </div>
        <div class="form-group">
            <label for="interval">@lang('merchant.attributes.plan.interval')</label>
            @include('shared.components.elements.select', [
                'name' => 'interval',
                'value' => $plan->interval,
                'options' => App\Libraries\Merchant\Plans\Interval::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="frequency">@lang('merchant.attributes.features.frequency')</label>
            @include('shared.components.elements.select', [
                'name' => 'frequency',
                'value' => $plan->features->frequency,
                'options' => App\Libraries\Merchant\Features\Frequency::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="duration">@lang('merchant.attributes.features.duration')</label>
            @include('shared.components.elements.select', [
                'name' => 'duration',
                'value' => $plan->features->duration,
                'options' => App\Libraries\Merchant\Features\Duration::getValues(),
            ])
        </div>
        <div class="form-group">
            <label for="credits">@lang('merchant.attributes.features.credits')</label>
            @input([
                'type' => 'number',
                'name' => 'credits',
                'value' => $plan->features->credits,
            ])
        </div>
        <div class="form-group">
            <label for="is_recommended">@lang('merchant.attributes.plan.is_recommended')</label>
            @include('shared.components.elements.switch', [
                'name' => 'is_recommended',
                'value' => $plan->is_recommended,
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform