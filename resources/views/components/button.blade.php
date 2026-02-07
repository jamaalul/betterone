@props(['disabled' => false])

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => $tw(
            'inline-flex items-center justify-center font-medium rounded-lg',
            'transition-colors duration-150 ease-in-out',
            'focus:outline-none focus:ring-2 focus:ring-offset-2',
            'disabled:opacity-50 disabled:cursor-not-allowed',
            $variantClasses(),
            $sizeClasses(),
            $attributes->get('class', '')
        ),
    ]) }}
    @disabled($disabled)
>
    {{ $slot }}
</button>
