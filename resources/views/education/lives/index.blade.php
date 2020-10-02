@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.lives.title',
        'page' => 'lives',
    ])

    @component('shared.components.layout.content')

        @status

        @include('shared.components.forms.search', [
            'action' => '/lives',
            'create' => 0,
        ])

        @include('shared.tables.education.lives', [
            'action' => '/lives',
        ])

    @endcomponent

@endsection