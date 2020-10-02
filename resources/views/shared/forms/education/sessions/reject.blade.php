<!-- Reject Session -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_reject_session">
    @csrf
    @method('post')
    <input type="hidden" name="explanation" />
</form>
<!-- END Reject Session -->

@push('scripts')

<script>
function reject(id) {
    if (confirm("@lang('education.confirms.sessions.reject')")) {
        var explanation = prompt("@lang('education.confirms.sessions.explanation')", '');
        if (explanation) {
            frm_reject_session.action += '/' + id + '/reject';
            frm_reject_session.explanation.value = explanation;
            frm_reject_session.submit();
        }
    }
}
</script>

@endpush