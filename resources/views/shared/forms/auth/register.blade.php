<form method="POST"
    action="{{ route('register') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">
    @method('post')
    @csrf
    <input type="hidden" name="locale" value="{{ request()->input('lang') ?? config('app.locale') }}" />
    <input type="hidden" name="timezone" value="" />

    <div class="py-3">
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="radio"
                    class="form-check-input @error('role') is-invalid @enderror"
                    id="role-student"
                    name="role"
                    value="Student"
                    {{ old('role') == 'Student' ? 'checked' : '' }} />
                <label class="form-check-label" for="role-student">@lang('auth.attributes.roles.student')</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio"
                    class="form-check-input @error('role') is-invalid @enderror"
                    id="role-tutor"
                    name="role"
                    value="Tutor"
                    {{ old('role') == 'Tutor' ? 'checked' : '' }} />
                <label class="form-check-label" for="role-tutor">@lang('auth.attributes.roles.tutor')</label>
            </div>
            @error('role')
                <span class="invalid-feedback should-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            <div class="form-group">
            <input type="text"
                class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="@lang('auth.attributes.name')" />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text"
                class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
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
                value=""
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
                value=""
                placeholder="@lang('auth.attributes.password_confirmation')" />
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="d-md-flex align-items-md-center justify-content-md-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox"
                        class="custom-control-input" id="allow-newsletters" name="allow_newsletters" value="1"
                        @if(old('allow_newsletters')  == 1) checked @endif />
                    <label class="custom-control-label font-w400" for="allow-newsletters">@lang('auth.attributes.allow_newsletters')</label>
                    @error('allow_newsletters')
                        <span class="invalid-feedback should-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center mb-0">
        <div class="col-md-10 col-xl-10">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-user-plus mr-1"></i> @lang('auth.register.submit')
            </button>
        </div>
    </div>

</form>

@section('js_after')

<script src="{{ mix('js/client.js') }}"></script>

@endsection