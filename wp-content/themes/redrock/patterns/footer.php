<?php
/**
 * Title: Footer
 * Slug: redrock/footer
 * Categories: redrock
 * Block Types: core/template-part/footer
 * Inserter: false
 */
$logo = esc_url( get_theme_file_uri( 'assets/img/logo-white.svg' ) );
?>
<!-- wp:group {"className":"rr-footer","backgroundColor":"ink","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-footer has-base-color has-ink-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
<!-- wp:column {"width":"34%"} -->
<div class="wp-block-column" style="flex-basis:34%">
<!-- wp:image {"width":"200px"} -->
<figure class="wp-block-image"><img src="<?php echo $logo; ?>" alt="Red Rock Surgery Center" style="width:200px"/></figure>
<!-- /wp:image -->
<!-- wp:paragraph {"style":{"color":{"text":"#B8C4D4"}}} -->
<p class="has-text-color" style="color:#B8C4D4">A premier multi-specialty outpatient surgery facility serving Las Vegas and patients from around the world.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"accreditation"}}}}} -->
<p class="has-small-font-size">AAAHC-accredited ambulatory surgery center</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"fontSize":"medium","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} --><h3 class="wp-block-heading has-medium-font-size" style="letter-spacing:0.1em;text-transform:uppercase">Explore</h3><!-- /wp:heading -->
<!-- wp:list {"className":"is-style-default","style":{"typography":{"lineHeight":"2"}}} -->
<ul class="wp-block-list is-style-default" style="line-height:2"><!-- wp:list-item --><li><a href="/services/">Our services</a></li><!-- /wp:list-item --><!-- wp:list-item --><li><a href="/providers/">Our providers</a></li><!-- /wp:list-item --><!-- wp:list-item --><li><a href="/your-surgical-journey/">Your surgical journey</a></li><!-- /wp:list-item --><!-- wp:list-item --><li><a href="/our-facility/">Our facility</a></li><!-- /wp:list-item --><!-- wp:list-item --><li><a href="/careers/">Careers</a></li><!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"fontSize":"medium","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} --><h3 class="wp-block-heading has-medium-font-size" style="letter-spacing:0.1em;text-transform:uppercase">Visit</h3><!-- /wp:heading -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"address_line1"}}}}} --><p>7135 W Sahara Ave #101</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"address_line2"}}}}} --><p>Las Vegas, NV 89117</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"hours_weekday"}}}}} --><p>Monday – Friday: 6am to 5pm</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"hours_weekend"}}}}} --><p>Saturday – Sunday: by arrangement</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"fontSize":"medium","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} --><h3 class="wp-block-heading has-medium-font-size" style="letter-spacing:0.1em;text-transform:uppercase">Contact</h3><!-- /wp:heading -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"phone"}}}}} --><p>702-227-5848</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"fax"}}}}} --><p>702-357-9475</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"email"}}}}} --><p>support@redrocksurgerycenter.com</p><!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-ghost","fontSize":"small","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"payment_url"}}}}} -->
<div class="wp-block-button has-custom-font-size is-style-ghost has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" target="_blank" rel="noreferrer noopener">Make a payment</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:group {"className":"rr-footer-bottom","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide rr-footer-bottom" style="margin-top:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--40)">
<!-- wp:paragraph {"fontSize":"small","style":{"color":{"text":"#B8C4D4"}}} --><p class="has-text-color has-small-font-size" style="color:#B8C4D4">© Red Rock Surgery Center. All rights reserved.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","style":{"color":{"text":"#B8C4D4"}}} --><p class="has-text-color has-small-font-size" style="color:#B8C4D4"><a href="/privacy-policy/">Privacy policy</a> · <a href="/disclosures/">Disclosures</a></p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
