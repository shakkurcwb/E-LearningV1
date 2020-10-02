
@if(Auth::user()->state !== 'Inactive')

    <!-- Preferences Progress -->
    <p class="mb-0 font-w600 font-size-sm">@lang('account.pages.preferences.preferences_progress', [ 'progress' => $progress ])</p>
    @include('shared.components.progress.default', [ 'progress' => $progress ])
    <!-- END Preferences Progress -->

@endif