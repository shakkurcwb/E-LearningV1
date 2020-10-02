@component('shared.components.block.default', [
    'title' => 'education.tables.lives.title',
    'hidden' => $hidden ?? false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 50%;">@lang('education.tables.lives.headers.identity')</th>
                    <th class="text-center" style="width: 30%;">@lang('education.tables.lives.headers.details')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.lives.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($lives && $lives->count() > 0)
                @foreach($lives as $live)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">{{ $cupom->slug }}</td>
                            <td class="font-w600 font-size-sm">{{ $cupom->discount }} {{ config('app.currency') }}</td>
                            <td class="font-w600 font-size-sm">{{ $cupom->expires_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("/cupons/{$cupom->id}") }}'
                                        title="@lang('general.edit')" data-original-title="@lang('general.edit')">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href="javascript:del({{ $cupom->id }})"
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