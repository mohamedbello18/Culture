<a {{ $attributes->merge(['class' => 'custom-dropdown-link']) }}>{{ $slot }}</a>

@once
@push('styles')
<style>
    .custom-dropdown-link {
        display: block;
        width: 100%;
        padding: 10px 15px; /* px-4 py-2 */
        text-align: start; /* text-start */
        font-size: 0.9rem; /* text-sm */
        line-height: 1.5; /* leading-5 */
        color: #4a5568; /* text-gray-700 */
        text-decoration: none; /* Remove underline */
        transition: all 0.3s ease; /* transition duration-150 ease-in-out */
        background-color: transparent; /* Default background */
        border: none; /* Remove default button border */
        cursor: pointer; /* Indicate clickable */
    }

    .custom-dropdown-link:hover {
        background-color: #f0f4f8; /* hover:bg-gray-100 - light background on hover */
        color: #1a5fb4; /* Primary color on hover */
        transform: translateX(3px); /* Slight movement on hover */
    }

    .custom-dropdown-link:focus {
        outline: none; /* focus:outline-none */
        background-color: #e2e8f0; /* focus:bg-gray-100 - slightly darker background on focus */
        color: #1a5fb4; /* Primary color on focus */
    }
</style>
@endpush
@endonce
