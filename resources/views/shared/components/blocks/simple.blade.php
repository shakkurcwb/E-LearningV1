<!-- Block Simple -->
<div class="block block-rounded block-themed">
    <div class="block-header">
        <h3 class="block-title">@lang($title)</h3>
        <div class="block-options">@include('shared.components.blocks.options')</div>
    </div>
    <div class="block-content pb-4">{{ $slot }}</div>
</div>
<!-- END Block Simple -->