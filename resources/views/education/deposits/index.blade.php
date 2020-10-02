@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.deposits.title',
        'page' => 'deposits',
    ])

    @component('shared.components.layout.content')

        @status

        @include('shared.components.forms.search', [
            'action' => '/deposits',
            'create' => 0,
        ])

        @include('shared.tables.education.deposits', [
            'action' => '/deposits',
        ])

    @endcomponent

@endsection