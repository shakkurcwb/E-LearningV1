@extends('shared.core.theme')

@section('content')

    @hero_image([
        'title' => __('Your account is banned.'),
        'subtitle' => __('You violate one of our rules and was banned permanently.'),
        'background' => Auth::user()->settings->background_url,
    ])

    @content

        @status
    
    @endcontent

@endsection
