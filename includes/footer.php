<?php
if (!defined('NIVISHE_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

/* Pages may override these; the Fellowship landing page's values are defaults. */
$footerTitle ??= cfg('programme_name');
$footerDesc  ??= 'Helping children aged 6 to 12 play, heal and learn — through trauma-informed play, storytelling and community support.';
$footerLinks ??= [
    '#why'         => 'Why this matters',
    '#model'       => 'The PHL model',
    '#fellowship'  => 'About the Fellowship',
    '#eligibility' => 'Who should apply',
    '#apply'       => 'How to apply',
    '#faq'         => 'FAQs',
];
$footerDataNote ??= 'Your information will be used only to assess your application, in line with '
    . e(cfg('org_name')) . '&rsquo;s data protection practices.';
?>
<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      <a class="footer-logo-link" href="<?= e(cfg('org_url')) ?>" target="_blank" rel="noopener"
         aria-label="<?= e(cfg('org_name')) ?> home page (opens in a new tab)">
        <img class="footer-logo" src="assets/img/nivishe-logo-white.png" width="760" height="332"
             alt="<?= e(cfg('org_name')) ?>">
      </a>
      <p class="footer-title"><?= e($footerTitle) ?></p>
      <p class="footer-desc"><?= e($footerDesc) ?></p>
    </div>

    <div class="footer-col">
      <h2>Explore</h2>
      <ul>
        <?php foreach ($footerLinks as $href => $label): ?>
          <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-col">
      <h2>Get in touch</h2>
      <ul>
        <li><a href="mailto:<?= e(cfg('contact_email')) ?>"><?= e(cfg('contact_email')) ?></a></li>
        <li><a href="<?= e(cfg('org_url')) ?>" target="_blank" rel="noopener"><?= e(cfg('org_name')) ?></a></li>
      </ul>

      <h2 class="footer-h-spaced">Data management</h2>
      <p class="footer-fineprint"><?= $footerDataNote ?></p>
    </div>
  </div>

  <div class="container footer-bottom">
    <p>&copy; <?= date('Y') ?> <?= e(cfg('org_name')) ?>. All rights reserved.</p>
    <p><a href="#top">Back to top &uarr;</a></p>
  </div>
</footer>

<script src="assets/js/main.js?v=3" defer></script>
</body>
</html>
