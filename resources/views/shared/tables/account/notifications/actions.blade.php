@btn_group

    @if($notification->unread())
        <a class="btn btn-sm btn-primary js-tooltip-enabled"
            href='javascript:markAsRead("{{ $notification->id }}")'
            title="@lang('account.labels.mark_as_read')"
            data-toggle="tooltip"
            data-original-title="@lang('general.mark_as_read')">
            <i class="fa fa-fw fa-check"></i>
        </a>
    @else
        <a class="btn btn-sm btn-secondary js-tooltip-enabled"
            href='javascript:markAsUnread("{{ $notification->id }}")'
            title="@lang('account.labels.mark_as_unread')"
            data-toggle="tooltip"
            data-original-title="@lang('general.mark_as_unread')">
            <i class="fa fa-fw fa-undo"></i>
        </a>
    @endif

@endbtn_group