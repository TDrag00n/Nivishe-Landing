<?php
/**
 * PHL Fellowship 2026 — landing page.
 *
 * Upload the whole folder to public_html on cPanel. Nothing to install.
 * All editable content lives in includes/config.php.
 */

define('PHL_APP', true);

session_start();

$config = require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

date_default_timezone_set(cfg('timezone', 'UTC'));

// Enquiry form (posts back to this page, then redirects so a refresh
// does not re-send the message).
[$contactErrors, $contactSent, $contactValues] = cfg('contact_form_enabled', true)
    ? handle_contact_submission()
    : [[], false, ['name' => '', 'email' => '', 'county' => '', 'message' => '']];

if ($contactSent) {
    header('Location: ' . strtok($_SERVER['REQUEST_URI'] ?? 'index.php', '?') . '?sent=1#contact');
    exit;
}
$contactSent = isset($_GET['sent']);

$applyUrl = cfg('apply_url');
$isOpen   = applications_open();

require __DIR__ . '/includes/header.php';
?>

<main id="main">

  <!-- ============================ HERO ============================ -->
  <section class="hero" id="top">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container hero-inner">
      <p class="eyebrow"><span class="eyebrow-dot" aria-hidden="true"></span><?= e(cfg('org_name')) ?> &middot; Cohort 2026</p>

      <h1 class="hero-title">
        Play for Healing and Learning<br>
        <span class="hero-title-accent">(PHL) Fellowship 2026</span>
      </h1>

      <p class="hero-lead">
        Help children in your community <strong>play, heal and learn</strong> through play.
      </p>

      <p class="hero-sub">
        A <?= e(cfg('duration')) ?> fellowship, <?= e(cfg('programme_dates')) ?>, for teachers,
        early childhood educators, caregivers and community leaders in 10 Kenyan counties.
      </p>

      <div class="hero-actions">
        <?php if ($isOpen): ?>
          <a class="btn btn-primary btn-lg" href="<?= e($applyUrl) ?>" target="_blank" rel="noopener">
            Apply Now
            <svg class="btn-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M5 12h13M12 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        <?php else: ?>
          <span class="btn btn-primary btn-lg is-disabled" aria-disabled="true">Applications closed</span>
        <?php endif; ?>
        <a class="btn btn-ghost btn-lg" href="#fellowship">See what Fellows do</a>
      </div>

      <p class="deadline-pill <?= $isOpen ? '' : 'is-closed' ?>">
        <svg viewBox="0 0 24 24" width="17" height="17" aria-hidden="true"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/><path d="M12 7v5.2l3.4 2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <span><?= e(deadline_sentence()) ?></span>
      </p>
      <p class="deadline-note">Applications are reviewed on a rolling basis, so early applications are encouraged.</p>

      <ul class="hero-stats">
        <li><strong>12</strong><span>weeks of training</span></li>
        <li><strong>10</strong><span>Kenyan counties</span></li>
        <li><strong>6&ndash;12</strong><span>the ages we serve</span></li>
        <li><strong>Free</strong><span>no cost to join</span></li>
      </ul>
    </div>
  </section>

  <!-- ====================== WHY THIS MATTERS ====================== -->
  <section class="section section-why" id="why">
    <div class="container narrow reveal">
      <p class="section-eyebrow">Why this matters</p>
      <h2 class="section-title">The adults closest to children are asked to help &mdash; often without the tools to do it.</h2>
      <p class="lead-text">
        Many children in Kenya grow up facing displacement, family stress, loss, climate shocks and
        limited access to quality education. These experiences affect how children learn, build
        relationships, and manage their emotions.
      </p>
      <p class="lead-text">
        The adults closest to them, including teachers, caregivers and community leaders, are often
        expected to help without the tools or training to do so.
        <strong>The PHL Fellowship exists to close that gap.</strong>
      </p>
    </div>
  </section>

  <!-- ======================= THE PHL MODEL ======================== -->
  <section class="section section-model" id="model">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-eyebrow">About the PHL model</p>
        <h2 class="section-title">Three parts that work together</h2>
        <p class="section-intro">
          The Play for Healing and Learning (PHL) model, developed by <?= e(cfg('org_name')) ?>, is a
          trauma-informed approach that uses play, storytelling and community support to help children
          aged 6 to 12 play, heal and learn.
        </p>
      </div>

      <div class="card-grid three reveal">
        <article class="card">
          <span class="card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="26" height="26"><path d="M4 5.5A1.5 1.5 0 0 1 5.5 4H10a2 2 0 0 1 2 2v13a2 2 0 0 0-2-2H5.5A1.5 1.5 0 0 1 4 15.5Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M20 5.5A1.5 1.5 0 0 0 18.5 4H14a2 2 0 0 0-2 2v13a2 2 0 0 1 2-2h4.5a1.5 1.5 0 0 0 1.5-1.5Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
          </span>
          <p class="card-step">01</p>
          <h3>The Brain Wave Mental Health Chronicles</h3>
          <p>Comic stories that help children understand their emotions, build coping skills and strengthen early literacy.</p>
        </article>

        <article class="card">
          <span class="card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="26" height="26"><circle cx="9" cy="8" r="3.2" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M3.5 19.5c0-3 2.5-5 5.5-5s5.5 2 5.5 5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M16.5 6.2a3 3 0 0 1 0 5.6M18.4 14.9c1.5.9 2.4 2.5 2.4 4.6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
          <p class="card-step">02</p>
          <h3>Fellowship</h3>
          <p>Training for the adults who work with children every day &mdash; teachers, caregivers and community leaders.</p>
        </article>

        <article class="card">
          <span class="card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="26" height="26"><path d="M3.5 10.5 12 4l8.5 6.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.5 12v7.5h13V12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="15" r="2.2" fill="none" stroke="currentColor" stroke-width="1.8"/></svg>
          </span>
          <p class="card-step">03</p>
          <h3>Safe play spaces</h3>
          <p>Welcoming spaces within schools and community venues where children can play, learn, and receive support.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== ABOUT THE FELLOWSHIP ==================== -->
  <section class="section section-fellowship" id="fellowship">
    <div class="container">
      <div class="split">
        <div class="split-text reveal">
          <p class="section-eyebrow">About the Fellowship</p>
          <h2 class="section-title">Twelve weeks of practical, play-based training</h2>
          <p class="section-intro">
            Over <?= e(cfg('duration')) ?>, from <?= e(cfg('programme_dates')) ?>, Fellows will learn
            practical ways to support children&rsquo;s emotional well-being and learning through play.
          </p>

          <ul class="check-list">
            <li>Learn how trauma and stress affect children, and how to respond with care</li>
            <li>Use play-based and story-based activities with children aged 6 to 12</li>
            <li>Recognize when a child needs further help, and refer them safely</li>
            <li>Join a network of practitioners working across 10 counties</li>
          </ul>
        </div>

        <aside class="split-aside reveal">
          <div class="fact-box">
            <h3>At a glance</h3>
            <dl>
              <div><dt>Time commitment</dt><dd><?= e(cfg('weekly_time')) ?></dd></div>
              <div><dt>Duration</dt><dd><?= e(cfg('duration')) ?> (about 3 months)</dd></div>
              <div><dt>Runs</dt><dd><?= e(cfg('programme_dates')) ?></dd></div>
              <div><dt>Format</dt><dd>Delivered online</dd></div>
              <div><dt>Cost</dt><dd>Free of charge</dd></div>
              <div><dt>Children served</dt><dd>Ages 6 to 12</dd></div>
            </dl>
          </div>
        </aside>
      </div>
    </div>
  </section>

  <!-- ====================== WHO SHOULD APPLY ====================== -->
  <section class="section section-eligibility" id="eligibility">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-eyebrow">Who should apply</p>
        <h2 class="section-title">Open to applicants living in these 10 counties</h2>
      </div>

      <ul class="county-grid reveal">
        <?php foreach (cfg('counties', []) as $i => $county): ?>
          <li class="county">
            <span class="county-num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <span class="county-name"><?= e($county) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="criteria reveal">
        <h3>You should also be someone who&hellip;</h3>
        <ul class="check-list two-col">
          <li>Is a teacher, early childhood educator, caregiver, community leader, or is otherwise actively working with children aged 6 to 12</li>
          <li>Can commit to the full 12 weeks (about 3 months), from <?= e(cfg('programme_dates')) ?></li>
          <li>Is willing to undergo safeguarding and background checks</li>
        </ul>
        <p class="note note-accent">
          The Fellowship is open to everyone. <strong>Alumni of previous <?= e(cfg('org_name')) ?> Fellowship
          cohorts will be given first priority.</strong>
        </p>
      </div>
    </div>
  </section>

  <!-- ============== RECEIVE / COMMIT TO (two columns) ============== -->
  <section class="section section-exchange">
    <div class="container">
      <div class="exchange-grid">
        <article class="exchange-card receive reveal">
          <p class="section-eyebrow">What Fellows receive</p>
          <h2>Everything you need to start</h2>
          <ul class="icon-list">
            <li>Practical training in play-based psychosocial support</li>
            <li>PHL materials, including the Brain Wave Mental Health Chronicles</li>
            <li>Supervision and ongoing support from the Nivishe team</li>
            <li>A certificate of completion</li>
          </ul>
        </article>

        <article class="exchange-card commit reveal">
          <p class="section-eyebrow">What Fellows commit to</p>
          <h2>What we ask of you</h2>
          <ul class="icon-list">
            <li>Attending all training sessions over the 12 weeks</li>
            <li>Signing the Fellowship agreement and the Nivishe Code of Conduct</li>
            <li>Always following Nivishe safeguarding and referral procedures</li>
            <li>Taking part in data collection that helps Nivishe measure the programme&rsquo;s impact</li>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- ========================= KEY DATES ========================== -->
  <section class="section section-dates" id="dates">
    <div class="container narrow">
      <div class="section-head reveal">
        <p class="section-eyebrow">Key dates</p>
        <h2 class="section-title">Mark your calendar</h2>
      </div>

      <ol class="timeline reveal">
        <li>
          <span class="timeline-dot" aria-hidden="true"></span>
          <p class="timeline-date">Applications close</p>
          <p class="timeline-body"><?= e(cfg('deadline_label')) ?> &mdash; reviewed on a rolling basis, so apply early.</p>
        </li>
        <li>
          <span class="timeline-dot" aria-hidden="true"></span>
          <p class="timeline-date">Fellowship runs</p>
          <p class="timeline-body"><?= e(cfg('programme_dates')) ?> &mdash; <?= e(cfg('weekly_time')) ?>.</p>
        </li>
      </ol>
    </div>
  </section>

  <!-- ========================= HOW TO APPLY ======================= -->
  <section class="section section-apply" id="apply">
    <div class="container narrow apply-inner reveal">
      <p class="section-eyebrow light">How to apply</p>
      <h2 class="section-title light">It takes about 15 minutes</h2>
      <p class="apply-intro">
        Complete the online application form. Please have the following ready:
        your contact details, your current role and organisation, and a short description of your
        experience working with children.
      </p>

      <div class="apply-ready">
        <span>Contact details</span>
        <span>Role &amp; organisation</span>
        <span>Your experience with children</span>
      </div>

      <?php if ($isOpen): ?>
        <a class="btn btn-accent btn-lg" href="<?= e($applyUrl) ?>" target="_blank" rel="noopener">
          Apply Now
          <svg class="btn-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M5 12h13M12 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <p class="apply-fineprint"><?= e(deadline_sentence()) ?></p>
      <?php else: ?>
        <span class="btn btn-accent btn-lg is-disabled" aria-disabled="true">Applications closed</span>
        <p class="apply-fineprint">Applications for the 2026 cohort closed on <?= e(cfg('deadline_label')) ?>.
          Write to <a href="mailto:<?= e(cfg('contact_email')) ?>"><?= e(cfg('contact_email')) ?></a> to hear about the next cohort.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- ============================ FAQs ============================ -->
  <section class="section section-faq" id="faq">
    <div class="container narrow">
      <div class="section-head reveal">
        <p class="section-eyebrow">Frequently asked questions</p>
        <h2 class="section-title">Questions we hear often</h2>
      </div>

      <div class="faq-list reveal">
        <?php foreach (cfg('faqs', []) as $index => $faq): ?>
          <?php
            $mailto = '<a href="mailto:' . e(cfg('contact_email')) . '">' . e(cfg('contact_email')) . '</a>';
            $answer = str_replace('{email}', $mailto, e($faq['a']));
          ?>
          <details class="faq-item"<?= $index === 0 ? ' open' : '' ?>>
            <summary>
              <span><?= e($faq['q']) ?></span>
              <span class="faq-chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </summary>
            <div class="faq-answer"><p><?= $answer ?></p></div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- =========================== CONTACT ========================== -->
  <section class="section section-contact" id="contact">
    <div class="container narrow">
      <div class="section-head reveal">
        <p class="section-eyebrow">Still have a question?</p>
        <h2 class="section-title">Talk to the Nivishe team</h2>
        <p class="section-intro">
          Write to <a href="mailto:<?= e(cfg('contact_email')) ?>"><?= e(cfg('contact_email')) ?></a><?= cfg('contact_form_enabled', true) ? ', or send us a message here.' : '.' ?>
        </p>
      </div>

      <?php if (cfg('contact_form_enabled', true)): ?>
        <?php if ($contactSent): ?>
          <p class="form-alert success" role="status">
            Thank you &mdash; your message is on its way. We usually reply within a few working days.
          </p>
        <?php endif; ?>

        <?php if ($contactErrors): ?>
          <div class="form-alert error" role="alert">
            <p>Please check the following:</p>
            <ul>
              <?php foreach ($contactErrors as $error): ?>
                <li><?= e($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form class="contact-form reveal" method="post" action="#contact" novalidate>
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <input type="hidden" name="contact_submit" value="1">

          <p class="hp-field" aria-hidden="true">
            <label for="website">Leave this field empty</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </p>

          <div class="form-row">
            <p class="form-field">
              <label for="name">Your name <span aria-hidden="true">*</span></label>
              <input type="text" id="name" name="name" required autocomplete="name" value="<?= e($contactValues['name']) ?>">
            </p>
            <p class="form-field">
              <label for="email">Email address <span aria-hidden="true">*</span></label>
              <input type="email" id="email" name="email" required autocomplete="email" value="<?= e($contactValues['email']) ?>">
            </p>
          </div>

          <p class="form-field">
            <label for="county">County <span class="optional">(optional)</span></label>
            <select id="county" name="county">
              <option value="">Select your county</option>
              <?php foreach (cfg('counties', []) as $county): ?>
                <option value="<?= e($county) ?>"<?= $contactValues['county'] === $county ? ' selected' : '' ?>><?= e($county) ?></option>
              <?php endforeach; ?>
              <option value="Other"<?= $contactValues['county'] === 'Other' ? ' selected' : '' ?>>Other / outside the 10 counties</option>
            </select>
          </p>

          <p class="form-field">
            <label for="message">Your message <span aria-hidden="true">*</span></label>
            <textarea id="message" name="message" rows="5" required><?= e($contactValues['message']) ?></textarea>
          </p>

          <p class="form-actions">
            <button class="btn btn-primary btn-lg" type="submit">Send message</button>
            <span class="form-fineprint">We use your details only to reply to you.</span>
          </p>
        </form>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
