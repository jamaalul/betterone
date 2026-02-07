@props(['disabled' => false])

<div class="w-full">
    @if($label)
        <label 
            @if($name) for="{{ $name }}" @endif
            class="block text-sm font-medium text-gray-700 mb-1"
        >
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        {{ $attributes->merge([
            'class' => $tw(
                'block w-full rounded-lg border-gray-300 shadow-sm',
                'transition-colors duration-150 ease-in-out',
                'focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50',
                'disabled:bg-gray-100 disabled:cursor-not-allowed',
                $error ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '',
                $attributes->get('class', '')
            ),
        ]) }}
        @disabled($disabled)
    />

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
