<!-- Mark As Unread Form -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_mark_as_unread">
    @csrf
    @method('post')
</form>
<!-- END Mark As Unread Form -->

@push('scripts')

<script>
function markAsUnread(id) {
    if (confirm("@lang('account.confirms.notifications.mark_as_unread')")) {
        frm_mark_as_unread.action += '/' + id + '/unread';
        frm_mark_as_unread.submit();
    }
}
</script>

@endpush