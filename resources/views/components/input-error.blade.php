@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'custom-input-error']) }}>
        @foreach ((array) $messages as $message)
            <li><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</li>
        @endforeach
    </ul>
@endif

@once
@push('styles')
<style>
    .custom-input-error {
        font-size: 0.85rem; /* Slightly smaller font size */
        color: #dc3545; /* Red color for errors */
        margin-top: 8px; /* Spacing above error messages */
        list-style: none; /* Remove bullet points */
        padding-left: 0; /* Remove default padding */
        display: flex;
        flex-direction: column;
        gap: 4px; /* Space between multiple error messages */
    }

    .custom-input-error li {
        display: flex;
        align-items: center;
    }

    .custom-input-error li i {
        margin-right: 5px; /* Space between icon and text */
        color: #dc3545; /* Ensure icon is also red */
    }
</style>
@endpush
@endonce
