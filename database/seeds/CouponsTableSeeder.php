<?php

use App\Services\Merchant\Coupons\StoreCouponService;

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    public function run()
    {
        $coupon25 = new StoreCouponService();
        $coupon25->setAttributes([
            'slug' => 'student25',
            'discount' => 25,
            'expires_at' => now()->addDays(7),
        ]);
        $coupon25->execute();

        $coupon50 = new StoreCouponService();
        $coupon50->setAttributes([
            'slug' => 'student50',
            'discount' => 50,
            'expires_at' => now()->addDays(2),
        ]);
        $coupon50->execute();
    }
}