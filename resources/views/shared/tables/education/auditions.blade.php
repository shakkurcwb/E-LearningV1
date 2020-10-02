@component('shared.components.block.default', [
    'title' => 'education.tables.auditions.title',
    'hidden' => false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 70%;">@lang('education.tables.auditions.headers.identity')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.auditions.headers.details')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.auditions.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($auditions && $auditions->count() > 0)
                @foreach($auditions as $audition)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">
                                {{ $audition->user->email }}
                                <p class="mb-0 font-w400">
                                    {{ $audition->created_at->diffForHumans() }}
                                </p>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">@lang($audition->user->role)</span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-{{ $audition->state === 'Approved' ? 'success' : 'warning' }}">
                                    @lang($audition->state)
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("/render/{$audition->id}") }}'
                                        title="@lang('general.show')" data-original-title="@lang('general.show')">
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
        {{ $auditions ? $auditions->links() : '' }}
    </div>

@endcomponent