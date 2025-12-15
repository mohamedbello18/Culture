@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="custom-modal-overlay"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="custom-modal-backdrop"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="custom-modal-backdrop-bg"></div>
    </div>

    <div
        x-show="show"
        class="custom-modal-content {{ $maxWidth }}"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>

@once
@push('styles')
<style>
    .custom-modal-overlay {
        position: fixed;
        inset: 0;
        overflow-y: auto;
        padding: 1.5rem 1rem; /* px-4 py-6 sm:px-0 */
        z-index: 9999; /* z-50 */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-modal-backdrop {
        position: fixed;
        inset: 0;
        transform: transform transition-all;
    }

    .custom-modal-backdrop-bg {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.75); /* bg-gray-500 opacity-75 */
        backdrop-filter: blur(8px); /* Added blur for modern look */
    }

    .custom-modal-content {
        margin-bottom: 1.5rem; /* mb-6 */
        background-color: #ffffff; /* bg-white */
        border-radius: 1rem; /* rounded-lg */
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3); /* shadow-xl */
        transform: transform transition-all;
        width: 100%; /* sm:w-full */
        margin-left: auto; /* sm:mx-auto */
        margin-right: auto; /* sm:mx-auto */
        border: 1px solid #e2e8f0; /* Subtle border */
        position: relative;
        z-index: 10000; /* Ensure content is above backdrop */
    }

    /* Max-width classes for responsiveness */
    .max-w-sm { max-width: 24rem; /* sm:max-w-sm */ }
    .max-w-md { max-width: 28rem; /* sm:max-w-md */ }
    .max-w-lg { max-width: 32rem; /* sm:max-w-lg */ }
    .max-w-xl { max-width: 36rem; /* sm:max-w-xl */ }
    .max-w-2xl { max-width: 42rem; /* sm:max-w-2xl */ }

    /* Responsive adjustments */
    @media (min-width: 640px) { /* sm: */
        .custom-modal-overlay {
            padding: 2.5rem 0; /* sm:px-0 */
        }
    }
</style>
@endpush
@endonce
