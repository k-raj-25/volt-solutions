# Deploying to Render

The app uses SQLite and stores blog images in `storage/app/public` (served via `/storage`).

## Steps
1. Render → New → **Blueprint** → select this GitHub repo (reads `render.yaml`).
2. Set the variables it asks for:

| Variable | Value |
|---|---|
| `APP_KEY` | run `php artisan key:generate --show` locally and paste the `base64:...` value |
| `APP_URL` | your `https://<name>.onrender.com` URL |
| `ADMIN_EMAIL` / `ADMIN_PASSWORD` | first admin login (change the password after login) |

On start the container creates the SQLite file, runs migrations and seeds the admin (plus 3 sample posts the first time only).
Admin: `https://<name>.onrender.com/admin`.

## Important: free plan does not keep data
Render's free web service has an ephemeral disk. Every redeploy or restart (including waking after
idle) resets the SQLite database and uploaded images, so blog posts, messages and any password change are lost.

To keep them, use a paid plan (Starter) with a persistent disk:
- Add a disk mounted at `/var/data` (Render dashboard → Disks, or the `disk:` block noted in `render.yaml`).
- Set `DATA_DIR=/var/data`. The SQLite file and uploads are then stored on that disk.

## Notes
- First visit after idle takes ~30–60 s on the free plan.
- Custom domain: Render → Settings → Custom Domains, then update `APP_URL`.
