@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'account.pages.users.title',
        'page' => 'users',
    ])

    @content

        @status

        @include('shared.tables.account.users.template', [
            'action' => '/users',
            'hidden' => !empty($user) || $errors->any(),
        ])

        @empty($user)

            @include('shared.forms.account.user_full', [
                'action' => '/users',
                'method' => 'post',
                'user' => new App\Models\Account\UserModel,
            ])

        @else

            @include('shared.forms.account.user_full', [
                'action' => "/users/{$user->id}",
                'method' => 'patch',
                'user' => $user,
            ])

            @include('shared.forms.account.person', [
                'action' => "/users/{$user->id}",
                'method' => 'patch',
                'user' => $user,
            ])

            @include('shared.forms.account.address', [
                'action' => "/users/{$user->id}",
                'method' => 'patch',
                'user' => $user,
            ])

            @include('shared.forms.account.phone', [
                'action' => "/users/{$user->id}",
                'method' => 'patch',
                'user' => $user,
            ])

            @if($user->role === 'Tutor')

                @include('shared.forms.account.preferences', [
                    'action' => "/users/{$user->id}",
                    'method' => 'patch',
                    'user' => $user,
                ])

                @include('shared.forms.account.bank_account', [
                    'action' => "/users/{$user->id}",
                    'method' => 'patch',
                    'user' => $user,
                ])

            @endif

            @include('shared.forms.account.settings', [
                'action' => "/users/{$user->id}",
                'method' => 'patch',
                'user' => $user,
            ])

        @endempty

    @endcontent

@endsection