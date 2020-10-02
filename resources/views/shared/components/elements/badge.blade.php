<span class="badge badge-{{ $color ?? 'primary' }} {{ $class ?? '' }}">
    @if($icon ?? false) <i class="fa fa-{{ $icon }}"></i> @endif
    @lang($label)
</span>