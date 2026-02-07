@props(['disabled' => false])

<fieldset>
    @if($label)
        <legend class="text-sm font-medium text-gray-900 mb-3">{{ $label }}</legend>
    @endif

    <div class="space-y-3">
        @foreach($options as $value => $optionLabel)
            <div class="flex items-center gap-3">
                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $name }}_{{ $value }}"
                    value="{{ $value }}"
                    {{ $attributes->merge([
                        'class' => $tw(
                            'h-4 w-4 border-gray-300 text-blue-600',
                            'focus:ring-2 focus:ring-blue-500 focus:ring-offset-2',
                            'disabled:opacity-50 disabled:cursor-not-allowed',
                            $attributes->get('class', '')
                        ),
                    ]) }}
                    @checked($selected === (string) $value)
                    @disabled($disabled)
                />
                <label 
                    for="{{ $name }}_{{ $value }}"
                    class="text-sm font-medium text-gray-900 cursor-pointer"
                >
                    {{ $optionLabel }}
                </label>
            </div>
        @endforeach
    </div>
</fieldset>
