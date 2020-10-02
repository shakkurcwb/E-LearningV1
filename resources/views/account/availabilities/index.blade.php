@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.availabilities.title',
        'page' => 'availabilities',
    ])

    @content

        @status

        @include('shared.forms.account.availabilities')

    @endcontent

@endsection