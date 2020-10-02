<?php

namespace App\Http\Controllers\Merchant\Invoices;

use Illuminate\Http\Request;

use App\Services\Merchant\Invoices\GetInvoiceService;

use App\Jobs\Merchant\RefreshInvoice;

use App\Http\Controllers\Controller;

class RefreshController extends Controller
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

        // Job Refresh Invoice
        RefreshInvoice::dispatch($invoice);

        return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('info', __('merchant.alerts.invoices.refresh_success'));
    }
}
