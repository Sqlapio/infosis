@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-black dark:focus:border-black focus:ring-green-500 dark:focus:ring-green-500 rounded-full shadow-sm']) !!}>
