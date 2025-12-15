@props(['active'])

@php
$classes = ($active ?? false)
            ? 'custom-nav-link custom-nav-link-active'
            : 'custom-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

@once
@push('styles')
<style>
    .custom-nav-link {
        display: inline-flex;
        align-items: center;
        padding: 10px 15px; /* px-1 pt-1 is too small, using more generous padding */
        border-bottom: 3px solid transparent; /* border-b-2 border-transparent */
        font-size: 0.95rem; /* text-sm */
        font-weight: 600; /* font-medium */
        line-height: 1.5; /* leading-5 */
        color: #64748b; /* text-gray-500 */
        text-decoration: none;
        transition: all 0.3s ease; /* transition duration-150 ease-in-out */
        outline: none; /* focus:outline-none */
        border-radius: 8px; /* Slightly rounded for a softer look */
        margin: 0 5px; /* Space between links */
    }

    .custom-nav-link:hover {
        color: #1a5fb4; /* hover:text-gray-700 - primary color on hover */
        background-color: #edf5ff; /* Light background on hover */
        border-bottom-color: #1a5fb4; /* hover:border-gray-300 - primary color border */
        transform: translateY(-2px); /* Slight lift effect */
    }

    .custom-nav-link:focus {
        color: #1a5fb4; /* focus:text-gray-700 */
        border-bottom-color: #1a5fb4; /* focus:border-gray-300 */
        background-color: #edf5ff;
    }

    .custom-nav-link-active {
        border-bottom-color: #1a5fb4; /* border-indigo-400 - primary color for active */
        color: #1a1a2e; /* text-gray-900 - darker text for active */
        font-weight: 700; /* Stronger font for active */
        background-color: #e2e8f0; /* Subtle background for active */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); /* Subtle shadow for active */
    }

    .custom-nav-link-active:hover {
        border-bottom-color: #26a269; /* Different color on hover for active */
        color: #26a269;
    }
</style>
@endpush
@endonce
