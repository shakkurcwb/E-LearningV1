@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.auditions.title',
        'page' => 'auditions',
    ])

    @component('shared.components.layout.content')

        @status
    
        @include('shared.components.forms.search', [
            'action' => '/auditions',
            'create' => 0,
        ])

        @include('shared.tables.education.auditions', [
            'action' => '/auditions',
        ])

    @endcomponent

@endsection
