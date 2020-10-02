@component('shared.components.block.default', [
    'title' => 'merchant.tables.invoices.title',
    'hidden' => false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 20%;">@lang('merchant.tables.invoices.headers.method')</th>
                    <th style="width: 20%;">@lang('merchant.tables.invoices.headers.status')</th>
                    <th style="width: 50%;">@lang('merchant.tables.invoices.headers.details')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($invoices && $invoices->count() > 0)
                @foreach($invoices as $invoice)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">
                                <span class="badge badge-primary">
                                    @lang('merchant.general.payments.methods.' . $invoice->method)
                                </span>
                            </td>
                            <td class="font-w600 font-size-sm">
                                @if($invoice->state === 'Canceled')
                                    <span class="badge badge-danger">
                                        @lang($invoice->state)
                                    </span>
                                @elseif($invoice->state === 'Pending')
                                    <span class="badge badge-warning">
                                        @lang($invoice->state)
                                    </span>
                                @elseif($invoice->state === 'Draft')
                                    <span class="badge badge-secondary">
                                        @lang($invoice->state)
                                    </span>
                                @elseif($invoice->state === 'Paid')
                                    <span class="badge badge-success">
                                        @lang($invoice->state)
                                    </span>
                                @else
                                    <span class="badge badge-primary">
                                        @lang($invoice->state)
                                    </span>
                                @endif
                            </td>
                            <td class="font-w400 font-size-sm">
                                @if($invoice->state === 'Canceled' && $invoice->errors)
                                    <span class="badge badge-danger">
                                        @lang('Error')
                                    </span>
                                    @if (is_array($invoice->errors))
                                        @foreach($invoice->errors as $field => $error)
                                            <span>{{ $field }} {{ $error[0] }}</span>
                                        @endforeach
                                    @else
                                        {{ $invoice->errors }}
                                    @endif
                                @endif
                                @if($invoice->state === 'Paid')
                                    <p class="mb-0">@lang('Paid At'): <b>{{ $invoice->updated_at->format('d/m/Y g:i A') }}</b></p>
                                    <p class="mb-0">@lang('Activated At'): <b>{{ $invoice->subscription->state === 'Activated' ? $invoice->subscription->updated_at->format('d/m/Y g:i A') : '-' }}</b></p>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if($invoice->state === 'Draft')
                                        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                            href='{{ url("/invoices/{$invoice->id}/process") }}'
                                            title="@lang('general.process')" data-original-title="@lang('general.process')">
                                            <i class="fa fa-fw fa-cogs"></i>
                                        </a>
                                    @elseif($invoice->state === 'Pending')
                                        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                            href='{{ url("/invoices/{$invoice->id}/refresh") }}'
                                            title="@lang('general.refresh')" data-original-title="@lang('general.refresh')">
                                            <i class="fa fa-fw fa-redo"></i>
                                        </a>
                                    @elseif($invoice->state === 'Expired')
                                        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                            href='{{ url("/invoices/{$invoice->id}/duplicate") }}'
                                            title="@lang('general.duplicate')" data-original-title="@lang('general.duplicate')">
                                            <i class="fa fa-fw fa-clone"></i>
                                        </a>
                                    @elseif($invoice->state === 'Paid' && $invoice->subscription->state !== 'Activated')
                                        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                            href='{{ url("/subscriptions/{$invoice->subscription->id}/activate") }}'
                                            title="@lang('general.activate')" data-original-title="@lang('general.activate')">
                                            <i class="fa fa-fw fa-fire"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center font-w600 text-danger">@lang('general.alerts.no_records')</td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

@endcomponent