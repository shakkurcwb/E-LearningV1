@block_form([
    'title' => 'merchant.forms.subscribe.title',
])

<div id="subscribe-plan"></div>

@endblock_form

@push('scripts')

<script src="https://js.iugu.com/v2"></script>

<script>
window.Laravel.iugu = Iugu;
window.Laravel.lang = {!! App\Libraries\Localization::toJson() !!};
window.Laravel.locale = "{{ Auth::user()->settings->locale }}";
</script>

<script src="{{ mix('js/merchant/subscribe-plan.js') }}"></script>

@endpush