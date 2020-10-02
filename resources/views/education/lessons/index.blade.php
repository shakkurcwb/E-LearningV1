@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.lessons.title',
        'page' => 'lessons',
    ])

    @component('shared.components.layout.content')

        @status

        @include('shared.components.forms.search', [
            'action' => '/lessons',
            'create' => 0,
        ])

        @include('shared.tables.education.lessons', [
            'action' => '/lessons',
        ])

    @endcomponent

@endsection