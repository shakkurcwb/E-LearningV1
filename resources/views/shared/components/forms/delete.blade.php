<!-- Delete Form -->
<form action="{{ url($action ?? '#') }}" method="post" name="frm_delete">
    @csrf
    @method('delete')
</form>
<!-- END Delete Form -->

@push('scripts')

<script>
function destroy(id) {
    if (confirm("@lang('general.forms.delete.confirm')")) {
        frm_delete.action += '/' + id;
        frm_delete.submit();
    }
}
</script>

@endpush