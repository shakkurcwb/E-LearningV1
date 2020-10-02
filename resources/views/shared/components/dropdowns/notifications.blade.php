<div class="dropdown d-inline-block ml-2">
    <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="si si-bell"></i>
        @if(Auth::user()->unreadNotifications->count() > 0)
            <span class="badge badge-primary badge-pill">{{ Auth::user()->unreadNotifications->count() }}</span>
        @endif
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-2 bg-primary text-center">
            <h5 class="dropdown-header text-uppercase text-white">@lang('theme.notifications.title')</h5>
        </div>
        <ul class="nav-items mb-0">
            @foreach(Auth::user()->unreadNotifications as $notification)
                <li>
                    <a class="text-dark media py-2" href="javascript:void(0);">
                        <div class="mr-2 ml-3">
                            <i class="fa fa-fw {{ $notification->data['icon'] ?? 'fa-check-circle text-success' }}"></i>
                        </div>
                        <div class="media-body pr-2">
                            <div class="font-w600">{{ $notification->data['title'] ?? $notification->type }}</div>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="p-2 border-top">
            <a class="btn btn-sm btn-light btn-block text-center" href="{{ url('/notifications') }}">
                @lang('theme.notifications.view_all')
            </a>
            @if(Auth::user()->unreadNotifications->count() > 0)
                <a class="btn btn-sm btn-light btn-block text-center" href="{{ url('/notifications/read') }}">
                    @lang('theme.notifications.mark_all_as_read')
                </a>
            @endif
        </div>
    </div>
</div>