@extends('shared.core.theme-simple')

@section('content')

<div class="hero-static d-flex align-items-center">
    <div class="w-100">

        <div class="content content-full bg-white">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4 py-4">

                    <div class="text-center">
                        @include('auth.partials.icon')
                        <h1 class="h4 mb-1">@lang('auth.verify.title')</h1>
                        <h2 class="h6 font-w400 text-muted mb-3">@lang('auth.verify.description')</h2>
                    </div>

                    @include('auth.partials.status')

                    <div class="text-center mt-3">
                        <a class="font-size-sm" href="{{ route('verification.resend') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">@lang('auth.verify.verification_link')</a>
                    </div>

                </div>
            </div>
        </div>

        @include('auth.partials.footer')

    </div>
</div>

@endsection
