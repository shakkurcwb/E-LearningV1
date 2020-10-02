@block([
    'title' => $title,
    'hidden' => $hidden ?? false,
    'show_status' => $show_status ?? false,
    'is_filled' => $is_filled ?? false,
])

    <!-- Block Form -->
    <div class="row justify-content-center py-sm-3 py-md-5">
        <div class="col-sm-10 col-md-8">{{ $slot }}</div>
    </div>
    <!-- END Block Form -->

@endcomponent