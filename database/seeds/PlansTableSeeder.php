<?php

use App\Services\Merchant\Plans\StorePlanService;

use App\Libraries\Merchant\Plans\Interval;
use App\Libraries\Merchant\Features\Duration;
use App\Libraries\Merchant\Features\Frequency;

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    public function run()
    {
        $gold = new StorePlanService();
        $gold->setAttributes([
            'name' => 'Plano Gold',
            'price' => 100,
            'interval' => Interval::MONTHLY,
            'is_recommended' => false,
            'credits' => 5,
            'frequency' => Frequency::ONCE_PER_WEEK,
            'duration' => Duration::TWO_HOURS,
        ]);
        $gold->execute();

        $platinum = new StorePlanService();
        $platinum->setAttributes([
            'name' => 'Plano Platinum',
            'price' => 240,
            'interval' => Interval::MONTHLY,
            'is_recommended' => true,
            'credits' => 10,
            'frequency' => Frequency::TWICE_PER_WEEK,
            'duration' => Duration::ONE_HOUR,
        ]);
        $platinum->execute();

        $single = new StorePlanService();
        $single->setAttributes([
            'name' => 'Plano Avulso',
            'price' => 20,
            'interval' => Interval::SINGLE,
            'is_recommended' => false,
            'credits' => 1,
            'frequency' => Frequency::UNIQUE,
            'duration' => Duration::ONE_HOUR,
        ]);
        $single->execute();
    }
}