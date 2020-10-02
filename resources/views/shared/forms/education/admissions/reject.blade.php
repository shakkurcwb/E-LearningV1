<!-- Reject Admission -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_reject_admission">
    @csrf
    @method('post')
</form>
<!-- END Reject Admission -->

@push('scripts')

<script>
function reject(id) {
    if (confirm("@lang('education.confirms.admissions.reject')")) {
        frm_reject_admission.action += '/reject';
        frm_reject_admission.submit();
    }
}
</script>

@endpush