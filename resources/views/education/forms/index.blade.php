@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.forms.title',
        'page' => 'forms',
    ])

    @content

        @status

        @include('shared.tables.education.forms.template', [
            'action' => '/forms',
            'forms' => $forms->filter(function ($form) {
                return $form->id > 4;
            }),
        ])

        @include('shared.tables.education.forms.template-fixed', [
            'action' => '/forms',
            'forms' => $forms->filter(function ($form) {
                return $form->id <= 4;
            }),
        ])

    @endcontent

@endsection