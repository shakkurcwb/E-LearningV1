@component('shared.components.block.default', [
    'title' => 'education.tables.forms.title',
    'hidden' => false,
])

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th style="width: 70%;">@lang('education.tables.forms.headers.identity')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.forms.headers.tags')</th>
                    <th class="text-center" style="width: 10%;">@lang('education.tables.forms.headers.status')</th>
                    <th class="text-center" style="width: 10%;">@lang('general.actions')</th>
                </tr>
            </thead>
            @if($forms && $forms->count() > 0)
                @foreach($forms as $form)
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">
                                {{ $form->title }}
                                <p class="mb-0 font-w300">{{ $form->description }}</p>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">@lang($form->tags)</span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">@lang($form->state)</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"
                                        href='{{ url("/forms/{$form->id}/edit") }}'
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
    </div>

@endcomponent