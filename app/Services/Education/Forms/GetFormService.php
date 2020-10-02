<?php

namespace App\Services\Education\Forms;

use App\Models\Education\FormModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetFormService extends Service implements ServiceContract
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

            return FormModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}