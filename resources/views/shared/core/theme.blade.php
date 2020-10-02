<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('shared.core.partials.head')
</head>
<body>

    <section id="page-container" class="main-content-narrow page-header-fixed sidebar-o side-scroll enable-page-overlay sidebar-dark page-header-dark">
        @include('shared.core.partials.page')
    </section>

    @yield('js_before')

    <script src="{{ mix('js/oneui.app.js') }}"></script>
    <script src="{{ mix('js/laravel.app.js') }}"></script>

    @yield('js_after')

    @stack('scripts')
    
</body>