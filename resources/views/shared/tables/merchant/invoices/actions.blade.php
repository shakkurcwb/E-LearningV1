@btn_group

    @if($invoice->state === 'Draft')
        <a class="btn btn-sm btn-primary js-tooltip-enabled"
            href='{{ url("/invoices/{$invoice->id}/process") }}'
            title="@lang('general.process')"
            data-toggle="tooltip"
            data-original-title="@lang('general.process')">
            <i class="fa fa-fw fa-cogs"></i>
        </a>
    @elseif($invoice->state === 'Canceled')
        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
            href='{{ url("/invoices/{$invoice->id}/retry") }}'
            title="@lang('general.retry')"
            data-toggle="tooltip"
            data-original-title="@lang('general.retry')">
            <i class="fa fa-fw fa-undo"></i>
        </a>
    @elseif($invoice->state === 'Pending')
        <a class="btn btn-sm btn-primary js-tooltip-enabled"
            href='{{ url("/invoices/{$invoice->id}/refresh") }}'
            title="@lang('general.refresh')"
            data-toggle="tooltip"
            data-original-title="@lang('general.refresh')">
            <i class="fa fa-fw fa-redo"></i>
        </a>
        @if(!empty($invoice->response['secure_url']))
            <a class="btn btn-sm btn-primary js-tooltip-enabled"
                target="_blank"
                href='{{ url($invoice->response["secure_url"])  }}'
                title="@lang('general.view')"
                data-toggle="tooltip"
                data-original-title="@lang('general.view')">
                <i class="fa fa-fw fa-print"></i>
            </a>
        @endif
    @elseif($invoice->state === 'Expired')
        <a class="btn btn-sm btn-primary js-tooltip-enabled"
            href='{{ url("/invoices/{$invoice->id}/duplicate") }}'
            title="@lang('general.duplicate')"
            data-toggle="tooltip"
            data-original-title="@lang('general.duplicate')">
            <i class="fa fa-fw fa-clone"></i>
        </a>
    @elseif($invoice->state === 'Paid' && $invoice->subscription->state !== 'Activated')
        <a class="btn btn-sm btn-primary js-tooltip-enabled"
            href='{{ url("/subscriptions/{$invoice->subscription->id}/activate") }}'
            title="@lang('general.activate')"
            data-toggle="tooltip"
            data-original-title="@lang('general.activate')">
            <i class="fa fa-fw fa-fire"></i>
        </a>
    @else - @endif

@endbtn_group