<nav id="sidebar" aria-label="Main Navigation">

    <!-- Side Header -->
    <div class="content-header bg-white-5">

        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ config('app.url') }}">
            <i class="fa fa-atom text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5 ml-1">{{ config('app.name') }}</span>
            </span>
        </a>
        <!-- END Logo -->

    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">

            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                    <i class="nav-main-link-icon si si-home"></i>
                    <span class="nav-main-link-name">@lang('theme.menu.home')</span>
                </a>
            </li>

            @if(Auth::user()->state === 'Inactive')

                <li class="nav-main-heading"></li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->is('admission') ? 'active' : '' }}" href="{{ url('/admission') }}">
                        <i class="nav-main-link-icon si si-pencil"></i>
                        <span class="nav-main-link-name">@lang('theme.menu.admission')</span>
                    </a>
                </li>

                @if(Auth::user()->role === 'Student')

                    <li class="nav-main-heading"></li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('pricing') ? 'active' : '' }}" href="{{ url('/pricing') }}">
                            <i class="nav-main-link-icon si si-basket"></i>
                            <span class="nav-main-link-name">@lang('theme.menu.pricing')</span>
                        </a>
                    </li>

                @endif

            @endif

            @if(Auth::user()->state === 'Active')

                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                        <i class="nav-main-link-icon si si-bar-chart"></i>
                        <span class="nav-main-link-name">@lang('theme.menu.dashboard')</span>
                    </a>
                </li>

                @include('shared.components.navigation.student')

                @include('shared.components.navigation.tutor')

                @include('shared.components.navigation.admin')

            @endif

            @if(Auth::user()->state === 'On Validation')

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

        </ul>
    </div>
    <!-- END Side Navigation -->

    @if(config('app.debug'))

        <!-- User Preferences -->
        <div class="col-sm-12 text-lighter text-small p-2">
            <div>@lang('Locale'):
                <p class="mb-0 badge badge-primary">{{ Auth::user()->settings->locale ?? config('app.locale') }}</p>
            </div>
            <div>@lang('Timezone'):
                <p class="mb-0 badge badge-primary">{{ Auth::user()->settings->timezone ?? config('app.timezone') }}</p>
            </div>
            <div>@lang('Time Now'):
                <p class="mb-0 badge badge-primary">{{ now()->setTimezone(Auth::user()->settings->timezone ?? config('app.timezone')) }}</p>
            </div>
            <div>@lang('Currency'):
                <p class="mb-0 badge badge-primary">{{ Auth::user()->settings->currency ?? config('app.currency') }}</p>
            </div>
            <div>@lang('Ip Address'):
                <p class="mb-2 badge badge-primary">{{ Auth::user()->ip_address ?? '127.0.0.1' }}</p>
            </div>
            @if(Auth::user()->getActiveSubscriptionAttribute())
                <div>@lang('Active Plan'):
                    <p class="mb-0 badge badge-primary">{{ Auth::user()->getActiveSubscriptionAttribute()->plan->name }}</p>
                </div>
                <div>@lang('Total Paid'):
                    <p class="mb-0 badge badge-primary">{{ Auth::user()->getActiveSubscriptionAttribute()->total }} {{ config('app.currency') }}</p>
                </div>
            @endif
        </div>
        <!-- END User Preferences -->

    @endif

</nav>