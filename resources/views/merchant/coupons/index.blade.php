@extends('shared.core.theme')

@section('content')

    @hero([
        'title' => 'merchant.pages.coupons.title',
        'page' => 'coupons',
    ])

    @content

        @status

        @include('shared.tables.merchant.coupons.template', [
            'action' => '/coupons',
            'hidden' => !empty($coupon) || $errors->any(),
        ])

        @empty($coupon)

            @include('shared.forms.merchant.coupon', [
                'action' => '/coupons',
                'method' => 'post',
                'coupon' => new App\Models\Merchant\CouponModel,
            ])

        @else

            @include('shared.forms.merchant.coupon', [
                'action' => "/coupons/{$coupon->id}",
                'method' => 'patch',
                'coupon' => $coupon,
            ])

        @endempty

    @endcontent

@endsection