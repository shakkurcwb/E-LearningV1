@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.schedule.title',
        'page' => 'schedule',
    ])

    @content

        @status

        @include('shared.forms.education.schedule')

    @endcontent

@endsection