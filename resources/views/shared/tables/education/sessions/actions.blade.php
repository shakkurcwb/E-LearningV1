@btn_group

    <a class="btn btn-sm btn-primary js-tooltip-enabled"
        href='{{ url("{$action}/{$session->id}/summary") }}'
        title="@lang('general.summary')"
        data-toggle="tooltip"
        data-original-title="@lang('general.summary')"
    >
        <i class="fa fa-fw fa-info"></i>
    </a>

    @if($session->state === "Confirmed" && $session->isLive())

        <a class="btn btn-sm btn-danger js-tooltip-enabled"
            href='{{ url("{$action}/{$session->id}/live") }}'
            title="@lang('general.join')"
            data-toggle="tooltip"
            data-original-title="@lang('general.join')"
        >
            <i class="fa fa-fw fa-play-circle"></i>
        </a>

    @endif

@endbtn_group