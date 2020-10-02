@extends('shared.core.theme')

@section('content')

    @hero_image([
        'title' => __('We have :online users online, and :registered users registered.', [
            'online' => rand(10, 50),
            'registered' => rand(400, 600),
        ]),
        'subtitle' => __('There is :students students and :tutors tutors active. Only :inactive users are not active.', [
            'students' => rand(200, 300),
            'tutors' => rand(200, 300),
            'inactive' => rand(2, 8),
        ]),
        'background' => Auth::user()->settings->background_url,
    ])

    @content

        @status

        @include('shared.components.widgets.bookmark-ribbon', [
            'title' => 'Shortcuts For Main Actions',
            'ribbons' => [
                [
                    'title' => 'Dashboard',
                    'action' => '/dashboard',
                    'icon' => 'chart-bar',
                ],
                [
                    'title' => 'Manage Plans',
                    'action' => '/plans',
                    'icon' => 'map',
                ],
                [
                    'title' => 'Manage Coupons',
                    'action' => '/coupons',
                    'icon' => 'tag',
                ],
                [
                    'title' => 'Manage Forms',
                    'action' => '/forms',
                    'icon' => 'clone',
                ],
                [
                    'title' => 'Manage Admissions',
                    'action' => '/admissions',
                    'icon' => 'shield-alt',
                ],
                [
                    'title' => 'Manage Auditions',
                    'action' => '/auditions',
                    'icon' => 'smile',
                ],
                [
                    'title' => 'Manage Lives',
                    'action' => '/lives',
                    'icon' => 'headphones-alt',
                ],
                [
                    'title' => 'Manage Transfers',
                    'action' => '/transfers',
                    'icon' => 'paper-plane',
                ],
                [
                    'title' => 'Diagnostics',
                    'action' => '/diagnostics',
                    'icon' => 'wrench',
                ],
                [
                    'title' => 'Manage Users',
                    'action' => '/users',
                    'icon' => 'users',
                ],
            ],
        ])
    
    @endcontent

@endsection
