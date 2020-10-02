@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.builder.title',
        'page' => 'builder',
    ])

    @component('shared.components.layout.content')

        @include('shared.forms.education.forms.builder')

    @endcomponent

@endsection