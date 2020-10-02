@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.admissions.preview.title',
        'page' => 'admissions',
    ])

    @content

        @status

        @include('shared.components.widgets.user-informations', [
            'user' => $admission->user,
        ])

        @include('shared.forms.education.forms.preview', [
            'action' => "/admissions/{$admission->id}",
            'method' => 'post',
            'form' => $admission->form,
            'answers' => $admission->answers,
        ])

    @endcomponent

@endsection
