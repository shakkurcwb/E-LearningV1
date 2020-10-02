@if(Auth::user()->role === 'Tutor')

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('sessions*') ? 'active' : '' }}" href="{{ url('/sessions') }}">
            <i class="nav-main-link-icon si si-earphones-alt"></i>
            <span class="nav-main-link-name">@lang('theme.menu.sessions')</span>
        </a>
    </li>
    <!--
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('lessons*') ? 'active' : '' }}" href="{{ url('/lessons') }}">
            <i class="nav-main-link-icon si si-note"></i>
            <span class="nav-main-link-name">@lang('theme.menu.lessons')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('deposits*') ? 'active' : '' }}" href="{{ url('/deposits') }}">
            <i class="nav-main-link-icon si si-wallet"></i>
            <span class="nav-main-link-name">@lang('theme.menu.deposits')</span>
        </a>
    </li>
    -->

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('preferences*') ? 'active' : '' }}" href="{{ url('/preferences') }}">
            <i class="nav-main-link-icon si si-lock"></i>
            <span class="nav-main-link-name">@lang('theme.menu.preferences')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('availabilities*') ? 'active' : '' }}" href="{{ url('/availabilities') }}">
            <i class="nav-main-link-icon si si-calendar"></i>
            <span class="nav-main-link-name">@lang('theme.menu.availabilities')</span>
        </a>
    </li>

@endif