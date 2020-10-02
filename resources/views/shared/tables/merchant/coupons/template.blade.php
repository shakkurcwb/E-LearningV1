@block([
    'title' => 'merchant.tables.coupons.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
    ])

    @table
        <thead>
            <tr>
                <th style="width: 50%;">@lang('merchant.tables.coupons.headers.identity')</th>
                <th class="text-center" style="width: 20%;">@lang('merchant.tables.coupons.headers.discount')</th>
                <th class="text-center" style="width: 20%;">@lang('merchant.tables.coupons.headers.expiration')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($coupons && $coupons->count() > 0)
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td>
                        <p class="mb-0 font-w600">{{ $coupon->slug }}</p>
                        <p class="mb-0 text-muted">{{ $coupon->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="text-center">{{ $coupon->discount }} {{ config('app.currency') }}</td>
                    <td class="text-center">{{ $coupon->expires_at->format('d/m/Y') }}</td>
                    <td class="text-center">@include('shared.tables.merchant.coupons.actions')</td>
                </tr>
                @endforeach
            </tbody>
        @else
            <tbody>
                <tr>
                    <td colspan="4" class="text-center font-w600 text-danger">@lang('general.alerts.no_records')</td>
                </tr>
            </tbody>
        @endif
    @endtable

    @include('shared.components.forms.delete')

@endblock