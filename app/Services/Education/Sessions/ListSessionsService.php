<?php

namespace App\Services\Education\Sessions;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Education\SessionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListSessionsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            $user_id = $this->getParameter('user_id');

            return SessionModel::where('student_id', $user_id)
                ->orWhere('tutor_id', $user_id)
                ->orderBy('start_at', 'ASC')
                ->paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}