<div 
    x-data="{ open: @js($open) }"
    {{ $attributes->merge(['class' => 'border border-gray-200 rounded-lg']) }}
>
    <button
        type="button"
        @click="open = !open"
        class="flex w-full items-center justify-between px-4 py-3 text-left text-sm font-medium text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset rounded-lg"
        :aria-expanded="open.toString()"
    >
        <span>{{ $title }}</span>
        <x-heroicon-m-chevron-down 
            class="h-5 w-5 text-gray-500 transition-transform duration-200"
            ::class="{ 'rotate-180': open }"
        />
    </button>

    <div
        x-show="open"
        x-collapse
        x-cloak
    >
        <div class="px-4 pb-4 pt-2 text-sm text-gray-600">
            {{ $slot }}
        </div>
    </div>
</div>
