@block([
    'title' => 'account.tables.notifications.title',
    'hidden' => $hidden ?? false,
])

    @table
        <thead>
            <tr>
                <th class="text-center" style="width: 10%;">@lang('account.tables.notifications.headers.type')</th>
                <th class="text-center" style="width: 70%;">@lang('account.tables.notifications.headers.content')</th>
                <th class="text-center" style="width: 10%;">@lang('account.tables.notifications.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($notifications && $notifications->count() > 0)
            <tbody>
                @foreach($notifications as $notification)
                <tr>
                    <td class="text-center">
                        <i class="fa-2x {{ $notification->data['icon'] }}"></i>
                    </td>
                    <td>@include('shared.tables.account.notifications.content')</td>
                    <td class="text-center">
                        @if($notification->unread())
                            @badge(['label' => 'account.labels.not_readed', 'color' => 'warning'])
                        @else
                            @badge(['label' => 'account.labels.readed', 'color' => 'secondary'])
                        @endif
                    </td>
                    <td class="text-center">@include('shared.tables.account.notifications.actions')</td>
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

    {{ $notifications->links() }}

    @include('shared.forms.account.notifications.mark_as_read', [
        'action' => $action,
    ])

    @include('shared.forms.account.notifications.mark_as_unread', [
        'action' => $action,
    ])

@endblock