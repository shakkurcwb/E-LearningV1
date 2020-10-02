<?php

namespace App\Services\Education\Admissions;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Education\AdmissionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListAdmissionsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            return AdmissionModel::orderBy('created_at', 'desc')->paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}