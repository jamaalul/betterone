@props(['disabled' => false, 'checked' => false])

<div class="flex items-start gap-3">
    <div class="flex h-6 items-center">
        <input
            type="checkbox"
            @if($name) name="{{ $name }}" id="{{ $name }}" @endif
            {{ $attributes->merge([
                'class' => $tw(
                    'h-4 w-4 rounded border-gray-300 text-blue-600',
                    'focus:ring-2 focus:ring-blue-500 focus:ring-offset-2',
                    'disabled:opacity-50 disabled:cursor-not-allowed',
                    $attributes->get('class', '')
                ),
            ]) }}
            @checked($checked)
            @disabled($disabled)
        />
    </div>
    @if($label || $description)
        <div class="leading-6">
            @if($label)
                <label 
                    @if($name) for="{{ $name }}" @endif
                    class="text-sm font-medium text-gray-900 cursor-pointer"
                >
                    {{ $label }}
                </label>
            @endif
            @if($description)
                <p class="text-sm text-gray-500">{{ $description }}</p>
            @endif
        </div>
    @endif
</div>
