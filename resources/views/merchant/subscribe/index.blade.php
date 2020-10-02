@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'merchant.pages.subscribe.title',
        'page' => 'subscribe',
    ])

    @content

        @status

        @include('shared.forms.merchant.subscribe')

    @endcontent

@endsection