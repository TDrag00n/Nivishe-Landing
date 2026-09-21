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
<meta name="theme-color" content="#ea580c">

<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
<link rel="stylesheet" href="assets/css/style.css?v=2">

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
      <img class="brand-logo" src="assets/img/nivishe-logo.png" width="760" height="332"
           alt="<?= e(cfg('org_name')) ?>">
      <span class="brand-divider" aria-hidden="true"></span>
      <span class="brand-programme">
        <strong>PHL Fellowship</strong>
        <small>2026 Cohort</small>
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
