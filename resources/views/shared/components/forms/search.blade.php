<!-- Search Form -->
<form action='{{ url("{$action}/search") ?? "#" }}' method="get" name="frm_search">

    <div class="form-group">
        <div class="input-group">
            @if($create ?? true)
                <div class="input-group-prepend">
                    <a href="{{ $redirect ?? $action ?? '#' }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            @endif
            <input type="text" class="form-control"
                name="q" value="{{ request()->input('q') ?? old('q') }}"
                placeholder="@lang('general.forms.search.placeholder')"
            />
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

</form>
<!-- END Search Form -->