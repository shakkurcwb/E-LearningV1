<a class="btn btn-sm btn-{{ $color ?? 'primary' }} js-tooltip-enabled"
    data-toggle="tooltip"
    @if(strpos($action, 'javascript') !== false)
        href="{{ $action }}"
    @else
        href="{{ url($action) }}"
    @endif
    title="@lang($title)"
    data-original-title="@lang($title)"
    >
    @icon(['slug' => $icon])
</a>