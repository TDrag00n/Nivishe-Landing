<?php
/**
 * Shared helpers. Loaded once from index.php.
 */

if (!defined('PHL_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

/** Escape a string for safe output in HTML. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Read a configuration value, with an optional fallback. */
function cfg(string $key, $default = null)
{
    global $config;
    return array_key_exists($key, $config) && $config[$key] !== '' ? $config[$key] : $default;
}

/** The deadline as a DateTimeImmutable in the configured timezone. */
function deadline(): DateTimeImmutable
{
    static $d = null;
    if ($d === null) {
        $d = new DateTimeImmutable(cfg('deadline', '2026-09-30 23:59:59'), new DateTimeZone(cfg('timezone', 'UTC')));
    }
    return $d;
}

/** Are applications still open? */
function applications_open(): bool
{
    return new DateTimeImmutable('now', new DateTimeZone(cfg('timezone', 'UTC'))) <= deadline();
}

/** Whole days left before the deadline (0 once we are inside the final day). */
function days_left(): int
{
    $now = new DateTimeImmutable('now', new DateTimeZone(cfg('timezone', 'UTC')));
    if ($now > deadline()) {
        return 0;
    }
    return (int) $now->diff(deadline())->days;
}

/** Human sentence for the deadline pill in the hero. */
function deadline_sentence(): string
{
    if (!applications_open()) {
        return 'Applications for the 2026 cohort have closed';
    }
    $days = days_left();
    if ($days === 0) {
        return 'Last day to apply — closes today, ' . cfg('deadline_label');
    }
    if ($days === 1) {
        return '1 day left — applications close ' . cfg('deadline_label');
    }
    return $days . ' days left — applications close ' . cfg('deadline_label');
}

/** Best-guess absolute URL of this page, for social sharing tags. */
function site_url(): string
{
    $configured = cfg('site_url');
    if ($configured) {
        return rtrim($configured, '/');
    }
    $https  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
    $scheme = $https ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $path   = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/\\');
    return $scheme . '://' . $host . $path;
}

/** A CSRF token for the enquiry form, created once per visitor session. */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Handle an enquiry-form submission.
 *
 * Returns [errors[], sent(bool), values[]] so index.php can re-render the form
 * with the visitor's text still in place when something is wrong.
 */
function handle_contact_submission(): array
{
    $values = ['name' => '', 'email' => '', 'county' => '', 'message' => ''];
    $errors = [];

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST' || !isset($_POST['contact_submit'])) {
        return [$errors, false, $values];
    }

    foreach ($values as $field => $_) {
        $values[$field] = trim((string) ($_POST[$field] ?? ''));
    }

    // Honeypot: real people leave this hidden field empty. Bots fill it in.
    if (trim((string) ($_POST['website'] ?? '')) !== '') {
        return [$errors, true, ['name' => '', 'email' => '', 'county' => '', 'message' => '']];
    }

    $sessionToken = (string) ($_SESSION['csrf_token'] ?? '');
    $postedToken  = (string) ($_POST['csrf_token'] ?? '');
    if ($sessionToken === '' || $postedToken === '' || !hash_equals($sessionToken, $postedToken)) {
        $errors[] = 'Your session expired. Please reload the page and send the message again.';
        return [$errors, false, $values];
    }

    if ($values['name'] === '') {
        $errors[] = 'Please tell us your name.';
    }
    if ($values['email'] === '' || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter an email address we can reply to.';
    }
    if (mb_strlen($values['message']) < 10) {
        $errors[] = 'Please write a little more in your message (at least 10 characters).';
    }
    // Header-injection guard on the fields that touch the mail headers.
    if (preg_match('/[\r\n]/', $values['name'] . $values['email'])) {
        $errors[] = 'Your name or email contains characters we cannot accept.';
    }

    if ($errors) {
        return [$errors, false, $values];
    }

    $to      = cfg('contact_form_to', cfg('contact_email'));
    $subject = 'PHL Fellowship enquiry from ' . $values['name'];
    $body    = "New enquiry from the PHL Fellowship 2026 landing page.\n\n"
             . 'Name:    ' . $values['name'] . "\n"
             . 'Email:   ' . $values['email'] . "\n"
             . 'County:  ' . ($values['county'] !== '' ? $values['county'] : 'not given') . "\n"
             . 'Sent:    ' . date('D, d M Y H:i:s') . "\n\n"
             . "Message:\n" . $values['message'] . "\n";

    $domain  = preg_replace('/^www\./', '', (string) ($_SERVER['HTTP_HOST'] ?? 'localhost'));
    $headers = [
        'From: PHL Fellowship website <noreply@' . $domain . '>',
        'Reply-To: ' . $values['name'] . ' <' . $values['email'] . '>',
        'Content-Type: text/plain; charset=UTF-8',
        'MIME-Version: 1.0',
    ];

    $ok = @mail($to, $subject, $body, implode("\r\n", $headers));

    if (!$ok) {
        $errors[] = 'Sorry, the message could not be sent right now. Please email us directly at ' . cfg('contact_email') . '.';
        return [$errors, false, $values];
    }

    return [$errors, true, ['name' => '', 'email' => '', 'county' => '', 'message' => '']];
}
