<?php

namespace Betterone\Betterone\Compilers;

/**
 * Better Blade Compiler
 * 
 * Pre-processes Blade templates to transform <better:*> syntax
 * into standard <x-better::*> component syntax before Blade compilation.
 * 
 * This is a compile-time transformation, not runtime rendering.
 */
class BetterBladeCompiler
{
    /**
     * Compile the Better syntax to standard Blade component syntax.
     *
     * Transforms:
     *   <better:button />        → <x-better::button />
     *   <better:modal>           → <x-better::modal>
     *   </better:modal>          → </x-better::modal>
     *   <better:input.group>     → <x-better::input.group>
     *
     * @param string $value The raw template content
     * @return string The transformed template content
     */
    public static function compile(string $value): string
    {
        // Transform opening and self-closing tags: <better:name → <x-better::name
        $newValue = preg_replace(
            '/<better:([a-zA-Z0-9\-_.]+)/',
            '<x-better::$1',
            $value
        );

        if ($newValue === null) {
            \Illuminate\Support\Facades\Log::error('BetterBladeCompiler Regex Error (Opening): ' . preg_last_error());
            return $value;
        }
        $value = $newValue;

        // Transform closing tags: </better:name → </x-better::name
        $newValue = preg_replace(
            '/<\/better:([a-zA-Z0-9\-_.]+)/',
            '</x-better::$1',
            $value
        );

        if ($newValue === null) {
            \Illuminate\Support\Facades\Log::error('BetterBladeCompiler Regex Error (Closing): ' . preg_last_error());
            return $value;
        }
        $value = $newValue;

        // Check if any tags were missed
        if (str_contains($value, '<better:')) {
             \Illuminate\Support\Facades\Log::warning('BetterBladeCompiler: Untransformed tags found in output!', [
                 'snippet' => substr($value, strpos($value, '<better:'), 100)
             ]);
        } elseif (str_contains($value, 'x-better::')) {
             \Illuminate\Support\Facades\Log::info('BetterBladeCompiler: SUCCESS - Transformed tags found.');
        }

        return $value;
    }
}
