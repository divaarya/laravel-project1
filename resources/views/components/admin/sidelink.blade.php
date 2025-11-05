<div>
    <a {{ $attributes }}
   aria-current="{{ $active ? 'page' : '' }}"
   class="{{ $active
        ? 'bg-gray-900 text-white'
        : 'text-gray-300 hover:bg-white/5 hover:text-white'
    }} rounded-md px-3 py-2 text-sm font-medium flex items-center space-x-2 transition">
    
    {{-- Jika ingin pakai ikon opsional --}}
    @if (isset($icon))
        <i class="{{ $icon }} w-5 text-gray-400"></i>
    @endif

    {{-- Teks dari slot --}}
    <span>{{ $slot }}</span>
</a>
</div>