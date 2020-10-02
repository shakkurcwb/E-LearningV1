@block([
    'title' => 'account.forms.availabilities.title',
])

    <p class="font-w600 text-center mb-0">@lang('account.forms.availabilities.instructions')</p>
    <p class="font-w600 text-center text-danger">@lang('account.forms.availabilities.warning')</p>
    <div id="manage-availabilities"></div>

@endblock

@push('scripts')

    <script src="{{ mix('js/account/manage-availabilities.js') }}"></script>

@endpush