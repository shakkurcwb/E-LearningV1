@block([
    'title' => 'account.tables.users.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
    ])

    @table
        <thead>
            <tr>
                <th style="width: 70%;">@lang('account.tables.users.headers.identity')</th>
                <th class="text-center" style="width: 10%;">@lang('account.tables.users.headers.role')</th>
                <th class="text-center" style="width: 10%;">@lang('account.tables.users.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($users && $users->count() > 0)
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>@include('shared.tables.account.users.identity')</td>
                    <td class="text-center">@badge(['label' => $user->role, 'color' => 'primary'])</td>
                    <td class="text-center">@badge(['label' => $user->state, 'color' => 'primary'])</td>
                    <td class="text-center">@include('shared.tables.account.users.actions')</td>
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

    {{ $users->links() }}

    @include('shared.components.forms.delete')

@endblock