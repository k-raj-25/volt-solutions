# Deploying to Render (free)

Render's free web service has a wiped disk on every deploy and sleeps when idle, so the
database and blog images live outside it:

- **Database:** free Postgres at https://neon.tech (Render's own free Postgres expires after ~30 days).
- **Blog images:** free Cloudflare R2 bucket (S3-compatible) at https://dash.cloudflare.com → R2.

## 1. Database (Neon)
Create a project, copy the **connection string** (`postgresql://user:pass@host/db?sslmode=require`). This is `DB_URL`.

## 2. Image storage (Cloudflare R2)
1. Create a bucket (e.g. `volt-uploads`) and enable **Public access** (the `r2.dev` URL) so the site can show images.
2. R2 → Manage API tokens → create a token with **Object Read & Write** → note Access Key ID and Secret.
3. Values you need:
   - `AWS_BUCKET` = bucket name
   - `AWS_ENDPOINT` = `https://<account-id>.r2.cloudflarestorage.com`
   - `AWS_URL` = the public `https://pub-xxxx.r2.dev` URL
   - `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`
   - also set `AWS_USE_PATH_STYLE_ENDPOINT=true`

## 3. Push the code to GitHub
This folder is not a git repo yet:
```
git init && git add . && git commit -m "Volt Solutions website"
```
Create an empty GitHub repo and push to it. (`.env` is ignored, so no secrets are uploaded.)

## 4. Render
New → **Blueprint** → pick the repo (it reads `render.yaml`), or New → Web Service → Docker.
Fill in the environment variables it asks for:

| Variable | Value |
|---|---|
| `APP_KEY` | run `php artisan key:generate --show` locally and paste the `base64:...` value |
| `APP_URL` | your `https://<name>.onrender.com` URL |
| `DB_URL` | Neon connection string |
| `UPLOADS_DISK` | `s3` |
| `AWS_*` | R2 values from step 2 |
| `ADMIN_EMAIL` / `ADMIN_PASSWORD` | the first admin login (change the password after login) |

On start the container runs migrations and seeds the admin (and 3 sample posts the first time only).
Admin: `https://<name>.onrender.com/admin`.

## Notes
- First visit after idle takes ~30–60 s (free tier waking up).
- To use a custom domain, add it in Render → Settings → Custom Domains and update `APP_URL`.
