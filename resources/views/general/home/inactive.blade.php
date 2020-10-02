@extends('shared.core.theme')

@section('content')

    @hero_image([
        'title' => 'Just few steps until you start enjoying our community.',
        'subtitle' => 'Please review and complete the missions below.',
        'background' => Auth::user()->settings->background_url,
    ])

    @content

        @status

        @if(Auth::user()->role === 'Tutor' && Auth::user()->state === 'On Validation')

            @include('shared.components.alerts.raw.info', [
                'message' => __('We are currently reviewing your admission form. Please bear with us.'),
            ])

        @endif

        @include('shared.components.blocks.quest_log')

        @if(Auth::user()->state === 'Inactive')
        
            @action_btn([
                'title' => 'Complete the admission form to start your journey!',
                'label' => 'Admission Form',
                'action' => '/admission',
            ])

        @endif

    @endcontent

@endsection
