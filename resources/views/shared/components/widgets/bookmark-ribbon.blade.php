<!-- Bookmark Ribbon -->
<h2 class="content-heading">@lang($title ?? 'Bookmark Ribbon')</h2>
<div class="row">

    @foreach($ribbons as $ribbon)
    
        <!-- Ribbon -->
        <div class="col-md-6 col-xl-3">
            <div class="block">
                <a href="{{ url($ribbon['action'] ?? '/home') }}">
                    <div class="block-content block-content-full ribbon ribbon-primary ribbon-bookmark">
                        <div class="text-center py-4">
                            <p>
                                <i class="fa fa-3x fa-{{ $ribbon['icon'] ?? 'fa-home' }} text-gray"></i>
                            </p>
                            <h4 class="mb-0">@lang($ribbon['title'] ?? 'Home')</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Ribbon -->

    @endforeach

</div>
<!-- END Bookmark Ribbon -->