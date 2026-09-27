<?php
/**
 * Title: Testimonials
 * Slug: redrock/testimonials
 * Categories: redrock
 * Description: The three most recent patient reviews.
 */
?>
<!-- wp:group {"backgroundColor":"sand","templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sand-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:paragraph {"align":"center","className":"rr-eyebrow"} --><p class="has-text-align-center rr-eyebrow">Patient stories</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">What our patients say</h2><!-- /wp:heading -->
<!-- wp:query {"queryId":12,"query":{"perPage":3,"pages":0,"offset":0,"postType":"rr_testimonial","order":"asc","orderBy":"menu_order","inherit":false},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-query alignwide" style="margin-top:var(--wp--preset--spacing--50)">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card">
<!-- wp:paragraph {"className":"rr-stars","metadata":{"bindings":{"content":{"source":"redrock/testimonial","args":{"key":"stars"}}}}} --><p class="rr-stars">★★★★★</p><!-- /wp:paragraph -->
<!-- wp:group {"className":"rr-quote","layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-quote"><!-- wp:post-excerpt {"excerptLength":48,"showMoreOnNewLine":false,"moreText":""} /--></div>
<!-- /wp:group -->
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"metadata":{"bindings":{"content":{"source":"redrock/testimonial","args":{"key":"author"}}}}} --><p style="font-weight:600"></p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
<!-- wp:button {"className":"is-style-secondary","metadata":{"bindings":{"url":{"source":"redrock/info","args":{"key":"review_url"}}}}} -->
<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button" href="#" target="_blank" rel="noreferrer noopener">Write a review</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
