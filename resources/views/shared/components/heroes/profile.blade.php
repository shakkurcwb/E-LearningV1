<!-- Hero -->
<div class="bg-image" style="background-image: url('{{ $background }}');">
    <div class="bg-black-50">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb invisible" src="{{ $avatar }}" alt="Profile Avatar"
                    data-toggle="appear" data-class="animated fadeInDown" />
            </div>
            <h1 class="h2 text-white mb-0 invisible" data-toggle="appear" data-class="animated fadeInDown">{{ $nick }}</h1>
            <span class="text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">@lang($role)</span>
        </div>
    </div>
</div>
<!-- END Hero -->