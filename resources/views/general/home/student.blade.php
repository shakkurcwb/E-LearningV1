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
                    'title' => 'Schedule Sessions',
                    'action' => '/schedule',
                    'icon' => 'calendar-alt',
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
                    'title' => 'Pricing',
                    'action' => '/pricing',
                    'icon' => 'shopping-cart',
                ],
                [
                    'title' => 'Subscribe Plan',
                    'action' => '/subscribe',
                    'icon' => 'rocket',
                ],
                [
                    'title' => 'Subscriptions',
                    'action' => '/subscriptions',
                    'icon' => 'podcast',
                ],
            ],
        ])

        @if(Auth::user()->subscriptions->count() === 0)

            @action_btn([
                'title' => 'Check out our plans and subscribe today!',
                'label' => 'See Pricing',
                'action' => '/pricing',
            ])

        @endif
    
    @endcontent

@endsection
