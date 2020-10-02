@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'merchant.pages.plans.title',
        'page' => 'plans',
    ])

    @content

        @status

        @include('shared.tables.merchant.plans.template', [
            'action' => '/plans',
            'hidden' => !empty($plan) || $errors->any(),
        ])

        @empty($plan)

            @include('shared.forms.merchant.plan', [
                'action' => '/plans',
                'method' => 'post',
                'plan' => new App\Models\Merchant\PlanModel,
            ])

        @else

            @include('shared.forms.merchant.plan', [
                'action' => "/plans/{$plan->id}",
                'method' => 'patch',
                'plan' => $plan,
            ])

        @endempty

    @endcomponent

@endsection