@props(['disabled' => false])

{{-- Safelist untuk variant classes --}}
{{-- bg-blue-600 bg-gray-600 bg-red-600 text-white text-gray-700 hover:bg-blue-700 hover:bg-gray-700 hover:bg-red-700 hover:bg-gray-50 hover:bg-gray-100 focus:ring-blue-500 focus:ring-gray-500 focus:ring-red-500 border border-gray-300 --}}

{{-- Safelist untuk size classes --}}
{{-- px-3 px-4 px-5 px-6 py-1.5 py-2 py-2.5 py-3 text-xs text-sm text-base --}}

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => $tw(
            'inline-flex items-center justify-center font-medium rounded-lg ' .
            'transition-colors duration-150 ease-in-out ' .
            'focus:outline-none focus:ring-2 focus:ring-offset-2 ' .
            'disabled:opacity-50 disabled:cursor-not-allowed ' .
            $variantClasses() . ' ' .
            $sizeClasses())
    ]) }}
    @disabled($disabled)
>
    {{ $slot }}
</button>