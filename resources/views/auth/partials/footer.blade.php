<div class="font-size-sm text-center text-muted py-3">
    <strong>
        <a href="{{ config('app.url') }}?lang={{ request()->input('lang') ?? config('app.locale') }}">{{ config('app.name') }}</a>
    </strong> &copy; <span data-toggle="year-copy"></span>
</div>