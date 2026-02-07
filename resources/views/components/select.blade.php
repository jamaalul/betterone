@props(['disabled' => false])

<div 
    x-data="{ 
        open: false, 
        selected: @js($selected),
        selectedLabel: '',
        init() {
            const options = @js($options);
            if (this.selected && options[this.selected]) {
                this.selectedLabel = options[this.selected];
            }
        },
        select(value, label) {
            this.selected = value;
            this.selectedLabel = label;
            this.open = false;
        }
    }"
    @click.away="open = false"
    class="relative w-full"
>
    @if($label)
        <label 
            @if($name) for="{{ $name }}" @endif
            class="block text-sm font-medium text-gray-700 mb-1"
        >
            {{ $label }}
        </label>
    @endif

    <input type="hidden" @if($name) name="{{ $name }}" @endif x-model="selected" />

    <button
        type="button"
        @click="open = !open"
        {{ $attributes->merge([
            'class' => $tw(
                'relative w-full cursor-pointer rounded-lg border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm',
                'focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50',
                'disabled:bg-gray-100 disabled:cursor-not-allowed',
                $error ? 'border-red-500' : '',
                $attributes->get('class', '')
            ),
        ]) }}
        @disabled($disabled)
    >
        <span x-text="selectedLabel || '{{ $placeholder ?? 'Select an option' }}'" class="block truncate" :class="{ 'text-gray-400': !selectedLabel }"></span>
        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <x-heroicon-m-chevron-up-down class="h-5 w-5 text-gray-400" />
        </span>
    </button>

    <ul
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-lg bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        x-cloak
    >
        @foreach($options as $value => $optionLabel)
            <li
                @click="select('{{ $value }}', '{{ $optionLabel }}')"
                class="relative cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-blue-50"
                :class="{ 'bg-blue-100': selected === '{{ $value }}' }"
            >
                <span class="block truncate" :class="{ 'font-semibold': selected === '{{ $value }}' }">{{ $optionLabel }}</span>
                <span
                    x-show="selected === '{{ $value }}'"
                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-blue-600"
                >
                    <x-heroicon-m-check class="h-5 w-5" />
                </span>
            </li>
        @endforeach
    </ul>

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
