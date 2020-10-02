<?php

namespace App\Services\Education\Admissions;

use App\Models\Education\AdmissionModel;

use App\Services\Education\Answers\StoreAnswerService;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreAdmissionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return AdmissionModel
     */
    public function execute(): ?AdmissionModel
    {
        try {

            $attributes = $this->getAttributes();

            $admission = AdmissionModel::create($attributes);

            # Store Each Answer
            foreach($attributes['form'] as $answer)
            {
                $svc = new StoreAnswerService;
                $svc->setAttributes([
                    'user_id' => $attributes['user_id'],
                    'question_id' => $answer['question_id'],
                    'form_id' => $attributes['form_id'],
                    'answer' => $answer['answer'],
                ]);
                $svc->execute();
            }

            $admission->refresh();

            return $admission;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}