@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'custom-auth-session-status']) }}>
        <i class="bi bi-check-circle-fill me-2"></i> {{ $status }}
    </div>
@endif

@once
@push('styles')
<style>
    .custom-auth-session-status {
        background-color: #e6ffed; /* Light green background */
        color: #1a5e3a; /* Dark green text */
        border: 1px solid #b3e6c9; /* Green border */
        border-radius: 10px; /* Rounded corners */
        padding: 15px; /* Ample padding */
        font-size: 0.95rem; /* Readable font size */
        font-weight: 500; /* Medium font weight */
        display: flex;
        align-items: center;
        gap: 10px; /* Space between icon and text */
        animation: fadeIn 0.5s ease; /* Fade-in animation */
    }

    .custom-auth-session-status i {
        font-size: 1.2rem; /* Larger icon size */
        color: #28a745; /* Brighter green icon */
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush
@endonce
