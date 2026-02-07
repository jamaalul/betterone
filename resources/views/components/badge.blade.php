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
