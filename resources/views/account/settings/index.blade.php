@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.settings.title',
        'page' => 'settings',
    ])

    @content

        @status

        @include('shared.forms.account.user_basic', [
            'action' => '/settings/basic',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

        @include('shared.forms.account.settings', [
            'action' => '/settings',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

        @include('shared.forms.account.avatar', [
            'action' => '/settings/avatar',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

        @include('shared.forms.account.background', [
            'action' => '/settings/background',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

    @endcontent

@endsection