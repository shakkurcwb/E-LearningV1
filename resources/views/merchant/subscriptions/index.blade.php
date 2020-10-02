@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'merchant.pages.subscriptions.title',
        'page' => 'subscriptions',
    ])

    @content

        @status

        @include('shared.tables.merchant.subscriptions.template', [
            'action' => '/subscriptions',
            'hidden' => !empty($subscription),
        ])

        @empty($subscription)

        @else

            @include('shared.tables.merchant.invoices.template', [
                'action' => '/invoices',
                'invoices' => $subscription->invoices,
            ])

        @endempty

    @endcontent

@endsection