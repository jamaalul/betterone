<div
    x-data="{ open: false }"
    x-on:open-modal.window="if ($event.detail === '{{ $name }}') open = true"
    x-on:close-modal.window="if ($event.detail === '{{ $name }}') open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{-- Trigger slot --}}
    @if(isset($trigger))
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endif

    {{-- Modal backdrop and content --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 overflow-y-auto"
            x-cloak
        >
            {{-- Backdrop --}}
            <div 
                class="fixed inset-0 bg-black/50 transition-opacity"
                @click="open = false"
            ></div>

            {{-- Modal panel --}}
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    x-show="open"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="{{ $tw('relative w-full bg-white rounded-xl shadow-xl', $sizeClasses()) }}"
                    @click.stop
                >
                    {{-- Header --}}
                    @if($title)
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
                            <button 
                                type="button"
                                @click="open = false"
                                class="text-gray-400 hover:text-gray-500 transition-colors"
                            >
                                <x-heroicon-m-x-mark class="h-5 w-5" />
                            </button>
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="px-6 py-4">
                        {{ $slot }}
                    </div>

                    {{-- Footer --}}
                    @if(isset($footer))
                        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-xl">
                            {{ $footer }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </template>
</div>
