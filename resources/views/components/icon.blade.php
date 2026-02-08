@props([
    'icon',
    'style' => 'outline',
    'size' => 'md'
])

{{-- Safelist for icon size classes --}}
{{-- w-3 h-3 w-4 h-4 w-5 h-5 w-6 h-6 w-7 h-7 --}}

<x-dynamic-component 
    :component="$heroiconName()" 
    {{ $attributes->merge([
        'class' => $tw(
            $sizeClasses(),
            $color ? "text-{$resolveColor($color)}-500" : ''
        )
    ]) }} 
/>
