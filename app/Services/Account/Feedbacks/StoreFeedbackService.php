<?php

namespace App\Services\Account\Feedbacks;

use App\Models\Account\FeedbackModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreFeedbackService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return FeedbackModel
     */
    public function execute(): ?FeedbackModel
    {
        try {

            $attributes = $this->getAttributes();

            return FeedbackModel::create($attributes);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}