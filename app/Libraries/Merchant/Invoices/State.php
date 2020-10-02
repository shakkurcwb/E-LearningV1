<?php

namespace App\Libraries\Merchant\Invoices;

class State
{
    public const DRAFT = 'Draft';
    public const PENDING = 'Pending';
    public const PARTIALLY_PAID = 'Partially Paid';
    public const PAID = 'Paid';
    public const CANCELED = 'Canceled';
    public const REFUNDED = 'Refunded';
    public const EXPIRED = 'Expired';
    public const IN_PROTEST = 'In Protest';
    public const CHARGEBACK = 'Chargeback';
    public const IN_ANALYSIS = 'In Analysis';
}