<?php

namespace App\Services\Education\Admissions;

use App\Models\Education\AdmissionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetAdmissionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return AdmissionModel
     */
    public function execute(): ?AdmissionModel
    {
        try {

            $id = $this->getParameter('admission_id');

            return AdmissionModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}