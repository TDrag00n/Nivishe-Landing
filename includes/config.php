<?php
/**
 * PHL Fellowship 2026 — site configuration.
 *
 * Everything you are likely to change (links, dates, email, copy lists)
 * lives in this one file. Edit it, save, upload. No other file needs touching.
 */

if (!defined('PHL_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

return [

    /* ------------------------------------------------------------------
     | Organisation & page identity
     * ------------------------------------------------------------------ */
    'org_name'        => 'Nivishe Foundation',
    'org_url'         => 'https://nivishefoundation.org',
    'programme_name'  => 'Play for Healing and Learning (PHL) Fellowship 2026',
    'programme_short' => 'PHL Fellowship 2026',
    'meta_description' => 'A 12-week fellowship (October to December 2026) for teachers, early childhood educators, caregivers and community leaders in 10 Kenyan counties. Help children play, heal and learn through play.',

    /* Absolute URL of this page once it is live. Used for social sharing tags.
       Leave empty and it will be detected automatically. */
    'site_url'        => '',

    /* ------------------------------------------------------------------
     | The Apply button  ***  REPLACE THIS WITH YOUR GOOGLE FORM LINK  ***
     * ------------------------------------------------------------------ */
    'apply_url'       => 'https://forms.gle/REPLACE-WITH-YOUR-GOOGLE-FORM',

    /* ------------------------------------------------------------------
     | Dates — used for the countdown and the "applications closed" state
     * ------------------------------------------------------------------ */
    'timezone'        => 'Africa/Nairobi',
    'deadline'        => '2026-09-30 23:59:59',   // applications close
    'deadline_label'  => '30th September 2026',
    'programme_dates' => 'October to December 2026',
    'duration'        => '12 weeks',
    'weekly_time'     => '2–3 hours every week, delivered online',

    /* ------------------------------------------------------------------
     | Contact
     * ------------------------------------------------------------------ */
    'contact_email'   => 'mariamy@nivishefoundation.org',

    /* Built-in enquiry form. Set to false to show a plain mailto link instead.
       Requires PHP mail() to be enabled on your cPanel account (it usually is). */
    'contact_form_enabled' => true,

    /* Address the enquiry form sends to. Leave empty to use contact_email.
       TIP: for best deliverability create this mailbox inside cPanel on the
       same domain the site runs on. */
    'contact_form_to'      => '',

    /* ------------------------------------------------------------------
     | Section 5 — the 10 eligible counties
     * ------------------------------------------------------------------ */
    'counties' => [
        'Baringo', 'Kajiado', 'Samburu', 'West Pokot', 'Garissa',
        'Busia', 'Wajir', 'Narok', 'Taita Taveta', 'Kwale',
    ],

    /* ------------------------------------------------------------------
     | Section 10 — FAQs
     * ------------------------------------------------------------------ */
    'faqs' => [
        [
            'q' => 'Do I need to be a Nivishe alumnus or alumna to apply?',
            'a' => 'No. The Fellowship is open to everyone who meets the criteria. Alumni will be given first priority.',
        ],
        [
            'q' => 'I live outside the 10 counties. Can I apply?',
            'a' => 'Not for this cohort. The 2026 Fellowship is limited to the 10 counties listed above.',
        ],
        [
            'q' => 'Do I need a qualification in psychology or counselling?',
            'a' => 'No. Experience working with children is more important than formal qualifications.',
        ],
        [
            'q' => 'Is there a cost to join?',
            'a' => 'No. The Fellowship is free of charge.',
        ],
        [
            'q' => 'Who can I contact with questions?',
            'a' => 'Please write to {email}.',   // {email} becomes a mailto link
        ],
    ],
];
