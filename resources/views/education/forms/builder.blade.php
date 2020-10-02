@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.forms.builder.title',
        'page' => 'builder',
        'breadcrumbs' => [
            'forms',
        ],
    ])

    @content

        @status

        @include('shared.forms.education.forms.builder', [
            'action' => '/forms/builder',
        ])

    @endcontent

@endsection