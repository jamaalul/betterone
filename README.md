# Betterone

A Better Blade UI Library than Theirs. Betterone provides a set of high-quality, pre-built Blade components with a cleaner syntax.

## Features

- **Cleaner Syntax**: Use `<better:button>` instead of `<x-better::button>`
- **TailwindMerge**: Intelligent class merging for all components
- **Alpine.js**: Interactive components (Select, Modal, etc.)
- **Laravel 10+**: Built for modern Laravel applications

## Installation

### 1. Require the Package

**For Local Development (Path Repository):**

Add this to your application's `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "../betterone",
        "options": {
            "symlink": true
        }
    }
],
"require": {
    "betterone/betterone": "dev-main"
}
```

Then run:

```bash
composer update betterone/betterone
```

**For Production (Packagist - Coming Soon):**

```bash
composer require betterone/betterone
```

### 2. Add Frontend Dependencies

The components require **Alpine.js** and **Tailwind CSS**.

Add Alpine.js to your layout (e.g., `resources/views/layouts/app.blade.php`):

```html
<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js + Collapse Plugin -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
```

### 3. Clear Cache (IMPORTANT)

Since this package uses a custom Blade compiler, you **MUST** clear the view cache after installation or updates:

```bash
php artisan view:clear
```

## Usage

You can use the `<better:*>` syntax in any Blade view.

### Button

```html
<better:button variant="primary">Click Me</better:button>
<better:button variant="destructive" size="lg">Delete</better:button>
```

### Input

```html
<better:input label="Email" type="email" name="email" placeholder="john@example.com" />
```

### Select

```html
<better:select 
    label="Country" 
    name="country" 
    :options="['us' => 'USA', 'ca' => 'Canada']" 
/>
```

### Modal

```html
<better:modal title="Confirm Action" name="confirm-modal">
    <x-slot:trigger>
        <better:button>Open Modal</better:button>
    </x-slot:trigger>
    
    Are you sure?
    
    <x-slot:footer>
        <better:button variant="ghost" @click="open = false">Cancel</better:button>
        <better:button variant="destructive">Confirm</better:button>
    </x-slot:footer>
</better:modal>
```

### Toggle / Switch

```html
<better:toggle label="Enable Notifications" name="notifications" checked />
```

## Troubleshooting

### "Plain text tags appearing" (e.g., `<better:button>`)

If you see untransformed tags in your browser:

1. **Clear View Cache**: Run `php artisan view:clear`
2. **Check Provider**: Ensure `BetteroneServiceProvider` is loaded (happens automatically in Laravel 11/12).
3. **Restart Server**: If using `php artisan serve`, restart it.

### "Undefined variable $tw"

Run `php artisan view:clear`. This variable is injected globally by the package's Service Provider.
