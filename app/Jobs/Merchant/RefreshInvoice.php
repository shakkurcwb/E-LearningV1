<?php

namespace App\Jobs\Merchant;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Merchant\Invoices\State;

use App\Models\Merchant\InvoiceModel;

use Iugu_Invoice;

class RefreshInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $invoice;

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
    public function __construct(InvoiceModel $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Execute the job.
     *
     * @return Void
     */
    public function handle()
    {
        // Declarations
        $invoice = $this->invoice;
        $subscription = $invoice->subscription;
        $user = $subscription->user;
        $plan = $subscription->plan;

        // Execute API Call
        $object = Iugu_Invoice::fetch($invoice->response['id']);

        if ($object->status === 'pending')
        {
            // No Change
        }

        if ($object->status === 'expired')
        {
            $invoice->state = State::EXPIRED;
            $invoice->save();
        }

        if ($object->status === 'paid')
        {
            $invoice->state = State::PAID;
            $invoice->save();
        }

        if ($object->status === 'canceled')
        {
            $invoice->state = State::CANCELED;
            $invoice->save();
        }

        // Free Memory
        unset($invoice);

        return true;
    }
}
