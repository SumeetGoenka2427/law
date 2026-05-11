# Project Rules

## Stack

* Laravel 12
* PHP 8.2
* Livewire 3
* Bootstrap 5
* Blade Components

---

# Main Goal

Convert provided HTML templates into a structured Laravel application using:

* Controllers
* Blade pages
* Small Livewire components

Requirements:

* Reusable components
* Clean architecture
* Minimal duplication
* SEO-friendly
* Mobile responsive
* Production-ready structure

---

# Token Optimization Rules

* Return ONLY necessary code
* No long explanations
* No repeating unchanged code
* Do not rewrite entire files unless requested
* Show only modified sections when possible
* Keep responses concise
* Avoid comments unless important
* Prefer compact code

---

# Project File Paths

## Source HTML

Path:
D:\xampp824\htdocs\law\resources\views\htmls\index.html

Additional HTML files may exist inside:
D:\xampp824\htdocs\law\resources\views\htmls\

Use these HTML files as source templates.

---

# CSS Source

Path:
D:\xampp824\htdocs\law\resources\css\style.css

Reuse existing CSS when possible.

Do not rewrite CSS unless necessary.

Use Bootstrap classes with existing CSS.

Do NOT convert everything to Tailwind.

---

# Folder Structure

Use this structure strictly:

app/
├── Http/
│   └── Controllers/
│
├── Livewire/
│   ├── Forms/
│   ├── Sections/
│   └── Components/

resources/views/
├── pages/
├── layouts/
├── partials/
├── components/
└── livewire/

---

# Layout Architecture

Create:

* layouts/app.blade.php
* partials/navbar.blade.php
* partials/footer.blade.php

Main layout must include:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Include Bootstrap properly.

---

# Routing Rules

Use:
routes/web.php

Prefer:

* Route
* Controller
* Blade page
* Small Livewire components

Example:

```php
Route::get('/', [HomeController::class, 'index'])->name('home');
```

Avoid full-page Livewire unless absolutely necessary.

---

# Controller Rules

Store controllers in:

app/Http/Controllers/

Examples:

* HomeController
* AboutController
* ContactController

Controllers should:

* return views
* prepare page data
* keep logic clean

Do not place heavy logic inside Blade.

---

# Blade Rules

Pages go inside:

resources/views/pages/

Examples:

* home.blade.php
* about.blade.php
* contact.blade.php

Blade pages should:

* extend layouts.app
* include partials
* include small Livewire components

Example:

```blade
@extends('layouts.app')

@section('content')
    @include('partials.hero')

    <livewire:forms.contact-form />
@endsection
```

---

# Livewire Rules

Use Livewire ONLY for:

* forms
* modals
* filtering
* search
* tabs
* dynamic UI

Do NOT create giant Livewire page components.

Keep components:

* small
* reusable
* isolated

Prefer Blade includes for static content.

---

# Homepage Rules

Convert:
htmls/index.html

Into:

* HomeController
* pages/home.blade.php
* reusable partials/components
* small Livewire components only if needed

---

# Component Extraction Rules

Extract reusable sections into:

* navbar
* footer
* hero-section
* services-section
* testimonial-section
* faq-section
* cta-section

Avoid duplicate markup.

---

# Asset Handling

Use:

```blade
{{ asset('assets/images/...') }}
```

Store images in:

public/assets/images/

---

# CSS Rules

Keep:
resources/css/style.css

Import into:
resources/css/app.css

Example:

```css
@import './style.css';
```

Do not generate unnecessary CSS rewrites.

Preserve original Bootstrap classes and layout.

---

# Bootstrap Rules

Use Bootstrap 5 components and utilities.

Preserve:

* grid system
* spacing
* responsiveness
* utility classes

Do not replace Bootstrap with Tailwind.

---

# Performance Rules

* Prefer Blade rendering
* Keep Livewire minimal
* Avoid unnecessary requests
* Reuse components
* Avoid large reactive states

---

# Conversion Workflow

Follow this order:

1. Analyze HTML structure
2. Create layout
3. Extract navbar/footer
4. Create controller
5. Create Blade page
6. Extract reusable sections
7. Add small Livewire components if needed
8. Connect assets
9. Optimize duplication

---

# Important Constraints

* Do not generate unnecessary Livewire components
* Do not over-engineer
* Do not create excessive folders
* Keep architecture scalable but simple
* Preserve original UI
* Minimize token usage
* Output only changed/new files

---

# Final Goal

Generate maintainable Laravel codebase using:

* MVC architecture
* Controllers
* Blade-first rendering
* Bootstrap 5
* Small Livewire components only where needed
* Reusable structure
* Low complexity
* Minimal token usage
