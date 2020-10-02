<?php

namespace App\Services\Education\Lessons;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Education\LessonModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListLessonsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            return LessonModel::paginate(8);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}