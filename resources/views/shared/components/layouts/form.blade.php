<!-- Form -->
<form action="{{ url($action ?? '#') }}" method="post"
    @if(!empty($file_upload)) enctype="multipart/form-data" @endif
>
    @csrf
    @method($method ?? 'post')
    {{ $slot }}
</form>
<!-- END Form -->