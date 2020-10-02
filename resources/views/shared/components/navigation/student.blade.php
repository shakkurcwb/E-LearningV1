@if(Auth::user()->role === 'Student')

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('schedule*') ? 'active' : '' }}" href="{{ url('/schedule') }}">
            <i class="nav-main-link-icon si si-calculator"></i>
            <span class="nav-main-link-name">@lang('theme.menu.schedule')</span>
        </a>
    </li>
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
    -->

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('pricing*') ? 'active' : '' }}" href="{{ url('/pricing') }}">
            <i class="nav-main-link-icon si si-basket"></i>
            <span class="nav-main-link-name">@lang('theme.menu.pricing')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('subscribe*') ? 'active' : '' }}" href="{{ url('/subscribe') }}">
            <i class="nav-main-link-icon si si-diamond"></i>
            <span class="nav-main-link-name">@lang('theme.menu.subscribe')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('subscriptions*') ? 'active' : '' }}" href="{{ url('/subscriptions') }}">
            <i class="nav-main-link-icon si si-feed"></i>
            <span class="nav-main-link-name">@lang('theme.menu.subscriptions')</span>
        </a>
    </li>

@endif