# Red Rock Surgery Center — WordPress rebuild (POC)

A modern rebuild of [redrocksurgerycenter.com](https://redrocksurgerycenter.com) that stays on WordPress.
It ships as **one theme and one plugin** so it can be installed on the existing site as an update
rather than a migration.

| Piece | Path | What it does |
|---|---|---|
| Theme | `wp-content/themes/redrock` | Block theme: design tokens in `theme.json`, HTML templates, locked patterns for every section |
| Plugin | `wp-content/plugins/redrock-core` | Services, Providers, Testimonials post types; Settings → Red Rock (phone, hours, links); block bindings; demo seeder |
| Demo | `docs/index.html` + `blueprint.json` | GitHub Pages landing page that boots the site in WordPress Playground (no server) |

## Live demo

`https://__GITHUB_OWNER__.github.io/redrock/` (GitHub Pages, served from `docs/`).
Login for the demo: `admin` / `password`. Nothing persists between visits.

## Local development

Requires Docker Desktop and Node 18+.

```bash
npm install
npm start          # http://localhost:8888  (admin / password)
npm run seed       # loads services, providers, reviews and pages
npm run cli -- plugin list
npm stop
```

The theme and plugin folders are mounted into the container, so edits show up on refresh.

## How editing works for the client

- **Pages** open in the normal WordPress editor. Each section is a pattern with `templateLock: contentOnly`:
  text, images and buttons are editable, but blocks can't be moved, deleted or restyled off-brand.
- **Services / Providers / Testimonials** are entries in the dashboard with a small "Details" box
  (short blurb, credentials, star rating). Grids on the homepage and listing pages update automatically.
- **Settings → Red Rock** holds phone, fax, email, address, hours and the external links (Phreesia
  payments, appointment and referral forms). The header, footer, CTA and contact sections read from it
  through block bindings, so a change there updates every page at once.
- **Appearance → Editor** exposes colors, fonts, header and footer for the developer; the client
  never needs to go there.

## Installing on the existing site (the "simple update" path)

1. Take a full backup (files + database) or use the host's staging site.
2. Download `redrock-core.zip` and `redrock-theme.zip` from the latest GitHub release
   (or run `npm run zip` to build them into `dist/`).
3. **Plugins → Add New → Upload Plugin** → `redrock-core.zip` → Activate.
   This only *adds* post types and a settings page; nothing on the live site changes yet.
4. Fill in **Settings → Red Rock**, then add Services, Providers and Testimonials
   (the seeder is for demos only; do not run it on production).
5. **Appearance → Themes → Add New → Upload Theme** → `redrock-theme.zip` → **Live Preview**.
   Build the homepage from the Red Rock patterns while previewing; publish when happy.
6. Point the existing `/services/` and `/our-medical-staff/` URLs at the new archives
   (a redirect plugin or the host's redirect rules), and keep every other permalink as-is.

### What keeps working

| Existing feature | Status under the new theme |
|---|---|
| Gravity Forms (appointment, referral) | Works. Place with the Gravity Forms block. **See the HIPAA note below.** |
| Contact Form 7 + math captcha | Works via shortcode block. |
| CleanTalk anti-spam | Unchanged. |
| Phreesia "Make Payment" link | Now a setting; shown in header, footer and CTAs. |
| Existing pages built in Elementor | Still render (Elementor supports block themes). Migrate page-by-page to patterns and deactivate Elementor at the end. |
| Blog posts | Unchanged; the theme includes blog and archive templates. |
| Yoast / SEO plugins | Compatible. The theme also outputs `MedicalClinic` schema on the homepage. |

### HIPAA note

The current appointment form collects name, date of birth, phone and procedure details and stores
them in the WordPress database. That is protected health information. Before going live, either
(a) move those forms to a HIPAA-covered provider (Jotform HIPAA, Formstack, or Phreesia intake) and
embed them, or (b) confirm the host and form vendor will sign a BAA. The theme's form pages are
built as placeholders for exactly this reason.

## Repo layout

```
.wp-env.json               local WordPress (Docker) config
blueprint.json             WordPress Playground recipe used by the demo page
docs/index.html            GitHub Pages demo landing page
scripts/build-zips.sh      builds installable zips into dist/
.github/workflows/         lints PHP, builds zips, deploys the demo page
wp-content/themes/redrock  block theme
wp-content/plugins/redrock-core
```

## Not in this POC (next steps if approved)

- Real photography and headshots (image slots are in place).
- Provider bios and credentials (placeholders seeded from the current staff list).
- HIPAA-compliant form embeds.
- Redirect map from old URLs, and a content pass on the remaining inner pages.
- Managed hosting with staging and a BAA (Kinsta, WP Engine or Flywheel).
