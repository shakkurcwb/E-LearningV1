<!-- Default Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">@lang($title)</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ url('/home') }}">@lang('theme.menu.home')</a>
                    </li>
                    @isset($breadcrumbs)
                        @foreach($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item">
                                <a class="link-fx" href='{{ url("/{$breadcrumb}") }}'>@lang("theme.menu.{$breadcrumb}")</a>
                            </li>
                        @endforeach
                    @endisset
                    <li class="breadcrumb-item" aria-current="page">@lang("theme.menu.{$page}")</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Default Hero -->