<?php

namespace App\Services\Education\Forms;

use Illuminate\Database\Eloquent\Collection;

use App\Libraries\Education\Forms\Type;

use App\Models\Education\FormModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListFormsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function execute(): ?Collection
    {
        try {

            return FormModel::orderBy('created_at')->get();

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}