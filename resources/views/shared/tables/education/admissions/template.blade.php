@block([
    'title' => 'education.tables.admissions.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
        'create' => false,
    ])

    @table
        <thead>
            <tr>
                <th style="width: 70%;">@lang('education.tables.admissions.headers.identity')</th>
                <th class="text-center" style="width: 10%;">@lang('education.tables.admissions.headers.role')</th>
                <th class="text-center" style="width: 10%;">@lang('education.tables.admissions.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($admissions && $admissions->count() > 0)
            <tbody>
                @foreach($admissions as $admission)
                <tr>
                    <td>@include('shared.tables.education.admissions.identity')</td>
                    <td class="text-center">@badge(['label' => $admission->user->role])</td>
                    <td class="text-center">
                        @if(!$admission->verified_at)
                            @badge(['label' => 'Pending', 'color' => 'warning'])
                        @else
                            @badge(['label' => 'Approved', 'color' => 'success'])
                        @endif
                    </td>
                    <td class="text-center">@include('shared.tables.education.admissions.actions')</td>
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

    {{ $admissions->links() }}

@endblock