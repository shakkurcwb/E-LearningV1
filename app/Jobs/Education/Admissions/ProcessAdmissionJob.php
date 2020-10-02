<?php

namespace App\Jobs\Education\Admissions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Account\Users\Role;
use App\Libraries\Account\Users\State;

use App\Events\Education\AdmissionRequestedEvent;
use App\Events\Education\AdmissionApprovedEvent;

use App\Models\Education\AdmissionModel;

class ProcessAdmissionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $admission;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdmissionModel $admission)
    {
        $this->admission = $admission;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admission = $this->admission;
        $user = $admission->user;

        # Student Flow
        if ($user->role === Role::STUDENT)
        {
            $user->state = State::ACTIVE;
            $admission->is_approved = true;
            $admission->verified_at = now();

            // Trigger Event
            event(new AdmissionApprovedEvent($admission));
        }

        # Tutor Flow
        if ($user->role === Role::TUTOR)
        {
            $user->state = State::ON_VALIDATION;

            // Trigger Event
            event(new AdmissionRequestedEvent($admission));
        }

        $user->save();
        $admission->save();

        // Add Reputation Points
        $user->increment('reputation', 5);

        return true;
    }
}
