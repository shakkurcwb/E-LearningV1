@php // @include('shared.core.containers.overlay') @endphp

@include('shared.core.containers.header')

@include('shared.core.containers.menu')

<main id="main-container">@yield('content')</main>

@include('shared.core.containers.footer')

@php // @include('shared.core.containers.modals') @endphp