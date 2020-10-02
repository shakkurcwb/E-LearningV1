@component('shared.components.block.default', [
    'title' => 'education.tables.deposits.title',
    'hidden' => $hidden ?? false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 50%;">@lang('education.tables.deposits.headers.identity')</th>
                    <th class="text-center" style="width: 30%;">@lang('education.tables.deposits.headers.details')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.deposits.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($deposits && $deposits->count() > 0)
                @foreach($deposits as $deposit)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">
                                {{ $deposit->session_id }}
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">@lang($deposit->state)</span>
                            </td>
                            <td class="text-center">
                                @lang($deposit->currency) {{ $deposit->amount }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("/deposits/{$deposit->id}") }}'
                                        title="@lang('general.edit')" data-original-title="@lang('general.edit')">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
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
        {{ $deposits ? $deposits->links() : '' }}
    </div>

@endcomponent