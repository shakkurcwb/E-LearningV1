@form([
    'action' => $action,
    'method' => $method,
])

    @block_form([
        'title' => 'merchant.forms.coupon.title',
    ])

        <div class="form-group">
            <label for="slug">@lang('merchant.attributes.coupon.slug')</label>
            @input([
                'type' => 'text',
                'name' => 'slug',
                'value' => $coupon->slug ?? str_random(8),
            ])
        </div>
        <div class="form-group">
            <label for="discount">@lang('merchant.attributes.coupon.discount') <small>{{ config('app.currency') }}</small></label>
            @input([
                'type' => 'number',
                'name' => 'discount',
                'value' => $coupon->discount,
            ])
        </div>
        <div class="form-group">
            <label for="expires_at">@lang('merchant.attributes.coupon.expires_at')</label>
            @input([
                'type' => 'date',
                'name' => 'expires_at',
                'value' => $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : now()->addDays(5)->format('Y-m-d'),
            ])
        </div>

        @include('shared.components.buttons.form-buttons', [
            'action' => $action,
        ])

    @endblock_form

@endform