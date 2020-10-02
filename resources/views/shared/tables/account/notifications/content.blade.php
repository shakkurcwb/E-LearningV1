<!-- Notification Content -->
<div>
    <p class="mb-0 font-w600">@lang($notification->data['title'])</p>
    <p class="mb-0 text-muted">{{ $notification->created_at->diffForHumans() }}</p>
</div>
<!-- END Notification Content -->