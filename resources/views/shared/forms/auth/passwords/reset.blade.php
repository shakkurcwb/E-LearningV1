<form action="{{ route('password.update') }}?lang={{ request()->input('lang') ?? config('app.locale') }}" method="POST">
    @method('post')
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

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
        <div class="form-group">
            <input type="password"
                class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="@lang('auth.attributes.password')" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password"
                class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                id="password-confirmation"
                name="password_confirmation"
                placeholder="@lang('auth.attributes.password_confirmation')" />
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row justify-content-center mb-0">
        <div class="col-md-10 col-xl-10">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-user-cog mr-1"></i> @lang('auth.passwords.reset.submit')
            </button>
        </div>
    </div>

</form>