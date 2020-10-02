@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.notifications.title',
        'page' => 'notifications',
    ])

    @content

        @status

        @include('shared.tables.account.notifications.template', [
            'action' => '/notifications',
        ])

    @endcontent

@endsection