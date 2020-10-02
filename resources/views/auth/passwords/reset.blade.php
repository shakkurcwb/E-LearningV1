@extends('shared.core.theme-simple')

@section('content')

<div class="hero-static d-flex align-items-center">
    <div class="w-100">

        <div class="content content-full bg-white">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4 py-4">

                    <div class="text-center">
                        @include('auth.partials.icon')
                        <h1 class="h4 mb-1">@lang('auth.passwords.reset.title')</h1>
                        <h2 class="h6 font-w400 text-muted mb-3">@lang('auth.passwords.reset.description')</h2>
                    </div>

                    @include('auth.partials.status')

                    @include('shared.forms.auth.passwords.reset')

                </div>
            </div>
        </div>

        @include('auth.partials.footer')

    </div>
</div>

@endsection
