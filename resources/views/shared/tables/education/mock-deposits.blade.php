@component('shared.components.block.default', [
    'title' => 'education.tables.deposits.title',
    'hidden' => $hidden ?? false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 35%;">@lang('education.tables.deposits.headers.tutor')</th>
                    <th style="width: 35%;">@lang('education.tables.deposits.headers.session')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.deposits.headers.amount')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.deposits.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-w600 font-size-sm">
                        Caroline Petrovic Teixeira
                        <p class="mb-0">
                            <span class="badge badge-primary">28 anos</span>
                            <span class="badge badge-primary">Curitiba - PR</span>
                        </p>
                    </td>
                    <td class="font-w600 font-size-sm">
                        <small>Data:</small> 23/10/2019<br>
                        <small>Hora:</small> 19:00:00 (UTC -3)<br>
                        <small>Duracao:</small> 02 horas                        
                    </td>
                    <td class="text-center font-w600 font-size-sm">
                        BRL 12,50
                    </td>
                    <td class="text-center">
                        <span class="badge badge-warning">Requested</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                title="@lang('Approve')" data-original-title="@lang('Approve')">
                                <i class="fa fa-fw fa-check text-white"></i>
                            </a>
                            <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                title="@lang('Cancel')" data-original-title="@lang('Cancel')">
                                <i class="fa fa-fw fa-times text-white"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-w600 font-size-sm">
                        Nikolai Krusmeksov
                        <p class="mb-0">
                            <span class="badge badge-primary">21 anos</span>
                            <span class="badge badge-primary">Alekseievka - RU</span>
                        </p>
                    </td>
                    <td class="font-w600 font-size-sm">
                        <small>Data:</small> 21/10/2019<br>
                        <small>Hora:</small> 12:00:00 (UTC -7)<br>
                        <small>Duracao:</small> 01 horas    
                    </td>
                    <td class="text-center font-w600 font-size-sm">
                        BRL 22,50
                    </td>
                    <td class="text-center">
                        <span class="badge badge-danger">Canceled</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            -
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-w600 font-size-sm">
                        Juan Carlos Damasco
                        <p class="mb-0">
                            <span class="badge badge-primary">31 anos</span>
                            <span class="badge badge-primary">Cidade do Mexico - ME</span>
                        </p>
                    </td>
                    <td class="font-w600 font-size-sm">
                        <small>Data:</small> 19/10/2019<br>
                        <small>Hora:</small> 08:00:00 (UTC +2)<br>
                        <small>Duracao:</small> 01:30 horas    
                    </td>
                    <td class="text-center font-w600 font-size-sm">
                        BRL 8,00
                    </td>
                    <td class="text-center">
                        <span class="badge badge-success">Approved</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                title="@lang('Send')" data-original-title="@lang('Send')">
                                <i class="fa fa-fw fa-external-link-alt text-white"></i>
                            </a>
                            <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                title="@lang('Cancel')" data-original-title="@lang('Cancel')">
                                <i class="fa fa-fw fa-times text-white"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endcomponent