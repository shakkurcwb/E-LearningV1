@btn_group

    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href='{{ url("{$action}/{$admission->id}") }}'
        title="@lang('general.preview')"
        data-toggle="tooltip"
        data-original-title="@lang('general.preview')"
    >
        <i class="fa fa-fw fa-eye"></i>
    </a>

@endbtn_group