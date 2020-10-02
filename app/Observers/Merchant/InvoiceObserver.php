<?php

namespace App\Observers\Merchant;

use App\Models\Merchant\InvoiceModel;

use App\Notifications\Merchant\InvoiceCreated;
use App\Notifications\Merchant\InvoiceProcessing;
use App\Notifications\Merchant\InvoiceProcessed;
use App\Notifications\Merchant\InvoiceWaitingPayment;
use App\Notifications\Merchant\InvoicePaymentConfirmed;
use App\Notifications\Merchant\InvoiceCanceled;
use App\Notifications\Merchant\InvoiceFailed;

class InvoiceObserver
{
    /**
     * Handle the invoice "created" event.
     *
     * @param  \App\Models\Sales\InvoiceModel  $invoice
     * @return void
     */
    public function created(InvoiceModel $invoice)
    {
        $invoice->notify(new UserCreated($invoice));
    }

    /**
     * Handle the invoice "updated" event.
     *
     * @param  \App\Models\Sales\InvoiceModel  $invoice
     * @return void
     */
    public function updated(InvoiceModel $invoice)
    {
        $invoice->notify(new UserUpdated($invoice));
    }

    /**
     * Handle the invoice "deleted" event.
     *
     * @param  \App\Models\Sales\InvoiceModel  $invoice
     * @return void
     */
    public function deleted(InvoiceModel $invoice)
    {
        // 
    }

    /**
     * Handle the invoice "restored" event.
     *
     * @param  \App\Models\Sales\InvoiceModel  $invoice
     * @return void
     */
    public function restored(InvoiceModel $invoice)
    {
        // 
    }

    /**
     * Handle the invoice "force deleted" event.
     *
     * @param  \App\Models\Sales\InvoiceModel  $invoice
     * @return void
     */
    public function forceDeleted(InvoiceModel $invoice)
    {
        // 
    }
}
