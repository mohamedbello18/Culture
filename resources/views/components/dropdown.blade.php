@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'custom-dropdown-content-classes'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right custom-dropdown-align-left',
    'top' => 'custom-dropdown-align-top',
    default => 'ltr:origin-top-right rtl:origin-top-left custom-dropdown-align-right',
};

$widthClass = match ($width) {
    '48' => 'custom-dropdown-width-48',
    default => $width, // Allows custom width classes to be passed
};
@endphp

<div class="custom-dropdown-wrapper" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="custom-dropdown-menu {{ $widthClass }} {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

@once
@push('styles')
<style>
    .custom-dropdown-wrapper {
        position: relative;
    }

    .custom-dropdown-menu {
        position: absolute;
        z-index: 50; /* z-50 */
        margin-top: 0.5rem; /* mt-2 */
        border-radius: 0.5rem; /* rounded-md */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* shadow-lg */
        border: 1px solid #e2e8f0; /* Subtle border */
        background-color: white; /* Default background */
        overflow: hidden; /* Ensure content respects border-radius */
    }

    /* Alignment classes */
    .custom-dropdown-align-left {
        transform-origin: top left; /* ltr:origin-top-left */
        left: 0; /* start-0 */
    }

    .custom-dropdown-align-right {
        transform-origin: top right; /* ltr:origin-top-right */
        right: 0; /* end-0 */
    }

    .custom-dropdown-align-top {
        transform-origin: top;
        top: auto;
        bottom: 100%; /* Position above trigger */
    }

    /* Width classes */
    .custom-dropdown-width-48 {
        width: 12rem; /* w-48 (192px) */
    }

    .custom-dropdown-content-classes {
        padding-top: 0.25rem; /* py-1 */
        padding-bottom: 0.25rem; /* py-1 */
        background-color: #ffffff; /* bg-white */
        border-radius: 0.5rem; /* rounded-md */
        /* ring-1 ring-black ring-opacity-5 is replaced by box-shadow and border on .custom-dropdown-menu */
    }
</style>
@endpush
@endonce
