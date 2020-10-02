@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.feedback.title',
        'page' => 'feedback',
    ])

    @content

        @status

        @include('shared.forms.account.feedback', [
            'action' => '/feedback',
            'method' => 'post',
            'subject' => Request::input('s'),
            'description' => Request::input('d'),
        ])

    @endcontent

@endsection