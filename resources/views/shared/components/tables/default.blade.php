<div class="table-responsive">
    <table class="table table-bordered table-striped table-vcenter">
        <thead>
            <tr>
            @foreach($headers as $header)

                @if($header['avatar'] ?? false)
                    <th class="text-center" style="width: 10%;">
                        <i class="far fa-user"></i>
                    </th>
                @elseif($header['actions'] ?? false)
                    <th style="width: 10%;" class="text-center">
                        @lang('general.actions')
                    </th>
                @else
                    <th class="text-{{ $header['align'] ?? 'center' }}"
                        style="width: {{ $header['width'] ?? 25 }}%;">
                        @lang($header['label'] ?? '#')
                    </th>
                @endif

            @endforeach
            </tr>
        </thead>
        <tbody>
        @if($collection && $collection->count() > 0)
            @foreach($collection as $data)
                @include($template, $collection)
            @endforeach 
        @else
            <tr>
                <td colspan="{{ count($headers) ? count($headers) + 1 : 100 }}"
                    class="text-center font-w600 text-danger"
                    >@lang('general.alerts.no_records')</td>
            </tr>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="{{ count($headers) ? count($headers) + 1 : 100 }}"
                    class="text-center font-w600 text-danger"
                    >@lang('general.alerts.no_records')</td>
            </tr>
        </tfoot>
    </table>
</div>