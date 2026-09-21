<?php
if (!defined('PHL_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}
?>
<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      <span class="brand-mark" aria-hidden="true">
        <svg viewBox="0 0 40 40" width="40" height="40" role="img" focusable="false">
          <circle cx="20" cy="20" r="19" fill="#f6b23c"/>
          <path d="M20 29.5s-8.2-4.7-8.2-10.4a4.6 4.6 0 0 1 8.2-2.9 4.6 4.6 0 0 1 8.2 2.9c0 5.7-8.2 10.4-8.2 10.4Z" fill="#0f5c52"/>
        </svg>
      </span>
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

<script src="assets/js/main.js?v=1" defer></script>
</body>
</html>
