<div 
    role="separator"
    {{ $attributes->merge([
        'class' => $tw(
            'bg-gray-200',
            $orientationClasses(),
            $attributes->get('class', '')
        ),
    ]) }}
></div>
