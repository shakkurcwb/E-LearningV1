@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.admissions.title',
        'page' => 'admissions',
    ])

    @content

        @status

        @include('shared.tables.education.admissions.template', [
            'action' => '/admissions',
        ])

    @endcontent

@endsection
