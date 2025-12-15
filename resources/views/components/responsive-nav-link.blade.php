@props(['active'])

@php
$classes = ($active ?? false)
            ? 'custom-responsive-nav-link custom-responsive-nav-link-active'
            : 'custom-responsive-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

@once
@push('styles')
<style>
    .custom-responsive-nav-link {
        display: block;
        width: 100%;
        padding: 12px 20px; /* ps-3 pe-4 py-2 */
        border-left: 4px solid transparent; /* border-l-4 border-transparent */
        text-align: start; /* text-start */
        font-size: 1rem; /* text-base */
        font-weight: 500; /* font-medium */
        color: #64748b; /* text-gray-600 */
        text-decoration: none;
        transition: all 0.3s ease; /* transition duration-150 ease-in-out */
        outline: none; /* focus:outline-none */
    }

    .custom-responsive-nav-link:hover {
        color: #1a5fb4; /* hover:text-gray-800 - primary color on hover */
        background-color: #edf5ff; /* hover:bg-gray-50 - light background on hover */
        border-left-color: #1a5fb4; /* hover:border-gray-300 - primary color border */
    }

    .custom-responsive-nav-link:focus {
        color: #1a5fb4; /* focus:text-gray-800 */
        background-color: #edf5ff; /* focus:bg-gray-50 */
        border-left-color: #1a5fb4; /* focus:border-gray-300 */
    }

    .custom-responsive-nav-link-active {
        border-left-color: #1a5fb4; /* border-indigo-400 - primary color for active */
        color: #1a1a2e; /* text-indigo-700 - darker text for active */
        font-weight: 600; /* Stronger font for active */
        background-color: #e2e8f0; /* bg-indigo-50 - subtle background for active */
    }

    .custom-responsive-nav-link-active:hover {
        border-left-color: #26a269; /* Different color on hover for active */
        color: #26a269;
    }
</style>
@endpush
@endonce
