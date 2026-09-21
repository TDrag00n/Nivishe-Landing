<?php
if (!defined('PHL_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}
?>
<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      <img class="footer-logo" src="assets/img/nivishe-logo-white.png" width="760" height="332"
           alt="<?= e(cfg('org_name')) ?>">
      <p class="footer-title"><?= e(cfg('programme_name')) ?></p>
      <p class="footer-desc">Helping children aged 6 to 12 play, heal and learn — through trauma-informed play, storytelling and community support.</p>
    </div>

    <div class="footer-col">
      <h2>Explore</h2>
      <ul>
        <li><a href="#why">Why this matters</a></li>
        <li><a href="#model">The PHL model</a></li>
        <li><a href="#fellowship">About the Fellowship</a></li>
        <li><a href="#eligibility">Who should apply</a></li>
        <li><a href="#apply">How to apply</a></li>
        <li><a href="#faq">FAQs</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h2>Get in touch</h2>
      <ul>
        <li><a href="mailto:<?= e(cfg('contact_email')) ?>"><?= e(cfg('contact_email')) ?></a></li>
        <li><a href="<?= e(cfg('org_url')) ?>" target="_blank" rel="noopener"><?= e(cfg('org_name')) ?></a></li>
      </ul>

      <h2 class="footer-h-spaced">Data management</h2>
      <p class="footer-fineprint">Your information will be used only to assess your application, in line with <?= e(cfg('org_name')) ?>&rsquo;s data protection practices.</p>
    </div>
  </div>

  <div class="container footer-bottom">
    <p>&copy; <?= date('Y') ?> <?= e(cfg('org_name')) ?>. All rights reserved.</p>
    <p><a href="#top">Back to top &uarr;</a></p>
  </div>
</footer>

<script src="assets/js/main.js?v=2" defer></script>
</body>
</html>
