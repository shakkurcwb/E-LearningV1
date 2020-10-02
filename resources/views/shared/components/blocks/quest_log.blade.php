@if(Auth::user()->settings->show_hints)

    @component('shared.components.blocks.simple', [
        'title' => __('Quest Log'),
    ])

        <ul class="fa-ul">

            @if(!Auth::user()->person->isFilled())
                <li>
                    <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                    <a href="{{ url('/account') }}">@lang('Set up your personal informations')</a>
                    <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                </li>
            @else
                <li>
                    <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                    @lang('You set up your personal informations')
                    <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                </li>
            @endif

            @if(Auth::user()->admissions->count() === 0)
                <li>
                    <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                    <a href="{{ url('/admission') }}">@lang('Complete the admission form for newcomers')</a>
                    <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 5 ])</span>
                </li>
            @else
                <li>
                    <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                    @lang('You completed the admission form')
                    <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 5 ])</span>
                </li>
            @endif

            @if(!Auth::user()->settings->avatar)
                <li>
                    <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                    <a href="{{ url('/settings') }}">@lang('Set up your public avatar')</a>
                    <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 1 ])</span>
                </li>
            @else
                <li>
                    <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                    @lang('You set up your public avatar')
                    <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 1 ])</span>
                </li>
            @endif

            @if(!Auth::user()->settings->background)
                <li>
                    <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                    <a href="{{ url('/settings') }}">@lang('Set up your background image')</a>
                    <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 1 ])</span>
                </li>
            @else
                <li>
                    <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                    @lang('You set up your background image')
                    <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 1 ])</span>
                </li>
            @endif

            @if(Auth::user()->state !== 'Inactive')

                @if(!Auth::user()->address->isFilled())
                    <li>
                        <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                        <a href="{{ url('/account') }}">@lang('Set up your address informations')</a>
                        <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @else
                    <li>
                        <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                        @lang('You set up your address informations')
                        <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @endif

                @if(!Auth::user()->phone->isFilled())
                    <li>
                        <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                        <a href="{{ url('/account') }}">@lang('Set up your phone informations')</a>
                        <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @else
                    <li>
                        <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                        @lang('You set up your phone informations')
                        <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @endif

            @endif

            @if(Auth::user()->role === 'Tutor' && Auth::user()->state !== 'Inactive')

                @if(!Auth::user()->preferences->isFilled())
                    <li>
                        <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                        <a href="{{ url('/preferences') }}">@lang('Set up your preferences informations')</a>
                        <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @else
                    <li>
                        <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                        @lang('You set up your preferences informations')
                        <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @endif

                @if(!Auth::user()->bank_account->isFilled())
                    <li>
                        <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                        <a href="{{ url('/preferences') }}">@lang('Set up your bank account informations')</a>
                        <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @else
                    <li>
                        <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                        @lang('You set up your bank account informations')
                        <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @endif

                @if(!Auth::user()->preferences->availabilities)
                    <li>
                        <span class="fa-li"><i class="fa fa-exclamation-circle text-danger"></i></span>
                        <a href="{{ url('/availabilities') }}">@lang('Set up your availabilities')</a>
                        <span class="badge badge-primary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @else
                    <li>
                        <span class="fa-li"><i class="fa fa-check-circle text-success"></i></span>
                        @lang('You set up your availabilities')
                        <span class="badge badge-secondary">@lang(':amount RP', [ 'amount' => 2 ])</span>
                    </li>
                @endif

            @endif

        </ul>

    @endcomponent

@endif