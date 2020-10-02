@if(Auth::user()->state !== 'Inactive')

    <!-- Profile Progress -->
    <p class="mb-0 font-w600 font-size-sm">@lang('account.pages.account.profile_progress', [ 'progress' => $progress ])</p>
    @include('shared.components.progress.default', [ 'progress' => $progress ])
    <!-- END Profile Progress -->

@endif