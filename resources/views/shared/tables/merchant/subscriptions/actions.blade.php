@btn_group

@if($subscription->state !== 'Canceled')
    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href='{{ url("/subscriptions/{$subscription->id}") }}'
        title="@lang('merchant.general.labels.invoices')"
        data-toggle="tooltip"
        data-original-title="@lang('merchant.general.labels.invoices')">
        <i class="fa fa-fw fa-info"></i>
    </a>
@else - @endif

@endbtn_group