<span class="badge badge-{{ $amount > 0 ? 'success' : 'danger' }} mr-2">
    <i class="fa fa-dollar-sign"></i> @lang(':amount credits', [ 'amount' => $amount ])
</span>