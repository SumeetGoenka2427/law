# CMS & Admin Architecture Rules

## Admin Panel Goal

Admin panel should use:

MVC architecture
Laravel controllers
Blade templates
Bootstrap 5

Avoid:

Livewire admin dashboards
heavy reactive components
unnecessary AJAX complexity

Use standard Laravel CRUD structure.

Example:

Route::resource('articles', ArticleController::class);

Admin will manage all website content dynamically through backend dashboard.

Everything must be database-driven.

No hardcoded frontend content.

---

# Backend Requirements

Create complete CRUD for:

* Homepage Sections
* Articles
* Latest News
* Interviews
* Judgments
* Opinions
* Categories
* Tags
* Sidebar Content
* Advertisements
* Authors
* Media Uploads

Admin can:

* Create
* Edit
* Delete
* Publish
* Unpublish
* Feature content

---

# Database Rules

Create separate tables for each content type.

Examples:

* articles
* interviews
* judgments
* latest_news
* homepage_sections
* advertisements
* authors
* categories
* tags

Use proper relationships.

Examples:

* article belongsTo category
* article belongsTo author
* article hasMany tags

---

# Migration Rules

Generate:

* migrations
* models
* controllers
* requests
* relationships

Use:

* foreign keys
* indexes
* soft deletes where useful

Example columns:

* title
* slug
* excerpt
* content
* image
* status
* published_at
* meta_title
* meta_description

---

# Admin Controller Rules

Store inside:

app/Http/Controllers/Admin/

Examples:

* ArticleController
* JudgmentController
* InterviewController
* HomepageController

Controllers must handle:

* CRUD
* validation
* file uploads
* publish status

Keep methods clean and small.

---

# Frontend Controller Rules

Frontend pages must use separate controllers.

Examples:

app/Http/Controllers/

* HomeController
* NewsController
* JudgmentController
* InterviewController

Frontend controllers should:

* fetch published data only
* optimize queries
* use eager loading

---

# Blade Architecture

Use:

resources/views/
├── admin/
├── pages/
├── partials/
├── components/

---

# Homepage Rules

Homepage sections must load dynamically from database.

Examples:

```blade
@include('partials.home.hero')
@include('partials.home.news-grid')
@include('partials.home.judgments')
@include('partials.home.opinions')
@include('partials.home.visual')
```

Each partial must receive dynamic database data.

Avoid hardcoded text.

---

# Storage Rules

Use Laravel Storage system.

Store uploads in:

storage/app/public/

Run:

```bash
php artisan storage:link
```

Use:

```php
Storage::disk('public')
```

Images should display using:

```blade
asset('storage/'.$item->image)
```

---

# Upload Rules

Admin can upload:

* featured images
* article thumbnails
* PDFs
* judgment documents
* author images

Validate:

* file types
* size
* mime types

Delete old files on update/delete.

---

# Publish Rules

Frontend must show ONLY:

```php
status = published
```

Use statuses:

* draft
* published
* archived

---

# Slug Rules

Auto-generate unique slugs.

Use slugs in frontend URLs.

Example:

```php
/news/supreme-court-verdict
```

---

# SEO Rules

Every major content table should support:

* meta_title
* meta_description
* og_image

---

# Admin UI Rules

Use:

* Bootstrap 5
* reusable forms
* reusable tables
* reusable alerts

Avoid duplicated admin markup.

---

# Route Rules

Use grouped routes.

Example:

```php
Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

    });
```

Use resource controllers where suitable.

---

# Performance Rules

Use:

* eager loading
* pagination
* caching where useful

Avoid:

* N+1 queries
* unnecessary Livewire requests

---

# Livewire Rules
Use Livewire ONLY for frontend user panel features.

Do NOT use Livewire in admin panel.

Admin panel must use:

Controllers
Blade views
Standard Laravel forms
Resource controllers
Bootstrap modals/tables/forms

Do not create giant Livewire components.

Keep components isolated.

---

# Security Rules

Validate all admin inputs.

Use:

* form requests
* mass assignment protection
* authorization checks

Sanitize rich text content if needed.

---

# Code Generation Rules

When generating code always include:

* migration
* model
* controller
* routes
* blade views
* relationships

Output only required files.

Avoid rewriting entire project.

---

# Final Goal

Generate scalable legal news portal architecture with:

* dynamic CMS backend
* database-driven frontend
* admin-controlled publishing
* reusable Blade structure
* optimized Laravel architecture
* Bootstrap 5 UI
* minimal Livewire usage
* scalable CRUD system
* clean MVC structure
