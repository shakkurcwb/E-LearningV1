<!-- User Informations -->
@block([
    'title' => 'account.components.user_informations.title',
])

    <div class="row">
        <div class="col-sm-6">

            <h4 class="text-muted">{{ $user->person->full_name }}
                <small>({{ $user->person->document }})</small>
            </h4>
            <p class="mb-0">{{ $user->person->age }} @lang('years') - {{ $user->person->nationality }}</p>
            <p><a target="_blank" href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
            <p class="mb-0">
                <small>@lang('Registered At') {{ $user->created_at->format('d/m/Y') }}</small>
            </p>
            <p>
                <small>@lang('Last Login At') {{ $user->last_login_at->format('d/m/Y') }}</small>
            </p>

        </div>
        <div class="col-sm-6">

            <p>
                <img src="{{ $user->settings->avatar_url }}" style="width: 96px;" />
            </p>
            <a class="btn btn-xs btn-secondary" href='{{ url("/users/{$user->id}") }}'>@lang('Edit')</a>

        </div>
    </div>

@endblock
<!-- END User Informations -->