<button {{ $attributes->merge(['type' => 'button', 'class' => 'custom-secondary-button']) }}>
    {{ $slot }}
</button>

@once
@push('styles')
<style>
    .custom-secondary-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 25px; /* Ample padding */
        background: #edf2f7; /* Light background */
        border: 2px solid #e2e8f0; /* Light border */
        border-radius: 14px; /* Rounded corners */
        font-weight: 700; /* Bold text */
        font-size: 1rem; /* Readable font size */
        color: #4a5568; /* Dark text color */
        text-transform: uppercase; /* Uppercase text */
        letter-spacing: 0.5px; /* Spacing between letters */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); /* Smooth transitions */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Subtle shadow */
        cursor: pointer; /* Pointer cursor */
        position: relative;
        overflow: hidden;
    }

    .custom-secondary-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .custom-secondary-button:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12); /* Enhanced shadow on hover */
        background: #e2e8f0; /* Slightly darker background on hover */
        color: #1a5fb4; /* Primary color text on hover */
    }

    .custom-secondary-button:hover::before {
        left: 100%;
    }

    .custom-secondary-button:focus {
        outline: none; /* Remove default outline */
        box-shadow: 0 0 0 4px rgba(26, 95, 180, 0.2); /* Focus ring effect */
    }

    .custom-secondary-button:disabled {
        opacity: 0.6; /* Dim disabled buttons */
        cursor: not-allowed; /* Not-allowed cursor */
        transform: none; /* No transform for disabled */
        box-shadow: none; /* No shadow for disabled */
        background: #e9ecef; /* Lighter background for disabled */
        color: #a0aec0; /* Lighter text for disabled */
    }
</style>
@endpush
@endonce
