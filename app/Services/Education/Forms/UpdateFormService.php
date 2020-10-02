<?php

namespace App\Services\Education\Forms;

use Illuminate\Support\Arr;

use App\Models\Education\FormModel;
use App\Models\Education\QuestionModel;
use App\Services\Service;
use App\Services\ServiceContract;

class UpdateFormService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return FormModel
     */
    public function execute(): ?FormModel
    {
        try {

            $id = $this->getParameter('form_id');

            $attributes = $this->getAttributes();

            $form = FormModel::findOrFail($id);
            $form->update(
                Arr::except($attributes, [ 'questions' ])
            );

            // Update Questions
            foreach($attributes['questions'] as $question)
            {
                $question['form_id'] = $id;
                if (array_key_exists('id', $question))
                {
                    $q = QuestionModel::findOrFail($question['id']);
                    $q->update($question);
                    $q->refresh();
                }
                else
                {
                    $q = QuestionModel::create($question);
                }
            }

            $form->refresh();

            return $form;

        } catch(\Exception $e) { dd($e); $this->report($e); }

        return null;
    }
}