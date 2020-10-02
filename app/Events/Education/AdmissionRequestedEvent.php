<?php

namespace App\Events\Education;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

use App\Models\Education\AdmissionModel;

class AdmissionRequestedEvent
{
    use Dispatchable, SerializesModels;

    public $admission;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AdmissionModel $admission)
    {
        $this->admission = $admission;
    }
}
