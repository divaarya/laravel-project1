@props(['active' => false])

@php
$classes = $active
    ? 'bg-gray-900 text-white'
    : 'text-gray-300 hover:bg-white/5 hover:text-white';
@endphp

<a href="{{ $attributes->get('href') }}"
   {{ $attributes->merge(['class' => $classes . ' rounded-md px-3 py-2 text-sm font-medium']) }}>
    {{ $slot }}
</a>
