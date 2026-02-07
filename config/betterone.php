<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value determines the prefix used for all Betterone components.
    | By default, components are accessed as <better:component-name>
    |
    */
    'prefix' => 'better',

    /*
    |--------------------------------------------------------------------------
    | Default Button Variant
    |--------------------------------------------------------------------------
    |
    | Defines the default variant for button components.
    | Options: 'primary', 'secondary', 'outline', 'ghost', 'destructive'
    |
    */
    'button' => [
        'default_variant' => 'primary',
        'default_size' => 'md',
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Colors
    |--------------------------------------------------------------------------
    |
    | Default color scheme for components. These can be overridden per component.
    |
    */
    'colors' => [
        'primary' => 'blue',
        'secondary' => 'gray',
        'success' => 'green',
        'danger' => 'red',
        'warning' => 'yellow',
        'info' => 'cyan',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Sizes
    |--------------------------------------------------------------------------
    |
    | Available sizes for components that support sizing.
    |
    */
    'sizes' => ['xs', 'sm', 'md', 'lg', 'xl'],
];
