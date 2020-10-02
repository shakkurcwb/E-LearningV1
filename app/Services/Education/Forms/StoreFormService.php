<?php

namespace App\Services\Education\Forms;

use Illuminate\Support\Arr;

use App\Models\Education\FormModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreFormService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return FormModel
     */
    public function execute(): ?FormModel
    {
        try {

            $attributes = $this->getAttributes();

            $form = FormModel::create(
                Arr::except($attributes, [ 'questions' ])
            );

            $form->questions()->createMany($attributes['questions'] ?? []);
            $form->refresh();

            return $form;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}