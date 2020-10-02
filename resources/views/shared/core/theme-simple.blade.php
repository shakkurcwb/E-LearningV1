<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('shared.core.partials.head')
</head>
<body>

    <section id="page-container">
        <main id="main-container">@yield('content')</main>
    </section>

    @yield('js_before')

    <script src="{{ mix('js/oneui.app.js') }}"></script>
    <script src="{{ mix('js/laravel.app.js') }}"></script>

    @yield('js_after')
    
</body>