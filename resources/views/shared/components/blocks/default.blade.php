<!-- Block Default -->
<div class="block block-rounded block-themed @if(!empty($hidden ?? false)) block-mode-hidden @endif">
    <div class="block-header">
        <h3 class="block-title">
            @if(!empty($show_status ?? false)) @include('shared.components.blocks.status') @endif
            @lang($title)
        </h3>
        <div class="block-options">
            @if(!empty($show_options ?? true)) @include('shared.components.blocks.options') @endif
        </div>
    </div>
    <div class="block-content pb-4">{{ $slot }}</div>
</div>
<!-- END Block Default -->