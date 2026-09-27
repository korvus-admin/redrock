<?php
/**
 * Title: Services grid
 * Slug: redrock/services-grid
 * Categories: redrock
 * Description: Automatically lists every published Service as a card.
 */
?>
<!-- wp:group {"backgroundColor":"sand","templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sand-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Surgical specialties</p><!-- /wp:paragraph -->
<!-- wp:heading --><h2 class="wp-block-heading">Care across every specialty</h2><!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-secondary"} --><div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button" href="/services/">All services</a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:query {"queryId":10,"query":{"perPage":12,"pages":0,"offset":0,"postType":"rr_service","order":"asc","orderBy":"menu_order","inherit":false},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-query alignwide" style="margin-top:var(--wp--preset--spacing--50)">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"rr-card-service is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-card-service is-style-card">
<!-- wp:paragraph {"className":"rr-icon","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"rr_icon"}}}}} --><p class="rr-icon"></p><!-- /wp:paragraph -->
<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
<!-- wp:paragraph {"textColor":"stone","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"rr_blurb"}}}}} --><p class="has-stone-color has-text-color"></p><!-- /wp:paragraph -->
<!-- wp:read-more {"content":"Learn more →","style":{"typography":{"fontWeight":"600"}}} /-->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
