<?php

namespace App\Jobs\Merchant;

use App\Events\Merchant\SubscriptionActivatedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Merchant\Subscriptions\State as SubscriptionState;
use App\Libraries\Merchant\Invoices\State as InvoiceState;

use App\Models\Merchant\SubscriptionModel;

use Iugu_Invoice;

class ActivateSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscription;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var Int
     */
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return Void
     */
    public function __construct(SubscriptionModel $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Execute the job.
     *
     * @return Void
     */
    public function handle()
    {
        // Declarations
        $subscription = $this->subscription;
        $user = $subscription->user;
        $plan = $subscription->plan;
        $invoices = $subscription->invoices;

        if ($subscription->state === SubscriptionState::PENDING) {

            foreach($invoices as $invoice)
            {
                // Execute API Call
                $object = Iugu_Invoice::fetch($invoice->response['id']);

                if ($object->status === 'paid')
                {
                    $invoice->state = InvoiceState::PAID;
                    $invoice->save();

                    $subscription->state = SubscriptionState::ACTIVATED;
                    $subscription->save();

                    $subscription->refresh();

                    // Trigger Event
                    event(new SubscriptionActivatedEvent($subscription));

                    // Add Credits
                    $user->increment('credits', $plan->features->credits * $subscription->quantity);
                }
            }

        }

        // Free Memory
        unset($subscription);

        return true;
    }
}
