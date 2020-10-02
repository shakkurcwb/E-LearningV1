@php
$error = $error ?? $name;
@endphp

<div class="@error($error) is-invalid @elseif($value) is-valid @enderror {{ $class ?? '' }}">
    @isset($options)
        @foreach($options as $idx => $item)
            @if(is_array($item))
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" value="{{ $item['key'] }}"
                        name="{{ $name }}[]" id="{{ $name }}_{{ $item['key'] }}"
                        {{ is_array($value) && in_array($item['key'], $value) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="{{ $name }}_{{ $item['key'] }}">@lang($item['value'])</label>
                </div>
            @else
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" value="{{ $idx }}"
                        name="{{ $name }}[]" id="{{ $name }}_{{ $idx }}"
                        {{ is_array($value) && in_array($idx, $value) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="{{ $name }}_{{ $idx }}">@lang($item)</label>
                </div>
            @endif
        @endforeach
    @endisset
</div>
@error($error) <div class="invalid-feedback animated fadeIn should-block">{{ $message }}</div> @enderror