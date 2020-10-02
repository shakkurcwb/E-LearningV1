@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.live.title',
        'page' => 'sessions',
    ])

    @content

        @status

        @include('shared.forms.education.live', [
            'action' => '/sessions',
        ])

    @endcontent

@endsection