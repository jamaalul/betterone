<div 
    role="separator"
    {{-- Safelist for orientation classes --}}
    {{-- w-full h-px h-full w-px --}}
    {{ $attributes->merge([
        'class' => $tw(
            $color ? "bg-{$resolveColor($color)}-500" : 'bg-gray-200',
            $orientationClasses(),
            $attributes->get('class', '')
        ),
    ]) }}
></div>
