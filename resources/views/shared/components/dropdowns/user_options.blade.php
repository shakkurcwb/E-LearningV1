<div class="dropdown d-inline-block ml-2">
    <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded" src="{{ Auth::user()->settings->avatar_url }}" alt="Header Avatar" style="width: 18px;">
        <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
        <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
        <div class="p-3 text-center bg-primary">
            <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ Auth::user()->settings->avatar_url }}" alt="Avatar">
        </div>
        <div class="p-2">
            <h5 class="dropdown-header text-uppercase">@lang('theme.header.user_options')</h5>
            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/account') }}">
                <span>@lang('theme.menu.account')</span>
                <i class="si si-lock"></i>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/settings') }}">
                <span>@lang('theme.menu.settings')</span>
                <i class="si si-settings"></i>
            </a>
            @if(Auth::user()->state === 'Active')
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/profile') }}">
                    <span>@lang('theme.menu.profile')</span>
                    <i class="si si-user"></i>
                </a>
            @endif
            <div role="separator" class="dropdown-divider"></div>
            <h5 class="dropdown-header text-uppercase">@lang('theme.header.actions')</h5>
            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/help') }}">
                <span>@lang('theme.menu.help')</span>
                <i class="si si-question"></i>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/feedback') }}">
                <span>@lang('theme.menu.feedback')</span>
                <i class="si si-speech"></i>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between"
                href="javascript:void(0)"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>@lang('theme.menu.logout')</span>
                <i class="si si-logout ml-1"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>