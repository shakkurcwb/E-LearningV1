<header id="page-header">

    <div class="content-header">

        <div class="d-flex align-items-center">

            <!-- Toggle Sidebar -->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- Toggle Mini Sidebar -->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>

            @if(Auth::user()->role === 'Student' && Auth::user()->state === 'Active')

                @include('shared.components.badges.credits', [
                    'amount' => Auth::user()->credits,
                ])

            @endif

            @if(Auth::user()->role !== 'Admin' && Auth::user()->state === 'Active')

                @include('shared.components.badges.reputation', [
                    'amount' => Auth::user()->reputation,
                ])

            @endif

            @if(Auth::user()->role === 'Admin')

                @include('shared.components.badges.online', [
                    'amount' => \App\Models\Account\UserModel::where('last_seen_at', '>=', now()->addMinutes(-15))->count(),
                ])

            @endif

        </div>

        <div class="d-flex align-items-center">

            <!-- User Options Dropdown -->
            @include('shared.components.dropdowns.user_options')

            <!-- Notifications Dropdown -->
            @include('shared.components.dropdowns.notifications')

            <!-- Toggle Side Overlay -->
            <!--
            <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
            -->

        </div>

    </div>

</header>