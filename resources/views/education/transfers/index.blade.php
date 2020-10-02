@extends('shared.core.theme')

@section('content')

    @include('shared.components.hero.simple', [
        'title' => 'education.pages.transfers.title',
        'page' => 'transfers',
    ])

    @component('shared.components.layout.content')

        @status

        @include('shared.components.forms.search', [
            'action' => '/transfers',
            'create' => 0,
        ])

        @include('shared.tables.education.deposits', [
            'action' => '/transfers',
        ])

    @endcomponent

@endsection