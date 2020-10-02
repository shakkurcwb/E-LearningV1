@php

// Properties
$error = $error ?? $name;
$type = $type ?? 'text';
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

<textarea
    class="form-control {{ $class ?? '' }}"
    name="{{ $name }}"
    id="{{ $name }}"
    rows="{{ $rows ?? 4 }}"
    placeholder="{{ $placeholder }}"
    {{ $is_disabled ? 'disabled' : '' }}
>{{ $value }}</textarea>
@error($error) <div class="invalid-feedback animated fadeIn">{{ $message }}</div> @enderror