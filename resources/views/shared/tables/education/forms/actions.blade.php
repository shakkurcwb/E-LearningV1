@btn_group

    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href='{{ url("{$action}/builder/{$form->id}") }}'
        title="@lang('general.edit')"
        data-toggle="tooltip"
        data-original-title="@lang('general.edit')"
    >
        <i class="fa fa-fw fa-pencil-alt"></i>
    </a>

@endbtn_group