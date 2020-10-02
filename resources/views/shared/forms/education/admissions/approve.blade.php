<!-- Approve Session -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_approve_session">
    @csrf
    @method('post')
</form>
<!-- END Approve Session -->

@push('scripts')

<script>
function approve(id) {
    if (confirm("@lang('education.confirms.sessions.approve')")) {
        document.frm_approve_session.action += '/approve';
        frm_approve_session.submit();
    }
}
</script>

@endpush