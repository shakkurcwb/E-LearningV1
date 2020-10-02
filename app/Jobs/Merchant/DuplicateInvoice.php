<?php

namespace App\Jobs\Merchant;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Libraries\Merchant\Invoices\State;

use App\Models\Merchant\InvoiceModel;

use App\Services\Merchant\Invoices\StoreInvoiceService;

use App\Libraries\Tools;

use Iugu_Invoice;

class DuplicateInvoice implements ShouldQueue
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

        // Update Status
        $invoice->state = State::CANCELED;
        $invoice->save();

        if (!empty($invoice->response))
        {
            // Execute API Call
            $object = Iugu_Invoice::fetch($invoice->response['id']);
            $object->cancel();
        }

        $old_invoice = $invoice;

        // Store New Invoice
        $svc = new StoreInvoiceService;
        $svc->setAttributes([
            'subscription_id' => $old_invoice->subscription->id,
            'method' => $old_invoice->method,
            'cc_token' => $old_invoice->cc_token,
        ]);
        $invoice = $svc->execute();

        // Get Old Request
        $request = $old_invoice->request;

        // Plan Information
        $items = [
            [
                'description' => $plan->name,
                'quantity' => $subscription->quantity,
                'price_cents' => Tools::priceToCents($subscription->total),
            ]
        ];

        // User Information
        $payer = [
            'cpf_cnpj' => $user->person->document,
            'name' => $user->person->first_name . ' ' . $user->person->last_name,
            'email' => $user->email,
            'address' => [
                'zip_code' => $user->address->zip_code,
                'street' => $user->address->address,
                'number' => $user->address->number,
                'complement' => $user->address->complement,
                'district' => $user->address->district,
                'city' => $user->address->city,
                'state' => $user->address->province,
                'country' => $user->address->country,
            ],
        ];

        // Invoice Request
        $request = [
            'email' => $user->email,
            'due_date' => now()->setTimezone($user->settings->timezone)->addDays(7)->format('Y-m-d'),
            'items' => $items,
            'return_url' => url("/subscriptions/{$subscription->id}/activate"),
            'expired_url' => url("/invoices/{$invoice->id}/refresh"),
            'payable_with' => $invoice->method,
            'payer' => $payer,
            'order_id' => uniqid(),
        ];

        // Update Order ID
        $request['order_id'] = uniqid();

        // Store Request
        $invoice->request = $request;

        // Execute API Call
        $response = Iugu_Invoice::create($invoice->request);

        if ($response->id)
        {
            // Store Response
            $invoice->response = [
                'old_id' => $old_invoice->response['id'],
                'id' => $response->id,
            ];

            // Update Status
            $invoice->state = State::PENDING;
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
        unset($invoice, $old_invoice);

        return true;
    }
}
