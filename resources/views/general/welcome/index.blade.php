@extends('shared.core.theme-simple')

@section('content')

<!-- Landing Page -->
<div class="hero bg-white overflow-hidden">
    <div class="hero-inner">
        <div class="content content-full text-center">
            <h1 class="display-4 font-w600 mb-3 invisible" data-toggle="appear" data-class="animated fadeInDown">
                {{ config('app.name') }}
            </h1>
            <h2 class="h3 font-w400 text-muted mb-5 invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="300">
                {{ __(config('app.description')) }}
            </h2>
            <span class="m-2 d-inline-block invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                <a class="btn btn-success px-4 py-2" href="{{ url('/login') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> @lang('Sign In')
                </a>
            </span>
            <div class="my-4">
                <a href="?lang=pt_BR" class="invisible btn mr-1 mb-3"
                    data-toggle="appear" data-class="animated fadeInUp" data-timeout="1000">
                    <img src="{{ asset('media/flags/1x1/br.svg') }}" style="max-height: 16px;" />
                </a>
                <a href="?lang=en_US" class="invisible btn mr-1 mb-3"
                    data-toggle="appear" data-class="animated fadeInUp" data-timeout="1000">
                    <img src="{{ asset('media/flags/1x1/us.svg') }}" style="max-height: 16px;" />
                </a>
                <a href="?lang=fr_FR" class="invisible btn mr-1 mb-3"
                    data-toggle="appear" data-class="animated fadeInUp" data-timeout="1000">
                    <img src="{{ asset('media/flags/1x1/fr.svg') }}" style="max-height: 16px;" />
                </a>
                <a href="?lang=es_ES" class="invisible btn mr-1 mb-3"
                    data-toggle="appear" data-class="animated fadeInUp" data-timeout="1000">
                    <img src="{{ asset('media/flags/1x1/es.svg') }}" style="max-height: 16px;" />
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END Landing Page -->

@endsection
