@block([
    'title' => 'merchant.tables.subscriptions.title',
    'hidden' => $hidden ?? false,
])

    @table
        <thead>
            <tr>
                <th style="width: 60%;">@lang('merchant.tables.subscriptions.headers.identity')</th>
                <th class="text-center" style="width: 15%;">@lang('merchant.tables.subscriptions.headers.total')</th>
                <th class="text-center" style="width: 15%;">@lang('merchant.tables.subscriptions.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($subscriptions && $subscriptions->count() > 0)
            <tbody>
                @foreach($subscriptions as $subscription)
                <tr>
                    <td>@include('shared.tables.merchant.subscriptions.identity')</td>
                    <td class="text-center">{{ $subscription->total }} {{ config('app.currency') }}</td>
                    <td class="text-center">@include('shared.tables.merchant.subscriptions.state')</td>
                    <td class="text-center">@include('shared.tables.merchant.subscriptions.actions')</td>
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

    {{ $subscriptions->links() }}

@endblock