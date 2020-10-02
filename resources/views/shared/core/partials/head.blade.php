<title>{{ config('app.name', '') }}</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="robots" content="noindex, nofollow">

<meta name="application-name" content="{{ config('app.name', '') }}">
<meta name="description" content="{{ config('app.description', '') }}">
<meta name="keywords" content="{{ config('app.keywords', '') }}">
<meta name="author" content="{{ config('app.author_name', '') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
<link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

@yield('css_before')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
<link rel="stylesheet" id="css-main" href='{{ mix("/css/oneui.css") }}'>

@include('shared.core.partials.theme')

@yield('css_after')

<script>window.Laravel = @json([
    'csrfToken' => csrf_token(),
    'apiToken' => Auth::user()->api_token ?? '',
]);</script>