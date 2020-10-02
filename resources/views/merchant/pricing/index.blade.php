@extends('shared.core.theme')

@section('content')

    @hero_image([
        'title' => 'merchant.pages.pricing.title',
        'subtitle' => 'merchant.pages.pricing.subtitle',
        'greetings' => false,
    ])

    @content

        <div class="row">

            @if($plans && $plans->count() > 0)
                @foreach($plans as $idx => $plan)

                    <div class="col-md-6 col-xl-3 invisible" data-toggle="appear" data-offset="50" data-timeout="{{ $idx * 200 }}" data-class="animated fadeInUp">
                        <a class="block block-link-shadow {{ $plan->is_recommended ? 'block-themed' : '' }} text-center" href="{{ url('/subscribe') }}">
                            <div class="block-header">
                                <h3 class="block-title">
                                    @if($plan->is_recommended) <i class="fa fa-thumbs-up mr-1"></i> @endif
                                    {{ $plan->name }}
                                </h3>
                            </div>
                            <div class="block-content bg-body-light">
                                <div class="py-2">
                                    <p class="h1 font-w700 mb-2">{{ $plan->price }} {{ config('app.currency') }}</p>
                                    <p class="h6 text-muted">@lang($plan->interval)</p>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="font-size-sm py-2">
                                    <p>
                                        <strong>@lang('merchant.placeholders.credits', [ 'amount' => $plan->features->credits ])</strong>
                                    </p>
                                    <p>
                                        <strong>@lang('merchant.placeholders.sessions', [ 'amount' => $plan->features->credits ])</strong>
                                    </p>
                                    <p>
                                        <strong>@lang('merchant.placeholders.duration', [ 'hours' => $plan->features->duration ])</strong>
                                    </p>
                                    <p>
                                        <strong>@lang($plan->features->frequency)</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="block-content block-content-full bg-body-light">
                                <span class="btn btn-{{ $plan->is_recommended ? 'primary' : 'secondary' }} px-4">
                                    @lang('merchant.general.actions.subscribe')</span>
                            </div>
                        </a>
                    </div>

                @endforeach
            @endif

        </div>
    
    @endcontent

@endsection