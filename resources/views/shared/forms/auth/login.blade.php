<form method="POST"
    action="{{ route('login') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">
    @method('post')
    @csrf
    <input type="hidden" name="locale" value="" />
    <input type="hidden" name="timezone" value="" />

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
            <div class="d-md-flex align-items-md-center justify-content-md-between">
                <div class="custom-control custom-switch">
                    <input type="checkbox"
                        class="custom-control-input"
                        id="remember"
                        name="remember"
                        {{ old("remember") ? "checked" : '' }} />
                    <label class="custom-control-label font-w400" for="remember">@lang('auth.attributes.remember_me')</label>
                </div>
                <div class="py-2">
                    <a class="font-size-sm" href="{{ route('password.request') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">@lang('auth.login.forgot_password_link')</a>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center mb-0">
        <div class="col-md-10 col-xl-10">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> @lang('auth.login.submit')
            </button>
        </div>
    </div>

</form>

@section('js_after')

<script src="{{ mix('js/client.js') }}"></script>

@endsection