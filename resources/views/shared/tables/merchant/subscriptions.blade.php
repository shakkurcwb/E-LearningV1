@component('shared.components.block.default', [
    'title' => 'merchant.tables.subscriptions.title',
    'hidden' => $hidden ?? false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 20%;">@lang('merchant.tables.subscriptions.headers.identity')</th>
                    <th style="width: 30%;">@lang('merchant.tables.subscriptions.headers.summary')</th>
                    <th style="width: 20%;">@lang('merchant.tables.subscriptions.headers.details')</th>
                    <th style="width: 20%;">@lang('merchant.tables.subscriptions.headers.pricing')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($subscriptions && $subscriptions->count() > 0)
                @foreach($subscriptions as $subscription)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">{{ $subscription->plan->name }}
                                @if($subscription->state === 'Pending')
                                    <p class="mb-0">
                                        <span class="badge badge-warning">@lang($subscription->state)</span>
                                    </p>
                                @elseif($subscription->state === 'Failed')
                                    <p class="mb-0">
                                        <span class="badge badge-danger">@lang($subscription->state)</span>
                                    </p>
                                @elseif($subscription->state === 'Activated')
                                    <p class="mb-0">
                                        <span class="badge badge-success">@lang($subscription->state)</span>
                                    </p>
                                @endif
                            </td>
                            <td class="font-w400 font-size-sm">
                                <p class="mb-0">@lang('Requested At'): <b>{{ $subscription->created_at->format('d/m g:i A') }}</b></p>
                                <p class="mb-0">@lang('Expires At'): <b>{{ $subscription->updated_at->addDays(30)->format('d/m/Y') }}</b></p>
                            </td>
                            <td class="font-w600 font-size-sm">
                                <p class="mb-0">@lang($subscription->plan->features->frequency)
                                    <small>(@lang($subscription->plan->interval))</small>
                                </p>
                                <p class="mb-0 font-w300">@lang('merchant.placeholders.duration', [ 'hours' => $subscription->plan->features->duration ])</p>
                            </td>
                            <td class="font-w600 font-size-sm">
                                <p class="mb-0">
                                    {{ $subscription->plan->price * $subscription->quantity }} {{ config('app.currency') }}
                                    <small>({{ $subscription->quantity }}x)</small>
                                </p>
                                <p class="mb-0 font-w300">@lang('merchant.placeholders.credits', [ 'amount' => $subscription->plan->features->credits ])</p>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if(!$subscription->is_canceled)
                                        <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                            href='{{ url("/subscriptions/{$subscription->id}") }}'
                                            title="@lang('merchant.general.labels.invoices')" data-original-title="@lang('merchant.general.labels.invoices')">
                                            <i class="fa fa-fw fa-info"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
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

@endcomponent