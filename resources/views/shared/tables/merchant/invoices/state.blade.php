<!-- Invoice State -->
<div>

    @if($invoice->state === 'Draft')
        @badge(['label' => $invoice->state, 'color' => 'secondary'])
    @elseif($invoice->state === 'Canceled')
        @badge(['label' => $invoice->state, 'color' => 'danger'])
    @elseif($invoice->state === 'Paid')
        @badge(['label' => $invoice->state, 'color' => 'success'])
    @elseif($invoice->state === 'Pending')
        @badge(['label' => $invoice->state, 'color' => 'info'])
    @else - @endif

</div>
<!-- END Invoice State -->