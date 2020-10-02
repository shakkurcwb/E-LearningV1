<?php

namespace App\Services\Education\Forms;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Education\FormModel;

use App\Services\Service;
use App\Services\ServiceContract;

class SearchFormsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function execute(): ?Collection
    {
        try {

            $query = $this->getAttribute('query');

            $builder = FormModel::where('title', 'like', "%{$query}%")
                ->orWhere('type', 'like', "%{$query}%")
                ->orWhere('tags', 'like', "%{$query}%");

            return $builder->get();

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}