@block_form([
    'title' => 'education.forms.live.title',
])

<div id="live-status" class="mb-2"></div>
<div id="live-session">@lang('Loading, please wait...')</div>
<div id="live-events" class="mt-2"></div>

@endblock_form

@push('scripts')

<script>
    var user = @json(Auth::user()->toArray());
    var room = "FalaEducation_{{ $session->id }}";
</script>
<script src='https://meet.jit.si/external_api.js'></script>
<script src="{{ mix('js/pages/live.js') }}"></script>

@endpush