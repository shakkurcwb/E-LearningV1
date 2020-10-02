@extends('shared.core.theme')

@section('content')

    @hero_image([
        'title' => now()->setTimezone(Auth::user()->settings->timezone)->format('D jS F, H:i A'),
        'background' => Auth::user()->settings->background_url,
    ])

    @content

        @status

        @include('shared.components.blocks.quest_log')

        @include('shared.components.widgets.bookmark-ribbon', [
            'title' => 'Shortcuts For Main Actions',
            'ribbons' => [
                [
                    'title' => 'Dashboard',
                    'action' => '/dashboard',
                    'icon' => 'chart-bar',
                ],
                [
                    'title' => 'Manage Sessions',
                    'action' => '/sessions',
                    'icon' => 'chalkboard-teacher',
                ],
                [
                    'title' => 'Manage Lessons',
                    'action' => '/lessons',
                    'icon' => 'file-signature',
                ],
                [
                    'title' => 'Manage Deposits',
                    'action' => '/deposits',
                    'icon' => 'donate',
                ],
            ],
        ])
    
    @endcontent

@endsection
