@block([
    'title' => 'education.tables.sessions.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
        'create' => false,
    ])

    @table
        <thead>
            <tr>
                <th style="width: 60%;">@lang('education.tables.sessions.headers.identity')</th>
                <th class="text-center" style="width: 20%;">@lang('education.tables.sessions.headers.details')</th>
                <th class="text-center" style="width: 10%;">@lang('education.tables.sessions.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($sessions && $sessions->count() > 0)
            <tbody>
                @foreach($sessions as $session)
                <tr>
                    <td>@include('shared.tables.education.sessions.identity')</td>
                    <td class="text-center">@include('shared.tables.education.sessions.details')</td>
                    <td class="text-center">@include('shared.tables.education.sessions.state')</td>
                    <td class="text-center">@include('shared.tables.education.sessions.actions')</td>
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

    {{ $sessions->links() }}

@endblock