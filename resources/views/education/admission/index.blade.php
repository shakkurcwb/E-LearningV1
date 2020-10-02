@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'education.pages.admission.title',
        'page' => 'admission',
    ])

    @content

        @status
    
        @include('shared.forms.education.forms.render', [
            'action' => '/admission',
            'method' => 'post',
        ])

    @endcontent

@endsection
