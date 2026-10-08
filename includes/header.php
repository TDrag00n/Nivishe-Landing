<?php
if (!defined('NIVISHE_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

/* Each page may set these before including this file; the Fellowship landing
   page's values are the defaults. */
$pageTitle       ??= cfg('programme_name') . ' | ' . cfg('org_name');
$pageDescription ??= cfg('meta_description');
$pagePath        ??= '/';
$brandLabel      ??= 'PHL Fellowship';
$brandSub        ??= '2026 Cohort';
$navItems        ??= [
    '#why'         => 'Why it matters',
    '#model'       => 'The PHL model',
    '#fellowship'  => 'The Fellowship',
    '#eligibility' => 'Who should apply',
    '#dates'       => 'Key dates',
    '#faq'         => 'FAQs',
];
if (!isset($headerCta)) {
    $open      = applications_open();
    $headerCta = [
        'label'    => $open ? 'Apply Now' : 'Applications closed',
        'url'      => cfg('apply_url'),
        'external' => $open,
    ];
}
$ogImage ??= [
    'path' => 'assets/img/cohort.jpg',
    'w'    => 1210,
    'h'    => 587,
    'alt'  => 'A previous Nivishe Fellowship cohort with their certificates of completion.',
];
$structuredData ??= [
    '@context'    => 'https://schema.org',
    '@type'       => 'EducationalOccupationalProgram',
    'name'        => cfg('programme_name'),
    'description' => cfg('meta_description'),
    'provider'    => [
        '@type' => 'Organization',
        'name'  => cfg('org_name'),
        'url'   => cfg('org_url'),
    ],
    'url'                    => site_url() . '/',
    'applicationDeadline'    => deadline()->format('Y-m-d'),
    'timeToComplete'         => 'P12W',
    'educationalProgramMode' => 'online',
    'offers'                 => ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'KES'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDescription) ?>">
<link rel="canonical" href="<?= e(site_url() . $pagePath) ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDescription) ?>">
<meta property="og:url" content="<?= e(site_url() . $pagePath) ?>">
<meta property="og:site_name" content="<?= e(cfg('org_name')) ?>">
<meta property="og:image" content="<?= e(site_url() . '/' . $ogImage['path']) ?>">
<meta property="og:image:width" content="<?= e((string) $ogImage['w']) ?>">
<meta property="og:image:height" content="<?= e((string) $ogImage['h']) ?>">
<meta property="og:image:alt" content="<?= e($ogImage['alt']) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#ea580c">

<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
<link rel="stylesheet" href="assets/css/style.css?v=7">

<script type="application/ld+json">
<?= json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
</head>
<body>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <div class="brand">
      <a class="brand-link" href="<?= e(cfg('org_url')) ?>" target="_blank" rel="noopener"
         aria-label="<?= e(cfg('org_name')) ?> home page (opens in a new tab)">
        <img class="brand-logo" src="assets/img/nivishe-logo.png" width="760" height="332"
             alt="<?= e(cfg('org_name')) ?>">
      </a>
      <span class="brand-divider" aria-hidden="true"></span>
      <a class="brand-programme" href="#top">
        <strong><?= e($brandLabel) ?></strong>
        <small><?= e($brandSub) ?></small>
      </a>
    </div>

    <nav class="site-nav" id="siteNav" aria-label="Main">
      <ul>
        <?php foreach ($navItems as $href => $label): ?>
          <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <a class="btn btn-primary btn-sm header-cta" href="<?= e($headerCta['url']) ?>"<?= !empty($headerCta['external']) ? ' target="_blank" rel="noopener"' : '' ?>>
      <?= e($headerCta['label']) ?>
    </a>

    <button class="nav-toggle" id="navToggle" type="button" aria-expanded="false" aria-controls="siteNav">
      <span class="nav-toggle-bars" aria-hidden="true"><span></span><span></span><span></span></span>
      <span class="sr-only">Menu</span>
    </button>
  </div>
</header>
