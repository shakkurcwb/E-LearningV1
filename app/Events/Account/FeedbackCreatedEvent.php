<?php

namespace App\Events\Account;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

use App\Models\Account\FeedbackModel;

class FeedbackCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $feedback;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FeedbackModel $feedback)
    {
        $this->feedback = $feedback;
    }
}
