@php

// Properties
$error = $error ?? $name;
$value = old($name) ?? $value ?? null;
$placeholder = $placeholder ?? '';

// Directives
$is_disabled = $disabled ?? false;

// Validation
$is_valid = !empty($value) ?? false;
$is_invalid = $errors && $errors->has($error);

// Styling
$class = $class ?? '';
if ($is_invalid) $class .= ' is-invalid';
else if ($is_valid) $class .= ' is_valid';

@endphp

<select
    class="form-control {{ $class }}"
    name="{{ $name }}"
    id="{{ $name }}"
    {{ $is_disabled ? 'disabled' : '' }}
    >
    @isset($options)
        <option value=""></option>

        @foreach($options as $idx => $item)
            @if(is_array($item))
                <option value="{{ $item['key'] }}" @if($value == $item['key']) selected @endif>@lang($item['value'])</option>
            @else
                <option value="{{ $idx }}" @if($value == $idx) selected @endif>@lang($item)</option>
            @endif
        @endforeach

    @endisset
</select>
@error($error) <div class="invalid-feedback animated fadeIn">{{ $message }}</div> @enderror