@component('shared.components.block.default', [
    'title' => 'education.tables.admissions.title',
    'hidden' => false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 70%;">@lang('education.tables.admissions.headers.identity')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.admissions.headers.role')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.admissions.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($admissions && $admissions->count() > 0)
                @foreach($admissions as $admission)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">
                                {{ $admission->user->email }}
                                <p class="mb-0 font-w400">
                                    {{ $admission->created_at->diffForHumans() }}
                                </p>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">@lang($admission->user->role)</span>
                            </td>
                            <td class="text-center">
                                @if(empty($admission->verified_at))
                                    <span class="badge badge-warning">
                                        @lang($admission->state)
                                    </span>
                                @else
                                    <span class="badge badge-{{ $admission->is_approved ? 'success' : 'danger' }}">
                                        @lang($admission->state)
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("admissions/{$admission->id}") }}'
                                        title="@lang('general.preview')" data-original-title="@lang('general.preview')">
                                        <i class="fa fa-fw fa-eye"></i>
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
        {{ $admissions ? $admissions->links() : '' }}
    </div>

@endcomponent