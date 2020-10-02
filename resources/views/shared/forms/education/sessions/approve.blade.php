<!-- Approve Session -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_approve_admission">
    @csrf
    @method('post')
</form>
<!-- END Approve Session -->

@push('scripts')

<script>
function approve(id) {
    if (confirm("@lang('education.confirms.sessions.approve')")) {
        document.frm_approve_admission.action += '/' + id + '/approve';
        frm_approve_admission.submit();
    }
}
</script>

@endpush