<?php
/**
 * Title: Call to action
 * Slug: redrock/cta
 * Categories: redrock
 * Description: Appointment and referral buttons with the phone number.
 */
?>
<!-- wp:group {"gradient":"navy-deep","textColor":"base","templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-navy-deep-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:heading {"textAlign":"center","textColor":"base"} --><h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">Ready to schedule?</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"color":{"text":"#D6E0EC"}}} --><p class="has-text-align-center has-text-color has-large-font-size" style="color:#D6E0EC">Patients can request an appointment online. Referring providers can send us a patient in under two minutes.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"0.75rem","margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
<!-- wp:button {"metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"appointment_url"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/request-appointment/">Request an appointment</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"referral_url"}}}}} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="/refer-a-patient/">Refer a patient</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"phone_tel"}},"text":{"source":"redrock/info","args":{"key":"phone"}}}}} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+17022275848">702-227-5848</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
