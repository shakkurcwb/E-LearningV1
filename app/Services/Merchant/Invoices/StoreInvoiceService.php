<?php

namespace App\Services\Merchant\Invoices;

use App\Models\Merchant\InvoiceModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreInvoiceService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return InvoiceModel
     */
    public function execute(): ?InvoiceModel
    {
        try {

            $attributes = $this->getAttributes();

            return InvoiceModel::create($attributes);

        } catch(\Exception $e) { $this->report($e); dd($e); }

        return null;
    }
}