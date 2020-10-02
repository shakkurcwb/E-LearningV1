<?php

namespace App\Services\Education\Answers;

use App\Models\Education\AnswerModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreAnswerService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return AnswerModel
     */
    public function execute(): ?AnswerModel
    {
        try {

            $attributes = $this->getAttributes();

            return AnswerModel::create($attributes);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}