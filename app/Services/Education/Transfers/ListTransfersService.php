<?php

namespace App\Services\Education\Transfers;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Education\DepositModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListTransfersService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            return DepositModel::paginate(8);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}