<?php

namespace App\Services\Merchant\Invoices;

use App\Models\Merchant\InvoiceModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetInvoiceservice extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return InvoiceModel
     */
    public function execute(): ?InvoiceModel
    {
        try {

            $id = $this->getParameter('invoice_id');

            return InvoiceModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}