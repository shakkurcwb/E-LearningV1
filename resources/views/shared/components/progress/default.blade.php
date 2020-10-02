<!-- Progress -->
<div class="progress push">
    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $progress ?? 0 }}%;" aria-valuenow="{{ $progress ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
        @if($progress > 0) <span class="font-size-sm font-w600">{{ $progress ?? 0 }}%</span> @endif
    </div>
</div>
<!-- Progress -->