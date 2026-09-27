<?php
/**
 * Title: Header
 * Slug: redrock/header
 * Categories: redrock
 * Block Types: core/template-part/header
 * Inserter: false
 */
$logo = esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) );
?>
<!-- wp:group {"className":"rr-topbar","backgroundColor":"ink","textColor":"base","style":{"spacing":{"padding":{"top":"6px","bottom":"6px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-topbar has-base-color has-ink-background-color has-text-color has-background" style="padding-top:6px;padding-bottom:6px">
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"1.5rem"}}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"fontSize":"small","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"address"}}}}} -->
<p class="has-small-font-size">7135 W Sahara Ave #101, Las Vegas, NV 89117</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"hours_weekday"}}}}} -->
<p class="has-small-font-size">Monday – Friday: 6am to 5pm</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:buttons {"style":{"spacing":{"blockGap":"0.5rem"}}} -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-ghost","fontSize":"small","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"phone_tel"}},"text":{"source":"redrock/info","args":{"key":"phone"}}}}} -->
<div class="wp-block-button has-custom-font-size is-style-ghost has-small-font-size"><a class="wp-block-button__link wp-element-button" href="tel:+17022275848">702-227-5848</a></div>
<!-- /wp:button -->
<!-- wp:button {"fontSize":"small","backgroundColor":"teal","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"payment_url"}}}}} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-teal-background-color has-background wp-element-button" href="#" target="_blank" rel="noreferrer noopener">Pay online</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"rr-header","style":{"spacing":{"padding":{"top":"14px","bottom":"14px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-header" style="padding-top:14px;padding-bottom:14px">
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide">
<!-- wp:image {"className":"rr-logo","width":"220px","linkDestination":"custom"} -->
<figure class="wp-block-image rr-logo"><a href="/"><img src="<?php echo $logo; ?>" alt="Red Rock Surgery Center" style="width:220px"/></a></figure>
<!-- /wp:image -->
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1.5rem"}}} -->
<div class="wp-block-group">
<!-- wp:navigation {"overlayMenu":"mobile","overlayBackgroundColor":"ink","overlayTextColor":"base","layout":{"type":"flex","justifyContent":"right"}} /-->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"rr-header-cta","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"appointment_url"}}}}} -->
<div class="wp-block-button rr-header-cta"><a class="wp-block-button__link wp-element-button" href="/request-appointment/">Request appointment</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
