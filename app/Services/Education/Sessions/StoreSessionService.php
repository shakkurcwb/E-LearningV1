<?php

namespace App\Services\Education\Sessions;

use App\Models\Education\SessionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreSessionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return SessionModel
     */
    public function execute(): ?SessionModel
    {
        try {

            $attributes = $this->getAttributes();

            $session = SessionModel::create($attributes);
            $session->live()->create([]);
            $session->refresh();

            return $session;

        } catch(\Exception $e) { dd($e); $this->report($e); }

        return null;
    }
}