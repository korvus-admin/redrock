<?php
/**
 * Title: Contact details
 * Slug: redrock/contact
 * Categories: redrock
 * Description: Address, hours, phone and map link, pulled from Settings → Red Rock.
 */
?>
<!-- wp:group {"templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
<!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Address</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"large","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"address_line1"}}}}} --><p class="has-large-font-size">7135 W Sahara Ave #101</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"address_line2"}}}}} --><p>Las Vegas, NV 89117</p><!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-secondary","fontSize":"small","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"maps_url"}}}}} -->
<div class="wp-block-button has-custom-font-size is-style-secondary has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" target="_blank" rel="noreferrer noopener">Get directions</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Phone &amp; fax</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"large","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"phone"}}}}} --><p class="has-large-font-size">702-227-5848</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"fax"}}}}} --><p>Fax 702-357-9475</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"email"}}}}} --><p>support@redrocksurgerycenter.com</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Hours</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"large","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"hours_weekday"}}}}} --><p class="has-large-font-size">Monday – Friday: 6am to 5pm</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"hours_weekend"}}}}} --><p>Saturday – Sunday: by arrangement</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
