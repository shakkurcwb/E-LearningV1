<div class="custom-file">
    <input type="file"
        class="custom-file-input @error($name) is-invalid @enderror {{ $class ?? '' }}"
        data-toggle="custom-file-input" id="{{ $name }}" name="{{ $name }}">
    <label class="custom-file-label" for="{{ $name }}">Choose file</label>
</div>
@error($name) <div class="invalid-feedback animated fadeIn">{{ $message }}</div> @enderror
