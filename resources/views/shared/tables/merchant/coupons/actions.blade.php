@btn_group

    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href='{{ url("{$action}/{$coupon->id}") }}'
        title="@lang('general.edit')"
        data-toggle="tooltip"
        data-original-title="@lang('general.edit')"
    >
        <i class="fa fa-fw fa-pencil-alt"></i>
    </a>
    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href="javascript:destroy({{ $coupon->id }});"
        title="@lang('general.delete')"
        data-toggle="tooltip"
        data-original-title="@lang('general.delete')"
    >
        <i class="fa fa-fw fa-times"></i>
    </a>

@endbtn_group