# PHL Fellowship 2026 — landing page (PHP)

A single-page PHP version of the Play for Healing and Learning (PHL) Fellowship 2026
landing page, built from the approved copy document. It is plain PHP, HTML, CSS and
JavaScript — no frameworks, no build step, no database. Upload it to cPanel and it works.

---

## 1. Before you upload — one thing you MUST change

Open `includes/config.php` and replace the placeholder Google Form link:

```php
'apply_url' => 'https://forms.gle/REPLACE-WITH-YOUR-GOOGLE-FORM',
```

Every "Apply Now" button on the page points at this one value.

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
  css/style.css         All styling
  js/main.js            Mobile menu, scroll effects (page works without it)
  img/favicon.svg       Browser tab icon
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

## Notes

- Fonts load from Google Fonts. If a visitor's connection blocks them, the page falls
  back to clean system fonts and still looks right.
- The page is responsive down to small phones, keyboard-navigable, screen-reader
  friendly, and respects "reduce motion" settings.
- All content is rendered server-side, so search engines index the full text.
