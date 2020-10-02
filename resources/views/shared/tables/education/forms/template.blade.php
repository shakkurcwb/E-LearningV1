@block([
    'title' => 'education.tables.forms.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
        'redirect' => "$action/builder",
    ])

    @table
        <thead>
            <tr>
                <th style="width: 70%;">@lang('education.tables.forms.headers.identity')</th>
                <th class="text-center" style="width: 10%;">@lang('education.tables.forms.headers.type')</th>
                <th class="text-center" style="width: 10%;">@lang('education.tables.forms.headers.state')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($forms && $forms->count() > 0)
            <tbody>
                @foreach($forms as $form)
                <tr>
                    <td>
                        <p class="mb-0 font-w600">{{ $form->title }}</p>
                        <p class="mb-0">{{ $form->description }}</p>
                        <p class="mb-0 text-muted">{{ $form->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="text-center">@badge(['label' => $form->type])</td>
                    <td class="text-center">@badge(['label' => $form->state])</td>
                    <td class="text-center">@include('shared.tables.education.forms.actions')</td>
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

@endblock