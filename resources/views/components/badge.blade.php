@props(['variant' => 'primary', 'size' => 'md'])

{{-- Safelist for variant classes --}}
{{-- bg-blue-100 text-blue-800 bg-gray-100 text-gray-800 bg-green-100 text-green-800 bg-red-100 text-red-800 bg-yellow-100 text-yellow-800 bg-cyan-100 text-cyan-800 --}}

{{-- Safelist for size classes --}}
{{-- px-1.5 py-0.5 text-xs px-2 py-0.5 text-xs px-2 py-1 text-sm px-3 py-1.5 text-sm --}}

<span {{ $attributes->merge([
    'class' => $tw(
        'inline-flex items-center font-medium rounded-full',
        $variantClasses(),
        $sizeClasses(),
        $attributes->get('class', '')
    ),
]) }}>
    {{ $slot }}
</span>
