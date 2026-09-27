<?php
/**
 * Title: Hero
 * Slug: redrock/hero
 * Categories: redrock
 * Description: Full-width introduction with headline, two calls to action and an accreditation card.
 */
?>
<!-- wp:group {"className":"rr-hero","gradient":"navy-deep","textColor":"base","templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-hero has-base-color has-navy-deep-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Same-day outpatient surgery · Las Vegas</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"base"} --><h1 class="wp-block-heading has-base-color has-text-color">Expert surgical care, close to home.</h1><!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"large","style":{"color":{"text":"#D6E0EC"}}} --><p class="has-text-color has-large-font-size" style="color:#D6E0EC">Red Rock Surgery Center is an AAAHC-accredited, multi-specialty ambulatory surgery center. Three state-of-the-art operating suites, a caring team, and about 1,000 procedures a year.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"blockGap":"0.75rem","margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
<!-- wp:button {"metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"appointment_url"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/request-appointment/">Request an appointment</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"referral_url"}}}}} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="/refer-a-patient/">Refer a patient</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:group {"className":"rr-hero-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-hero-card">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Accredited &amp; trusted</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"textColor":"base"} --><h3 class="wp-block-heading has-base-color has-text-color">AAAHC accreditation means national standards for safety and quality.</h3><!-- /wp:heading -->
<!-- wp:list {"className":"is-style-checks"} -->
<ul class="wp-block-list is-style-checks"><!-- wp:list-item --><li>Board-certified surgeons across 11 specialties</li><!-- /wp:list-item --><!-- wp:list-item --><li>All major anesthesia groups credentialed</li><!-- /wp:list-item --><!-- wp:list-item --><li>Serving Las Vegas for over 10 years</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
