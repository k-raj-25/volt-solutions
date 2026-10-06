# Volt Solutions website

Laravel backend + Blade views with hand-written CSS/JS. Light theme, colors from the logo.

## Run locally
```
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
Site: http://localhost:8000 · Admin: http://localhost:8000/admin

Admin login comes from `ADMIN_EMAIL` / `ADMIN_PASSWORD` in `.env` (used by the seeder). Change the password from the admin "Password" page after first login.

## Where to edit
- Phone, email, address, hours, currency: `config/site.php`
- Page copy: `resources/views/pages/*.blade.php`
- Colors / styling: CSS variables at the top of `public/css/site.css`
- Blog: managed in `/admin` (title, author, date, cover image, rich text, category, tags, summary, SEO text, draft/scheduled/published)

## Deploy
Needs PHP 8.2+ hosting with SQLite (or switch `DB_*` to MySQL). Point the web root at `public/`, set `APP_ENV=production`, `APP_DEBUG=false`, a real `APP_URL`, and run `php artisan migrate --force && php artisan storage:link`.
