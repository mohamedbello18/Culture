@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'custom-text-input']) !!}>

@once
@push('styles')
<style>
    .custom-text-input {
        border: 2px solid #e2e8f0; /* Light border */
        border-radius: 12px; /* Rounded corners */
        padding: 14px 18px; /* Ample padding */
        font-size: 1rem; /* Readable font size */
        transition: all 0.3s ease; /* Smooth transitions for focus/hover */
        background: #f8fafc; /* Light background */
        color: #2d3748; /* Dark text color */
        width: 100%; /* Full width */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); /* Subtle shadow */
    }

    .custom-text-input:focus {
        border-color: #1a5fb4; /* Primary color border on focus */
        box-shadow: 0 0 0 4px rgba(26, 95, 180, 0.15); /* Focus ring effect */
        background: white; /* White background on focus */
        outline: none; /* Remove default outline */
        transform: translateY(-1px); /* Slight lift effect */
    }

    .custom-text-input:disabled {
        background-color: #e9ecef; /* Lighter background for disabled state */
        color: #a0aec0; /* Lighter text for disabled state */
        cursor: not-allowed; /* Indicate not-allowed action */
        box-shadow: none; /* No shadow for disabled */
    }

    /* Placeholder styling */
    .custom-text-input::placeholder {
        color: #a0aec0;
        opacity: 1; /* Firefox compatibility */
    }
</style>
@endpush
@endonce
