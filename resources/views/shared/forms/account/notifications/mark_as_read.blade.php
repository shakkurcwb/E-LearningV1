<!-- Mark As Read Form -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_mark_as_read">
    @csrf
    @method('post')
</form>
<!-- END Mark As Read Form -->

@push('scripts')

<script>
function markAsRead(id) {
    if (confirm("@lang('account.confirms.notifications.mark_as_read')")) {
        frm_mark_as_read.action += '/' + id + '/read';
        frm_mark_as_read.submit();
    }
}
</script>

@endpush