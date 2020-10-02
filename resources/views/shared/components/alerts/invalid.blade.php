@if($errors->any())

    <div class="alert alert-danger alert-dismissable animated fadeIn" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0">
            <strong>Ops!</strong> @lang('general.alerts.invalid')
        </p>
    </div>

@endif