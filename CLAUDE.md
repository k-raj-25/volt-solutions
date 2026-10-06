# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Marketing site for Volt Solutions (financial loans + real estate) with a blog managed from a small admin panel. Laravel 13 / PHP 8.4, SQLite, Blade templates, hand-written CSS and vanilla JS. There is no front-end build step for the site itself: `public/css/site.css` and `public/js/site.js` are served as-is (the stock Vite/`package.json` setup is unused by the views).

## Commands

```sh
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed      # seeder creates the admin from ADMIN_EMAIL / ADMIN_PASSWORD in .env, plus 3 sample posts
php artisan storage:link        # needed for uploaded blog cover images
php artisan serve               # http://localhost:8000, admin at /admin

php artisan test                                              # all tests (in-memory SQLite)
php artisan test --filter=test_name                           # single test
php artisan test tests/Feature/SiteTest.php                   # single file
```

GD is not installed locally, so tests must not use `UploadedFile::fake()->image()`; use `UploadedFile::fake()->createWithContent()` with real PNG bytes instead.

## Architecture

- **Routes** (`routes/web.php`): static pages go through `PageController`; `BlogController` (`/blog`, `/blog/{slug}`), `ContactController` (`/contact`, honeypot field `website` + throttle), `SitemapController` (`/sitemap.xml`), and an `admin.*` group under `Admin\{Auth,Dashboard,Post,Message}Controller`. `/services` was removed and 301-redirects to `/` (its content lives on the home page). `bootstrap/app.php` sets guest redirect to `admin.login` and authenticated redirect to `admin.dashboard`.
- **Blog**: `Post` model holds the logic. `Post::published()` (status = published AND `published_at <= now()`) must be used for every public query so drafts and scheduled posts stay hidden. Categories are the `Post::CATEGORIES` constant (`loans`, `real-estate`, `finance-tips`, `company-news`). Accessors: `category_label`, `reading_time`, `tag_list`, `cover_url`, `display_cover` (falls back to a per-category stock photo when no cover uploaded), `summary`.
- **Sanitising**: post bodies are written in Quill (CDN, admin only) and cleaned with `mews/purifier` before saving/rendering. Cover uploads: jpg/jpeg/png/webp, max 4 MB.
- **Site details** (phone, email, address, hours, currency `₹`) live in `config/site.php` and are read by views via `config('site.*')`. Values are still placeholders.
- **Views**: `layouts/app.blade.php` is the public shell (header nav, footer, SEO meta via `@section('title')` / `@section('description')`). Admin has its own layout in `resources/views/admin/`. Shared pieces: `partials/page-hero.blade.php` (inner-page header, fed `crumb`, `title` HTML with `<em>`, `lead`, optional `facts`, `image`, `alt`, `tag`), `partials/post-card`, `partials/pagination`, and the anonymous component `<x-icon>`. `pages/contact.blade.php` has its own bespoke header ("Say hello.") that the client approved; do not restyle it.
- **Adding a public page**: route + `PageController` method + view, then add it to the nav/footer in `layouts/app.blade.php`, the `$pages` list in `SitemapController`, `pages/sitemap.blade.php`, and the page list in `tests/Feature/SiteTest.php`.

## Front-end conventions

- One stylesheet, `public/css/site.css`, driven by custom properties at the top (`--bg`, `--ink`, `--navy`, `--gold`, `--green`). Fonts: Bricolage Grotesque + Inter. Light theme only; no dark mode.
- **Any element on a gold background uses white text/icons, never navy/blue.**
- Keep CTA headings on one line when there is room (don't add narrow max-widths to them).
- Keep the website feel light themed, minimal, bold.
- Photos are optimised 1600px copies in `public/images/photos/` (`villa-night`, `coins`, `money-handover`, `keys`, `houses`, `city`, `gate-villa`); the originals sit in `public/images/`.
- `public/js/site.js` handles the mobile nav, EMI calculator (Loans page) and the header `scrolled` class.

## Tooling notes

- The previous contents of this file were the Laravel Boost bootstrap prompt. Laravel Boost is not in `composer.json`, and `AGENTS.md` still holds the same bootstrap prompt. Installing Boost is optional and not needed to work here.
- `README.md` covers deployment (PHP 8.2+ host, point web root at `public/`, `APP_ENV=production`, `APP_DEBUG=false`, `migrate --force`, `storage:link`).
