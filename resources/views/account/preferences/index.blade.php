@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.preferences.title',
        'page' => 'preferences',
    ])

    @content

        @include('shared.components.progress.preferences', [
            'progress' => Auth::user()->preferences_progression,
        ])

        @status

        @include('shared.forms.account.preferences', [
            'action' => '/preferences',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

        @include('shared.forms.account.bank_account', [
            'action' => '/account/bank_account',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

    @endcontent

@endsection