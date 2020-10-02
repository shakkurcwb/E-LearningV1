@block([
    'title' => 'merchant.tables.invoices.title',
    'hidden' => $hidden ?? false,
])

    @table
        <thead>
            <tr>
                <th style="width: 60%;">@lang('merchant.tables.invoices.headers.details')</th>
                <th class="text-center" style="width: 15%;">@lang('merchant.tables.invoices.headers.method')</th>
                <th class="text-center" style="width: 15%;">@lang('merchant.tables.invoices.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($invoices && $invoices->count() > 0)
            <tbody>
                @foreach($invoices as $invoice)
                <tr>
                    <td>@include('shared.tables.merchant.invoices.details')</td>
                    <td class="text-center">@badge(['label' => __('merchant.general.payments.methods.' . $invoice->method)])</td>
                    <td class="text-center">@include('shared.tables.merchant.invoices.state')</td>
                    <td class="text-center">@include('shared.tables.merchant.invoices.actions')</td>
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

@endblock