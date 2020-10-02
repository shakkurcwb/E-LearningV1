<?php

namespace App\Services\Education\Admissions;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Education\AdmissionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class SearchAdmissionsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            $query = $this->getAttribute('query');

            $builder = AdmissionModel::whereHas('user', function ($b) use ($query) {
                $b->where('email', 'like', "%{$query}%");
                $b->orWhere('role', 'like', "%{$query}%");
                $b->orWhereHas('person', function ($b2) use ($b, $query) {
                    $b2->where('first_name', 'like', "%{$query}%");
                    $b2->orWhere('last_name', 'like', "%{$query}%");
                });
            });

            return $builder->paginate(4);

        } catch(\Exception $e) { dd($e); $this->report($e); }

        return null;
    }
}