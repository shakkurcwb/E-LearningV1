@block([
    'title' => 'merchant.tables.plans.title',
    'hidden' => $hidden ?? false,
])

    @include('shared.components.forms.search', [
        'action' => $action,
    ])

    @table
        <thead>
            <tr>
                <th style="width: 50%;">@lang('merchant.tables.plans.headers.identity')</th>
                <th class="text-center" style="width: 20%;">@lang('merchant.tables.plans.headers.details')</th>
                <th class="text-center" style="width: 20%;">@lang('merchant.tables.plans.headers.features')</th>
                <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
            </tr>
        </thead>
        @if($plans && $plans->count() > 0)
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td>@include('shared.tables.merchant.plans.identity')</td>
                    <td class="text-center">@include('shared.tables.merchant.plans.details')</td>
                    <td class="text-center">@include('shared.tables.merchant.plans.features')</td>
                    <td class="text-center">@include('shared.tables.merchant.plans.actions')</td>
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

    @include('shared.components.forms.delete')

@endblock