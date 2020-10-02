@block_form([
    'title' => 'education.forms.builder.title',
])

<input type="hidden" id="form_id" value="{{ $id ?? null }}" />

<div id="form-builder"></div>

@endblock_form

@push('scripts')

<script>
window.Laravel.lang = {!! App\Libraries\Localization::toJson() !!};
window.Laravel.locale = "{{ Auth::user()->settings->locale }}";
</script>

<script src="{{ mix('js/education/form-builder.js') }}"></script>

@endpush