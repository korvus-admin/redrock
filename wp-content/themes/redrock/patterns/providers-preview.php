<?php
/**
 * Title: Providers preview
 * Slug: redrock/providers-preview
 * Categories: redrock
 * Description: The first eight Providers with a link to the full list.
 */
?>
<!-- wp:group {"templateLock":"contentOnly","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"rr-eyebrow"} --><p class="rr-eyebrow">Medical staff</p><!-- /wp:paragraph -->
<!-- wp:heading --><h2 class="wp-block-heading">Meet our surgeons and physicians</h2><!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-secondary"} --><div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button" href="/providers/">All providers</a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:query {"queryId":11,"query":{"perPage":8,"pages":0,"offset":0,"postType":"rr_provider","order":"asc","orderBy":"menu_order","inherit":false},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-query alignwide" style="margin-top:var(--wp--preset--spacing--50)">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"grid","columnCount":4}} -->
<!-- wp:group {"className":"rr-provider-card is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group rr-provider-card is-style-card">
<!-- wp:post-featured-image {"style":{"border":{"radius":"12px"}}} /-->
<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
<!-- wp:post-terms {"term":"rr_specialty","textColor":"stone","fontSize":"small"} /-->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
