@props(['value'])

<label {{ $attributes->merge(['class' => 'custom-input-label']) }}>
    {{ $value ?? $slot }}
</label>

@once
@push('styles')
<style>
    .custom-input-label {
        display: block;
        font-weight: 600; /* Semi-bold */
        font-size: 0.95rem; /* Slightly larger than default text-sm */
        color: #4a5568; /* Darker text color */
        margin-bottom: 8px; /* Spacing below label */
        /* You can add more styles here if needed, e.g., for icons or specific layouts */
    }
</style>
@endpush
@endonce
