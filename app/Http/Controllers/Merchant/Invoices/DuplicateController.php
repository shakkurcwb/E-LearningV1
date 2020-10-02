<?php

namespace App\Http\Controllers\Merchant\Invoices;

use Illuminate\Http\Request;

use App\Services\Merchant\Invoices\GetInvoiceService;

use App\Jobs\Merchant\DuplicateInvoice;

use App\Http\Controllers\Controller;

class DuplicateController extends Controller
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

        // Job Duplicate Invoice
        DuplicateInvoice::dispatch($invoice);

        return $this->redirect('/subscriptions/' . $invoice->subscription->id)->with('info', __('merchant.alerts.invoices.duplicate_success'));
    }
}
