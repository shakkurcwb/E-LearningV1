@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.sessions.title',
        'page' => 'sessions',
    ])

    @content

        @status

        @include('shared.tables.education.sessions.template', [
            'action' => '/sessions',
        ])

    @endcontent

@endsection