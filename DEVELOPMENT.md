# Development Guide

This guide outlines the steps and standards for developing components in the **BetterOne** library.

## Creating a New Component

You can generate a new component boilerplate using the Composer script:

```bash
composer make-component ComponentName
```

This will create:
- `src/Components/ComponentName.php`
- `resources/views/components/component-name.blade.php`

Both files will include the necessary boilerplate code and safelist comments.

### Manual Creation (Reference)

If you need to create a component manually, follow these steps:

### Step 1: Create the PHP Class

Create a new PHP class in `src/Components/`.

- The class **must** extend `Betterone\Betterone\Components\BetterComponent`.
- Use the `__construct` method to define public properties for attributes like `variant`, `size`, etc.
- If the component has dynamic classes based on attributes (e.g., variants or sizes), implement methods to return those classes (e.g., `variantClasses()`, `sizeClasses()`).

**Example:**

```php
namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Badge extends BetterComponent
{
    public function __construct(
        public string $variant = 'primary',
        public string $size = 'md',
    ) {}

    public function variantClasses(): string
    {
        return match ($this->variant) {
            'primary' => 'bg-blue-100 text-blue-800',
            'secondary' => 'bg-gray-100 text-gray-800',
            // ... other variants
            default => 'bg-blue-100 text-blue-800',
        };
    }

    public function render(): View
    {
        return view('better::components.badge');
    }
}
```

### Step 2: Create the Blade View

Create a new Blade view in `resources/views/components/`.

- Use `@props` to define default values for attributes.
- Use explicit `safelist` comments for any dynamic classes returned by your PHP methods. This ensures the CSS compiler (like Tailwind) detects these classes even if they are constructed dynamically in PHP.

**CRITICAL: Safelisting Dynamic Classes**

If your component uses methods like `variantClasses()` or `sizeClasses()` to return class strings, you **MUST** include a comment in the Blade file listing all possible return values.

**Format:**

```blade
@props(['variant' => 'primary', 'size' => 'md'])

{{-- Safelist for variant classes --}}
{{-- bg-blue-100 text-blue-800 bg-gray-100 text-gray-800 ... --}}

{{-- Safelist for size classes --}}
{{-- px-2 py-1 text-sm px-3 py-1.5 text-sm ... --}}

<span {{ $attributes->merge([
    'class' => $tw(
        'base-classes-here',
        $variantClasses(),
        $sizeClasses(),
        $attributes->get('class', '')
    )
]) }}>
    {{ $slot }}
</span>
```

### Step 3: Register the Component

Register your new component in `src/BetteroneServiceProvider.php` within the `boot` method's `Blade::component` calls.

```php
Blade::component('better-badge', Components\Badge::class);
```

## Naming Conventions

- **PHP Classes**: PascalCase (e.g., `Badge`, `ActionSection`).
- **Blade Views**: kebab-case (e.g., `badge.blade.php`, `action-section.blade.php`).
- **Component Tags**: kebab-case prefixed with `better-` (e.g., `<x-better-badge ... />`).

