<!-- User Identity -->
<div>
    <div class="row">
        <div class="col-sm-2 text-center">
            <img class="img-avatar img-avatar48 img-avatar-thumb"
                src="{{ url($user->settings->avatar_url) }}"
            />
        </div>
        <div class="col-sm-10">
            @if($user->person->isFilled())
                <p class="mb-0 font-w600">{{ $user->person->full_name }}</p>
            @endif
            <p class="mb-0">{{ $user->email }}</p>
            <p class="mb-0 text-muted">{{ $user->created_at->diffForHumans() }}</p>
        </div>  
    </div>
</div>
<!-- END User Identity -->