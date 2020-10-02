@if(Auth::user()->role === 'Admin')

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('plans*') ? 'active' : '' }}" href="{{ url('/plans') }}">
            <i class="nav-main-link-icon si si-map"></i>
            <span class="nav-main-link-name">@lang('theme.menu.plans')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('coupons*') ? 'active' : '' }}" href="{{ url('/coupons') }}">
            <i class="nav-main-link-icon si si-tag"></i>
            <span class="nav-main-link-name">@lang('theme.menu.coupons')</span>
        </a>
    </li>

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('forms*') ? 'active' : '' }}" href="{{ url('/forms') }}">
            <i class="nav-main-link-icon si si-docs"></i>
            <span class="nav-main-link-name">@lang('theme.menu.forms')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('admissions*') ? 'active' : '' }}" href="{{ url('/admissions') }}">
            <i class="nav-main-link-icon si si-shield"></i>
            <span class="nav-main-link-name">@lang('theme.menu.admissions')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('auditions*') ? 'active' : '' }}" href="{{ url('/auditions') }}">
            <i class="nav-main-link-icon si si-emoticon-smile"></i>
            <span class="nav-main-link-name">@lang('theme.menu.auditions')</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('lives*') ? 'active' : '' }}" href="{{ url('/lives') }}">
            <i class="nav-main-link-icon si si-earphones-alt"></i>
            <span class="nav-main-link-name">@lang('theme.menu.lives')</span>
        </a>
    </li>
    <!--
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('transfers*') ? 'active' : '' }}" href="{{ url('/transfers') }}">
            <i class="nav-main-link-icon si si-cursor"></i>
            <span class="nav-main-link-name">@lang('theme.menu.transfers')</span>
        </a>
    </li>
    -->

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ url('/users') }}">
            <i class="nav-main-link-icon si si-users"></i>
            <span class="nav-main-link-name">@lang('theme.menu.users')</span>
        </a>
    </li>

    <li class="nav-main-heading"></li>
    <li class="nav-main-item">
        <a class="nav-main-link {{ request()->is('diagnostics*') ? 'active' : '' }}" href="{{ url('/diagnostics') }}">
            <i class="nav-main-link-icon si si-wrench"></i>
            <span class="nav-main-link-name">@lang('theme.menu.diagnostics')</span>
        </a>
    </li>

@endif