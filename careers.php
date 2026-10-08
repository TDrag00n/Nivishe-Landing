<?php
/**
 * Careers — open roles at Nivishe Foundation.
 *
 * Role content lives in includes/jobs.php. Everything else on this page
 * (contact address, organisation name) comes from includes/config.php.
 */

define('NIVISHE_APP', true);

$config = require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

date_default_timezone_set(cfg('timezone', 'UTC'));

$jobs = array_values(array_filter(
    require __DIR__ . '/includes/jobs.php',
    static fn (array $job): bool => $job['open'] ?? true
));

/* ---- page chrome -------------------------------------------------------- */
$pageTitle       = 'Careers | ' . cfg('org_name');
$pageDescription = 'Open roles at ' . cfg('org_name') . ' in Nairobi, Kenya — '
    . implode(', ', array_column($jobs, 'title')) . '.';
$pagePath        = '/careers.php';
$brandLabel      = 'Careers';
$brandSub        = cfg('org_name');
$navItems        = [
    '#roles'   => 'Open roles',
    '#apply'   => 'How to apply',
    '#contact' => 'Questions',
];
$headerCta = ['label' => 'See open roles', 'url' => '#roles', 'external' => false];
$ogImage   = [
    'path' => 'assets/img/session.jpg',
    'w'    => 1260,
    'h'    => 820,
    'alt'  => 'Colleagues in a Nivishe Foundation session.',
];

/* Google and other search engines read this to list the roles. */
$structuredData = [
    '@context' => 'https://schema.org',
    '@graph'   => array_map(static function (array $job): array {
        return [
            '@type'              => 'JobPosting',
            'title'              => $job['title'],
            'description'        => $job['summary'],
            'employmentType'     => strtoupper($job['type']) === 'FULL-TIME' ? 'FULL_TIME' : 'CONTRACTOR',
            'datePosted'         => cfg('jobs_posted_date', date('Y-m-d')),
            'directApply'        => false,
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name'  => cfg('org_name'),
                'url'   => cfg('org_url'),
            ],
            'jobLocation' => [
                '@type'   => 'Place',
                'address' => [
                    '@type'           => 'PostalAddress',
                    'addressLocality' => 'Nairobi',
                    'addressCountry'  => 'KE',
                ],
            ],
            'url' => site_url() . '/careers.php#' . $job['slug'],
        ] + ($job['closes'] !== '' ? ['validThrough' => $job['closes']] : []);
    }, $jobs),
];

/* ---- footer ------------------------------------------------------------- */
$footerTitle = 'Careers at ' . cfg('org_name');
$footerDesc  = 'Open roles with the team behind Nivishe Foundation’s mental health, play and community programmes.';
$footerLinks = ['#roles' => 'Open roles', '#apply' => 'How to apply', '#contact' => 'Questions'];
$footerDataNote = 'Your information will be used only to assess your application, in line with '
    . e(cfg('org_name')) . '&rsquo;s data protection practices.';

require __DIR__ . '/includes/header.php';
?>

<main id="main">

  <!-- ============================ HERO ============================ -->
  <section class="page-hero" id="top">
    <div class="container page-hero-inner">
      <div class="page-hero-text">
        <p class="eyebrow eyebrow-light"><span class="eyebrow-dot" aria-hidden="true"></span>Careers &middot; <?= e(cfg('org_name')) ?></p>
        <h1 class="page-hero-title">Join the team behind the work</h1>
        <p class="page-hero-lead">
          We are hiring across grants, evidence and learning &mdash; the functions that keep
          our programmes funded, measured and improving.
        </p>
        <p class="page-hero-sub">
          <?= count($jobs) ?> open <?= count($jobs) === 1 ? 'role' : 'roles' ?>, based in Nairobi, Kenya.
          Each role has its own application form and full terms of reference below.
        </p>
        <div class="hero-actions">
          <a class="btn btn-primary btn-lg" href="#roles">
            See open roles
            <svg class="btn-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M5 12h13M12 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a class="btn btn-ghost btn-lg" href="#apply">How to apply</a>
        </div>
      </div>

      <figure class="page-hero-figure">
        <picture>
          <source type="image/webp" media="(max-width: 700px)" srcset="assets/img/session-sm.webp">
          <source type="image/webp" srcset="assets/img/session.webp">
          <source media="(max-width: 700px)" srcset="assets/img/session-sm.jpg">
          <img src="assets/img/session.jpg" width="1260" height="820" fetchpriority="high" decoding="async"
               alt="Colleagues seated together during a Nivishe Foundation session.">
        </picture>
      </figure>
    </div>
  </section>

  <!-- ========================== OPEN ROLES ========================= -->
  <section class="section section-roles" id="roles">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-eyebrow">Open roles</p>
        <h2 class="section-title"><?= count($jobs) ?> <?= count($jobs) === 1 ? 'position' : 'positions' ?> currently open</h2>
        <p class="section-intro">
          Open any role to read its full terms of reference &mdash; background, responsibilities,
          deliverables and the experience we are looking for.
        </p>
      </div>

      <div class="job-list">
        <?php foreach ($jobs as $job): ?>
          <article class="job-card reveal" id="<?= e($job['slug']) ?>">
            <div class="job-head">
              <div class="job-head-text">
                <ul class="job-chips">
                  <li class="chip chip-type"><?= e($job['type']) ?></li>
                  <li class="chip"><?= e($job['location']) ?></li>
                  <li class="chip">Reports to <?= e($job['reports_to']) ?></li>
                  <?php if ($job['closes'] !== ''): ?>
                    <li class="chip chip-closes">Closes <?= e($job['closes']) ?></li>
                  <?php endif; ?>
                </ul>
                <h3 class="job-title"><?= e($job['title']) ?></h3>
                <p class="job-summary"><?= e($job['summary']) ?></p>
                <ul class="job-highlights">
                  <?php foreach ($job['highlights'] as $point): ?>
                    <li><?= e($point) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <div class="job-actions">
                <a class="btn btn-primary" href="<?= e($job['apply_url']) ?>" target="_blank" rel="noopener">
                  Apply
                  <svg class="btn-arrow" viewBox="0 0 24 24" width="17" height="17" aria-hidden="true"><path d="M5 12h13M12 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a class="job-share" href="#<?= e($job['slug']) ?>">Link to this role</a>
              </div>
            </div>

            <details class="job-details" id="tor-<?= e($job['slug']) ?>">
              <summary>
                <span>Full terms of reference</span>
                <span class="faq-chevron" aria-hidden="true">
                  <svg viewBox="0 0 24 24" width="20" height="20"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
              </summary>

              <div class="tor">
                <section class="tor-block">
                  <h4>Background</h4>
                  <p><?= e($job['background']) ?></p>
                </section>

                <section class="tor-block">
                  <h4>Purpose of the role</h4>
                  <p><?= e($job['summary']) ?></p>
                </section>

                <section class="tor-block">
                  <h4>Key responsibilities</h4>
                  <?php foreach ($job['responsibilities'] as $area => $duties): ?>
                    <h5><?= e($area) ?></h5>
                    <ul class="tor-list">
                      <?php foreach ($duties as $duty): ?>
                        <li><?= e($duty) ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endforeach; ?>
                </section>

                <section class="tor-block">
                  <h4>Expected deliverables</h4>
                  <ul class="tor-list">
                    <?php foreach ($job['deliverables'] as $item): ?>
                      <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                  </ul>
                </section>

                <section class="tor-block">
                  <h4>Required qualifications and experience</h4>
                  <ul class="tor-list">
                    <?php foreach ($job['qualifications'] as $item): ?>
                      <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                  </ul>
                </section>

                <section class="tor-block">
                  <h4>Core competencies</h4>
                  <ul class="tor-list">
                    <?php foreach ($job['competencies'] as $item): ?>
                      <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                  </ul>
                </section>

                <section class="tor-block">
                  <h4>Ideal candidate profile</h4>
                  <p><?= e($job['profile']) ?></p>
                </section>

                <p class="tor-cta">
                  <a class="btn btn-primary" href="<?= e($job['apply_url']) ?>" target="_blank" rel="noopener">
                    Apply for <?= e($job['title']) ?>
                    <svg class="btn-arrow" viewBox="0 0 24 24" width="17" height="17" aria-hidden="true"><path d="M5 12h13M12 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </a>
                </p>
              </div>
            </details>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========================= HOW TO APPLY ======================== -->
  <section class="section section-apply" id="apply">
    <div class="container narrow apply-inner reveal">
      <p class="section-eyebrow light">How to apply</p>
      <h2 class="section-title light">One form per role</h2>
      <p class="apply-intro">
        Each position has its own application form. Read the terms of reference for the role
        you want, then open its form and complete it. If you are a strong fit for more than one
        role, you are welcome to apply for each separately.
      </p>

      <ul class="apply-roles">
        <?php foreach ($jobs as $job): ?>
          <li>
            <span class="apply-role-name"><?= e($job['title']) ?></span>
            <a class="btn btn-accent btn-sm" href="<?= e($job['apply_url']) ?>" target="_blank" rel="noopener">
              Application form
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <p class="apply-fineprint">
        Applications are reviewed as they arrive. We contact shortlisted candidates directly.
      </p>
    </div>
  </section>

  <!-- =========================== CONTACT =========================== -->
  <section class="section section-contact" id="contact">
    <div class="container narrow">
      <div class="section-head reveal">
        <p class="section-eyebrow">Questions</p>
        <h2 class="section-title">Ask before you apply</h2>
        <p class="section-intro">
          For questions about any of these roles, write to us. Please put the role title
          in your subject line so your message reaches the right person.
        </p>
      </div>

      <p class="contact-cta reveal">
        <a class="btn btn-primary btn-lg" href="mailto:<?= e(cfg('contact_email')) ?>">
          <?= e(cfg('contact_email')) ?>
        </a>
      </p>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
