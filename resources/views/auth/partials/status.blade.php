@empty(session('status'))

@else

<div class="alert alert-primary alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <p class="mb-0">{{ session('status') }}</p>
</div>

@endempty

@empty(session('resent'))

@else

<div class="alert alert-success alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <p class="mb-0">@lang('auth.verify.alert')</p>
</div>

@endempty