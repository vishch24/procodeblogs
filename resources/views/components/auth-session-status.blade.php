@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'fw-medium text-success mb-4']) }}>
        {{ $status }}
    </div>
@endif
