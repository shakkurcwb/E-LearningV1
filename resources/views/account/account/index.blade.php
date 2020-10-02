@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.account.title',
        'page' => 'account',
    ])

    @content

        @include('shared.components.progress.profile', [
            'progress' => Auth::user()->profile_progression,
        ])

        @status

        @include('shared.forms.account.person', [
            'action' => '/account/person',
            'method' => 'patch',
            'user' => Auth::user(),
        ])

        @if(Auth::user()->state !== 'Inactive')

            @include('shared.forms.account.address', [
                'action' => '/account/address',
                'method' => 'patch',
                'user' => Auth::user(),
            ])

            @include('shared.forms.account.phone', [
                'action' => '/account/phone',
                'method' => 'patch',
                'user' => Auth::user(),
            ])

        @endif

        @if(Auth::user()->state === 'Inactive')
        
            @action_btn([
                'title' => 'Complete the admission form to start your journey!',
                'label' => 'Admission Form',
                'action' => '/admission',
            ])

        @endif

    @endcontent

@endsection