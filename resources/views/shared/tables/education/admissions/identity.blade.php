<!-- Admission Identity -->
<div>
    <div class="row">
        <div class="col-sm-2 text-center">
            <img class="img-avatar img-avatar48 img-avatar-thumb"
                src="{{ url($admission->user->settings->avatar_url) }}"
            />
        </div>
        <div class="col-sm-10">
            @if($admission->user->person->isFilled())
                <p class="mb-0 font-w600">{{ $admission->user->person->full_name }}</p>
            @endif
            <p class="mb-0">{{ $admission->user->email }}</p>
            <p class="mb-0 text-muted">{{ $admission->created_at->diffForHumans() }}</p>
        </div>  
    </div>
</div>
<!-- END Admission Identity -->