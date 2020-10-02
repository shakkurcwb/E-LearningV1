<form action="{{ route('password.email') }}?lang={{ request()->input('lang') ?? config('app.locale')}}" method="POST">
    @method('post')
    @csrf

    <div class="py-3">
        <div class="form-group">
            <input type="text"
                class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror"
                id="email"
                name="email"
                placeholder="@lang('auth.attributes.email')" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row justify-content-center mb-0">
        <div class="col-md-10 col-xl-10">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-envelope mr-1"></i> @lang('auth.passwords.email.submit')
            </button>
        </div>
    </div>

</form>