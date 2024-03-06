@props(['error'])

@if ($error)
    <div {{ $attributes->merge(['class' => 'font-bold text-sm text-red-600 dark:text-red-400']) }}>
        {{ $error }}
    </div>
@endif
