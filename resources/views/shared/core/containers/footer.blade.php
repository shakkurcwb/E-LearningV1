<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
    <div class="content py-3">
        <div class="row font-size-sm">

            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="{{ config('app.author_website') }}" target="_blank">{{ config('app.author_name') }}</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                <a class="font-w600" href="{{ config('app.url') }}?lang={{ request()->input('lang') ?? Auth::user()->settings->locale }}" target="_blank">{{ config('app.name') }}</a> &copy; <span data-toggle="year-copy"></span>
            </div>

        </div>
    </div>
</footer>
<!-- END Footer -->