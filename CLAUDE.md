# Responsive & Mobile Rules

Mobile responsiveness is mandatory.

Check entire project UI and CSS for:

* responsiveness
* overflow issues
* broken layouts
* spacing issues
* font scaling
* image scaling
* navbar/mobile menu
* tables/cards/forms
* sidebar behavior
* grid alignment
only for user pages not admin pages
Review ALL:
only for user pages not admin pages
* Blade pages
* partials
* components
* Bootstrap layouts
* custom CSS

---

# Responsive Requirements

Support:
only for user pages not admin pages
* mobile
* tablet
* laptop
* large desktop

Primary focus:
only for user pages not admin pages
* mobile first
* clean tablet layout
* stable desktop layout

---

# Bootstrap Rules

Use proper Bootstrap 5 responsive classes:

Examples:

* col-12
* col-md-6
* col-lg-4
* d-none d-md-block
* flex-column flex-lg-row

Avoid fixed widths whenever possible.

Use:

* container
* container-fluid
* row
* g-* spacing classes

---

# Mobile Navigation Rules

Navbar must:
only for user pages not admin pages
* collapse properly
* have working toggle
* avoid overflow
* support dropdowns on mobile

Fix:

* broken menus
* overlapping elements
* hidden links

---

# Typography Rules

Ensure:

* readable font sizes
* proper line-height
* no text overflow
* proper heading scaling

Avoid:
only for user pages not admin pages
* giant mobile headings
* tiny text
* horizontal scrolling

---

# Image Rules

All images must:
only for user pages not admin pages
* scale correctly
* use responsive classes
* avoid stretching

Use:

* img-fluid
* object-fit where needed

Prevent layout breaking.

---

# Card & Grid Rules

Cards must:

* stack properly on mobile
* maintain spacing
* keep equal alignment

Avoid:

* broken heights
* overflow text
* uneven grids

---

# Sidebar Rules

On mobile:
only for user pages not admin pages
* move sidebar below content
  OR
* collapse appropriately

Never break mobile layout.

---

# Table Rules

Large tables must:

* scroll horizontally
  OR
* convert responsively

Use:

```html id="mjlwm1"
<div class="table-responsive">
```

---

# Form Rules

Forms must:

* fit mobile screens
* have proper spacing
* use responsive inputs/buttons

Buttons should:

* stack properly on small devices
* avoid overflow

---

# CSS Optimization Rules

Review:
resources/css/style.css

Fix:

* duplicate styles
* conflicting styles
* hardcoded widths/heights
* unnecessary !important usage

Prefer:

* Bootstrap utilities
* reusable classes

Do not rewrite entire CSS unnecessarily.

---

# Performance Rules

Optimize:

* images
* CSS duplication
* excessive DOM nesting

Avoid:

* massive inline CSS
* unnecessary JS for responsiveness

---

# Testing Rules

Check responsiveness for:

* homepage
* article pages
* judgment pages
* interview pages
* admin panel
* forms
* search pages
* pagination
* share buttons

---

# Output Rules

When fixing responsiveness:

* output only changed files
* explain only important fixes
* avoid rewriting entire files
* keep token usage low

---

# Final Goal

Ensure entire Laravel project is:
only for user pages not admin pages
* fully responsive
* mobile friendly
* Bootstrap optimized
* production ready
* visually consistent
* clean on all screen sizes
* free from overflow/layout issues
