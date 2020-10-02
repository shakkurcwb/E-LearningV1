<a class="btn btn-sm btn-{{ $color ?? 'primary' }} js-tooltip-enabled"
    data-toggle="tooltip"
    href="{{ url($action) }}"
    title="@lang($title)"
    data-original-title="@lang($title)"
    >
    {{ $slot }}
</a>