<div class="alert alert-danger alert-dismissable animated fadeIn" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <p class="mb-0">
        <strong>{{ $message }}</strong>
    </p>
    <p class="mb-0">
        <a class="text-muted" href="{{ url('/feedback') }}?s=bug&d=">@lang('This is unexpected, right? Report this error to us. Click here.')</a>
    </p>
</div>