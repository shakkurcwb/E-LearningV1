<!-- Hero Image -->
<div class="bg-image overflow-hidden" style="background-image: url('{{ $background ?? asset('media/photos/photo'.rand(1,31).'@2x.jpg') }}');">
    <div class="bg-primary-dark-op">
        <div class="content content-full overflow-hidden">
            <div class="mt-7 mb-5 text-center">
                @if($greetings ?? true)
                    <h1 class="h2 text-white mb-2 invisible"
                        data-toggle="appear" data-class="animated fadeInDown">
                        @include('shared.components.greetings')</h1>
                    <h2 class="h4 font-w400 mb-2 text-white-75 invisible"
                        data-toggle="appear" data-class="animated fadeInDown">
                        @lang($title ?? '')</h2>
                    <h2 class="h6 font-w400 text-white-75 invisible"
                        data-toggle="appear" data-class="animated fadeInDown">
                        @lang($subtitle ?? '')</h2>
                @else
                    <h2 class="h2 font-w400 mb-2 text-white-75 invisible"
                        data-toggle="appear" data-class="animated fadeInDown">
                        @lang($title ?? '')</h2>
                    <h2 class="h4 font-w400 text-white-75 invisible"
                        data-toggle="appear" data-class="animated fadeInDown">
                        @lang($subtitle ?? '')</h2>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- END Hero Image -->