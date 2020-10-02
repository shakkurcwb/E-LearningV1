<!-- Invoice Details -->
<div>
    @if($invoice->state === 'Draft')
        <p class="mb-0 font-w600">
            @icon(['slug' => 'battery-quarter', 'color' => 'danger'])
            @lang('Process Your Invoice To Continue.')
        </p>
    @elseif($invoice->state === 'Canceled' && !empty($invoice->errors))
        <p class="mb-0 font-w600">
            @icon(['slug' => 'battery-half', 'color' => 'danger'])
            @lang('Ops! Something Went Wrong.')
        </p>
        <ol class="mb-0">
            @if(is_array($invoice->errors))
                @foreach($invoice->errors as $field => $error)
                    <li>@lang($field) {{ $error[0] }}</li>
                @endforeach
            @else
                <li>@lang($invoice->errors)</li>
            @endif
        </ol>
    @elseif($invoice->state === 'Paid')
        <p class="mb-0 font-w600">
            @icon(['slug' => 'battery-full', 'color' => 'success'])
            @lang('Invoice Paid.')
        </p>
        <p class="mb-0 text-muted">{{ $invoice->updated_at->diffForHumans() }}</p>
    @elseif($invoice->state === 'Pending')
        <p class="mb-0 font-w600">
            @icon(['slug' => 'battery-three-quarters', 'color' => 'secondary'])
            @lang('We are waiting to confirm your payment.')
        </p>
    @endif
</div>
<!-- END Invoice Details -->