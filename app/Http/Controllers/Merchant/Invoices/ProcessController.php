<?php

namespace App\Http\Controllers\Merchant\Invoices;

use Illuminate\Http\Request;

use App\Services\Merchant\Invoices\GetInvoiceService;

use App\Jobs\Merchant\CreateInvoice;
use App\Jobs\Merchant\ChargeInvoice;

use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('student');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        $svc = new GetInvoiceService;
        $svc->setParameters([ 'invoice_id' => $id ]);
        $invoice = $svc->execute();

        try
        {

            // Job Create Invoice
            CreateInvoice::dispatch($invoice);
            
            if ($invoice->method === 'credit_card')
            {
                $invoice->refresh();

                // Job Charge Invoice
                ChargeInvoice::dispatch($invoice);
            }

        }
        catch(\Exception $e)
        {
            dd($e);
        }

        $invoice->refresh();

        // Bank Slip
        if ($invoice->state === 'Pending')
        {
            return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('info', __('merchant.alerts.invoices.create_info'));
        }

        // Credit Card
        if ($invoice->state === 'Paid')
        {
            return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('success', __('merchant.alerts.invoices.create_success'));
        }

        if ($invoice->state === 'Canceled')
        {
            return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('error', __('merchant.alerts.invoices.create_failed'));
        }

        return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('error', __('merchant.alerts.invoices.create_failed'));
    }
}
