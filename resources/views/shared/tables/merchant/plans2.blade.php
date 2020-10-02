@component('shared.components.block.default', [
    'title' => 'merchant.tables.plans.title',
    'hidden' => $hidden ?? false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 30%;">@lang('merchant.tables.plans.headers.identity')</th>
                    <th style="width: 30%;">@lang('merchant.tables.plans.headers.details')</th>
                    <th style="width: 30%;">@lang('merchant.tables.plans.headers.pricing')</th>
                    <th class="text-center" style="width: 40px;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($plans && $plans->count() > 0)
                @foreach($plans as $plan)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">{{ $plan->name }}
                                @if($plan->is_recommended)
                                    <p class="mb-0">
                                        <span class="badge badge-success">@lang('merchant.general.labels.recommended')</span>
                                    </p>
                                @endif
                            </td>
                            <td class="font-w600 font-size-sm">
                                <p class="mb-0">@lang($plan->features->frequency)
                                    <small>(@lang($plan->interval))</small></p>
                                <p class="mb-0">@lang('merchant.placeholders.duration', [ 'hours' => $plan->features->duration ])</p>
                            </td>
                            <td class="font-w600 font-size-sm">
                                <p class="mb-0">{{ $plan->price }} {{ config('app.currency') }}</p>
                                <p class="mb-0">@lang('merchant.placeholders.credits', [ 'amount' => $plan->features->credits ])</p>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("/plans/{$plan->id}") }}'
                                        title="@lang('general.edit')" data-original-title="@lang('general.edit')">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href="javascript:del({{ $plan->id }})"
                                        title="@lang('general.delete')" data-original-title="@lang('general.delete')">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center font-w600 text-danger">@lang('general.alerts.no_records')</td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

    @include('shared.components.forms.delete', [
        'action' => $action,
    ])

@endcomponent