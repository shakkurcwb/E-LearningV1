@include('shared.components.alerts.invalid')

@foreach([ "success", "error", "info", "warning" ] as $type)
    @if(session($type))
        @include("shared.components.alerts.raw.{$type}", [
            'message' => session($type),
        ])
    @endif
@endforeach