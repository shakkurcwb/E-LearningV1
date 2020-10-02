<?php

namespace App\Jobs\Merchant;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Merchant\Invoices\State;

use App\Models\Merchant\InvoiceModel;

use Iugu_Charge;

class ChargeInvoice implements ShouldQueue
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

        // Invoice Request
        $request = [
            'invoice_id' => $invoice->response['id'],
            'token' => $invoice->cc_token,
        ];

        // Execute API Call
        $response = Iugu_Charge::create($request);

        if ($response->success)
        {
            // Store Response
            $invoice->response = array_merge($invoice->response, [
                'message' => $response->message,
            ]);

            // Update Status
            $invoice->state = State::PAID;
            $invoice->save();
        }
        else
        {
            // Store Errors
            $invoice->errors = $response->errors;

            // Update Status
            $invoice->state = State::CANCELED;
            $invoice->save();
        }

        // Free Memory
        unset($invoice);

        return true;
    }
}
