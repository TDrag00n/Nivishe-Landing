# PHL Fellowship 2026 — landing page (PHP)

A single-page PHP version of the Play for Healing and Learning (PHL) Fellowship 2026
landing page, built from the approved copy document and themed to match
nivishefoundation.org. It is plain PHP, HTML, CSS and JavaScript — no frameworks, no
build step, no database. Upload it to cPanel and it works.

---

## 1. The Apply button

Every "Apply Now" button on the page points at one value in `includes/config.php`:

```php
'apply_url' => 'https://docs.google.com/forms/d/1thyY.../viewform',
```

This is the form's **response** address (`/viewform`), which is what applicants
need. Never put the `/edit` address here — that one opens the form for editing
rather than for filling in.

Before you go live, open the link in a private browser window to confirm the form
accepts responses from people outside your organisation.

---

## 2. Upload to cPanel

**Option A — File Manager (easiest)**

1. Zip the contents of this folder (the files themselves, not a wrapper folder).
2. cPanel → **File Manager** → open `public_html`.
3. **Upload** the zip, then right-click it → **Extract**.
4. Delete the zip file afterwards.
5. Visit your domain. `index.php` loads automatically.

To put the page in a subfolder instead (e.g. `yourdomain.com/fellowship`), extract into
`public_html/fellowship` — everything uses relative paths, so it just works.

**Option B — FTP**

Connect with FileZilla using your cPanel FTP details and upload everything into
`public_html`, keeping the folder structure intact.

**PHP version:** anything from **PHP 7.4 upwards** (PHP 8.x recommended).
Set it in cPanel → *MultiPHP Manager* if needed.

---

## 3. What's in the folder

```
index.php               The page itself — all sections, in order
includes/
  config.php            ← edit this: links, dates, email, counties, FAQs
  functions.php         Helpers: countdown, escaping, enquiry-form handling
  header.php            <head>, sticky navigation bar
  footer.php            Footer + data-management note
  .htaccess             Blocks direct web access to the files above
assets/
  css/style.css         All styling (brand colours are variables at the top)
  js/main.js            Mobile menu, scroll effects (page works without it)
  img/nivishe-logo.png        Logo for the header (dark)
  img/nivishe-logo-white.png  Logo for the dark footer
  img/favicon.png             Browser tab icon
  img/apple-touch-icon.png    Icon when saved to a phone home screen
.htaccess               Compression, caching, security headers, HTTPS switch
README.md               This file
```

---

## 4. Editing content later

Almost everything you will want to change lives in **`includes/config.php`**:

| Setting | What it controls |
|---|---|
| `apply_url` | Where every "Apply Now" button goes |
| `deadline` / `deadline_label` | The countdown and the closing date shown on the page |
| `programme_dates`, `duration`, `weekly_time` | The "At a glance" box and body copy |
| `contact_email` | The email shown in the FAQs and footer |
| `counties` | The 10 county tiles and the contact form's dropdown |
| `faqs` | The accordion questions and answers |

Section headings and body paragraphs sit in `index.php`, clearly marked with comments
like `<!-- ===== WHO SHOULD APPLY ===== -->`.

### The countdown is automatic

The hero shows "9 days left — applications close 30th September 2026", counting down on
its own. Once `deadline` passes, every Apply button switches to "Applications closed" and
the page invites people to email about the next cohort. Nothing to do on the day.

---

## 5. The enquiry form

The contact section includes a working PHP form that emails `contact_email`. It has a
CSRF token, a honeypot for bots, and server-side validation.

- **To switch it off** and show only the email address, set
  `'contact_form_enabled' => false` in `includes/config.php`.
- **For reliable delivery**, create a mailbox on the same domain in
  cPanel → *Email Accounts* (e.g. `info@yourdomain.org`) and set
  `'contact_form_to' => 'info@yourdomain.org'`. Mail sent to an address on another
  domain (like Gmail) can land in spam, because shared hosts are often poorly rated
  by spam filters.
- If `mail()` is disabled on your hosting plan, the form tells the visitor to email
  directly instead — the page never breaks.

Applications themselves still go through the Google Form; this form is only for questions.

---

## 6. After it's live

1. **Turn on HTTPS** — cPanel → *SSL/TLS Status* → **Run AutoSSL**. Once the padlock
   works, uncomment the three `RewriteRule` lines in the root `.htaccess` to force HTTPS.
2. **Set the canonical URL** — put your live address in `site_url` in
   `includes/config.php` (e.g. `https://nivishefoundation.org/phl-fellowship`) so social
   media previews link correctly.
3. **Add a share image** (optional) — drop a 1200×630 JPG at
   `assets/img/share.jpg` and add this line inside `<head>` in `includes/header.php`:
   `<meta property="og:image" content="<?= e(site_url()) ?>/assets/img/share.jpg">`

---

## 7. Testing locally (optional)

With PHP installed on your computer:

```bash
php -S localhost:8000
```

Then open <http://localhost:8000>.

---

## 8. Brand theme

The page uses the same design system as nivishefoundation.org:

| Element | Value |
|---|---|
| Brand orange | `#EA580C`, hover `#C2410C` |
| Page backgrounds | `#faf9f6` and `#fffcf9` (the warm off-whites from the main site) |
| Dark sections & footer | gray-900 `#111827` to black |
| Buttons | solid orange, bold white text, fully rounded pills |
| Typeface | the system sans-serif stack — the same one the main site uses, so no
  webfont is downloaded and the page loads faster |

Every colour is a CSS variable in the first 40 lines of `assets/css/style.css`.
Change `--brand` there and the whole page follows.

The logo files were taken from the main site's `/images/logo.png` and prepared for web
use: cropped, resized, and supplied in dark and white versions.

## Notes

- No webfonts, no external scripts, no trackers — everything except the Apply link is
  served from your own hosting.
- The page is responsive down to small phones, keyboard-navigable, screen-reader
  friendly, and respects "reduce motion" settings.
- All content is rendered server-side, so search engines index the full text.
