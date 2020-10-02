<?php

namespace App\Services\Education\Sessions;

use App\Models\Education\SessionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetSessionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return SessionModel
     */
    public function execute(): ?SessionModel
    {
        try {

            $id = $this->getParameter('session_id');

            return SessionModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}