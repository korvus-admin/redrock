<?php
defined( 'ABSPATH' ) || exit;

/**
 * Block Bindings. Lets theme patterns show live site details and testimonial
 * meta without any PHP in the templates:
 *
 *   {"metadata":{"bindings":{"content":{"source":"redrock/info","args":{"key":"phone"}}}}}
 */
add_action( 'init', function () {
	if ( ! function_exists( 'register_block_bindings_source' ) ) {
		return;
	}

	register_block_bindings_source( 'redrock/info', array(
		'label'              => __( 'Red Rock site details', 'redrock' ),
		'get_value_callback' => function ( array $args ) {
			return redrock_info( $args['key'] ?? '' );
		},
	) );

	register_block_bindings_source( 'redrock/testimonial', array(
		'label'              => __( 'Testimonial details', 'redrock' ),
		'uses_context'       => array( 'postId' ),
		'get_value_callback' => function ( array $args, $block ) {
			$post_id = $block->context['postId'] ?? get_the_ID();
			$key     = $args['key'] ?? '';
			if ( 'stars' === $key ) {
				$n = (int) get_post_meta( $post_id, 'rr_rating', true );
				$n = $n > 0 ? min( 5, $n ) : 5;
				return str_repeat( '★', $n ) . str_repeat( '☆', 5 - $n );
			}
			if ( 'author' === $key ) {
				$a = get_post_meta( $post_id, 'rr_author', true );
				return $a ? $a : get_the_title( $post_id );
			}
			return (string) get_post_meta( $post_id, $key, true );
		},
	) );
} );
