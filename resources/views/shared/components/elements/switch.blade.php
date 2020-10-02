@php

// Properties
$error = $error ?? $name;
$title = $title ?? '';
$value = old($name) ?? $value ?? null;

// Directives
$is_disabled = $disabled ?? false;
$is_checked = !empty($value);

// Validation
$is_valid = !empty($value) ?? false;
$is_invalid = $errors && $errors->has($error);

// Styling
$class = $class ?? '';
if ($is_invalid) $class .= ' is-invalid';
else if ($is_valid) $class .= ' is_valid';

@endphp
<input type="hidden" name="{{ $name }}" value="0" />
<div class="custom-control custom-switch custom-control-lg mb-2">
    <input
        class="custom-control-input {{ $class }}"
        type="checkbox"
        name="{{ $name }}"
        id="{{ $name }}"
        value="1"
        {{ $is_disabled ? 'disabled' : '' }}
        {{ $is_checked ? 'checked' : '' }}
    />
    <label class="custom-control-label" for="{{ $name }}">{{ $title }}</label>
</div>
@error($error) <div class="invalid-feedback should-block animated fadeIn">{{ $message }}</div> @enderror