@props(['disabled' => false, 'checked' => false])

<div 
    x-data="{ enabled: @js($checked) }"
    class="flex items-start gap-3"
>
    <input 
        type="hidden" 
        @if($name) name="{{ $name }}" @endif
        :value="enabled ? '1' : '0'"
    />

    <button
        type="button"
        @click="enabled = !enabled"
        :class="enabled ? 'bg-blue-600' : 'bg-gray-200'"
        {{ $attributes->merge([
            'class' => $tw(
                'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent',
                'transition-colors duration-200 ease-in-out',
                'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2',
                'disabled:opacity-50 disabled:cursor-not-allowed',
                $attributes->get('class', '')
            ),
        ]) }}
        role="switch"
        :aria-checked="enabled.toString()"
        @disabled($disabled)
    >
        <span
            :class="enabled ? 'translate-x-5' : 'translate-x-0'"
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    @if($label || $description)
        <div class="leading-6">
            @if($label)
                <span 
                    @click="enabled = !enabled"
                    class="text-sm font-medium text-gray-900 cursor-pointer"
                >
                    {{ $label }}
                </span>
            @endif
            @if($description)
                <p class="text-sm text-gray-500">{{ $description }}</p>
            @endif
        </div>
    @endif
</div>
