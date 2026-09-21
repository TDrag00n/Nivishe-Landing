<?php
if (!defined('PHL_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

$pageTitle = cfg('programme_name') . ' | ' . cfg('org_name');
$applyUrl  = cfg('apply_url');
$isOpen    = applications_open();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e(cfg('meta_description')) ?>">
<link rel="canonical" href="<?= e(site_url()) ?>/">

<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e(cfg('meta_description')) ?>">
<meta property="og:url" content="<?= e(site_url()) ?>/">
<meta property="og:site_name" content="<?= e(cfg('org_name')) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#0f5c52">

<link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css?v=1">

<script type="application/ld+json">
<?= json_encode([
    '@context'    => 'https://schema.org',
    '@type'       => 'EducationalOccupationalProgram',
    'name'        => cfg('programme_name'),
    'description' => cfg('meta_description'),
    'provider'    => [
        '@type' => 'Organization',
        'name'  => cfg('org_name'),
        'url'   => cfg('org_url'),
    ],
    'url'               => site_url() . '/',
    'applicationDeadline' => deadline()->format('Y-m-d'),
    'timeToComplete'    => 'P12W',
    'educationalProgramMode' => 'online',
    'offers'            => ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'KES'],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
</head>
<body>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a class="brand" href="#top">
      <span class="brand-mark" aria-hidden="true">
        <svg viewBox="0 0 40 40" width="38" height="38" role="img" focusable="false">
          <circle cx="20" cy="20" r="19" fill="#0f5c52"/>
          <path d="M20 29.5s-8.2-4.7-8.2-10.4a4.6 4.6 0 0 1 8.2-2.9 4.6 4.6 0 0 1 8.2 2.9c0 5.7-8.2 10.4-8.2 10.4Z" fill="#f6b23c"/>
        </svg>
      </span>
      <span class="brand-text">
        <strong>PHL Fellowship</strong>
        <small><?= e(cfg('org_name')) ?></small>
      </span>
    </a>

    <nav class="site-nav" id="siteNav" aria-label="Main">
      <ul>
        <li><a href="#why">Why it matters</a></li>
        <li><a href="#model">The PHL model</a></li>
        <li><a href="#fellowship">The Fellowship</a></li>
        <li><a href="#eligibility">Who should apply</a></li>
        <li><a href="#dates">Key dates</a></li>
        <li><a href="#faq">FAQs</a></li>
      </ul>
    </nav>

    <a class="btn btn-primary btn-sm header-cta" href="<?= e($applyUrl) ?>"<?= $isOpen ? ' target="_blank" rel="noopener"' : '' ?>>
      <?= $isOpen ? 'Apply Now' : 'Applications closed' ?>
    </a>

    <button class="nav-toggle" id="navToggle" type="button" aria-expanded="false" aria-controls="siteNav">
      <span class="nav-toggle-bars" aria-hidden="true"><span></span><span></span><span></span></span>
      <span class="sr-only">Menu</span>
    </button>
  </div>
</header>
