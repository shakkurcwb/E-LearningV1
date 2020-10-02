@block_form([
    'title' => 'education.forms.schedule.title',
])

<div id="schedule-sessions"></div>

@endblock_form

@push('scripts')

<script>
window.Laravel.lang = {!! App\Libraries\Localization::toJson() !!};
window.Laravel.locale = "{{ Auth::user()->settings->locale }}";
</script>

<script src="{{ mix('js/education/schedule-sessions.js') }}"></script>

@endpush