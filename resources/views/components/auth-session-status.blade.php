@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-bold text-sm text-red-600 dark:text-red-400']) }}>
        {{ $status }}
    </div>
@endif
