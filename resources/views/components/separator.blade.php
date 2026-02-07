<div 
    role="separator"
    {{-- Safelist for orientation classes --}}
    {{-- w-full h-px h-full w-px --}}
    {{ $attributes->merge([
        'class' => $tw(
            'bg-gray-200',
            $orientationClasses(),
            $attributes->get('class', '')
        ),
    ]) }}
></div>
