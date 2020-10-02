@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.sessions.summary.title',
        'page' => 'sessions',
    ])

    @content

        @status

        @include('shared.components.widgets.session-informations')

    @endcontent

@endsection