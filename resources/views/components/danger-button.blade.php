<button {{ $attributes->merge(['type' => 'submit', 'class' => 'custom-danger-button']) }}>
    {{ $slot }}
</button>

@once
@push('styles')
<style>
    .custom-danger-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 25px; /* Ample padding */
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); /* Red gradient */
        border: none;
        border-radius: 14px; /* Rounded corners */
        font-weight: 700; /* Bold text */
        font-size: 1rem; /* Readable font size */
        color: white; /* White text color */
        text-transform: uppercase; /* Uppercase text */
        letter-spacing: 0.5px; /* Spacing between letters */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); /* Smooth transitions */
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3); /* Soft shadow */
        cursor: pointer; /* Pointer cursor */
        position: relative;
        overflow: hidden;
    }

    .custom-danger-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .custom-danger-button:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 12px 35px rgba(220, 38, 38, 0.4); /* Enhanced shadow on hover */
        background: linear-gradient(135deg, #b91c1c 0%, #dc2626 100%); /* Reverse gradient on hover */
        color: white; /* Ensure text remains white */
    }

    .custom-danger-button:hover::before {
        left: 100%;
    }

    .custom-danger-button:focus {
        outline: none; /* Remove default outline */
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.3); /* Focus ring effect */
    }

    .custom-danger-button:disabled {
        opacity: 0.6; /* Dim disabled buttons */
        cursor: not-allowed; /* Not-allowed cursor */
        transform: none; /* No transform for disabled */
        box-shadow: none; /* No shadow for disabled */
        background: #a0aec0; /* Gray background for disabled */
    }
</style>
@endpush
@endonce
