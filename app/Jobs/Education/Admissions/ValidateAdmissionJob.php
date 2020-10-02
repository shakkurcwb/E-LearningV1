<?php

namespace App\Jobs\Education\Admissions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Account\Users\State;

use App\Events\Education\AdmissionApprovedEvent;
use App\Events\Education\AdmissionRejectedEvent;

use App\Models\Education\AdmissionModel;

class ValidateAdmissionJob implements ShouldQueue
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

        # Approved Flow
        if ($admission->is_approved)
        {
            $user->state = State::ACTIVE;
            $admission->verified_at = now();

            // Trigger Event
            event(new AdmissionApprovedEvent($admission));
        }

        # Tutor Flow
        if (!$admission->is_approved)
        {
            $user->state = State::INACTIVE;
            $admission->verified_at = now();
            // $admission->delete();

            // Trigger Event
            event(new AdmissionRejectedEvent($admission));
        }

        $user->save();
        $admission->save();

        return true;
    }
}
