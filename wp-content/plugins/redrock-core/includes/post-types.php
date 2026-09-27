<?php
defined( 'ABSPATH' ) || exit;

/**
 * Services, Providers, Testimonials + Specialty taxonomy.
 * All REST-enabled so the block editor, Query Loop and block bindings can use them.
 */
function redrock_register_post_types() {
	register_taxonomy( 'rr_specialty', array( 'rr_service', 'rr_provider' ), array(
		'labels'            => array(
			'name'          => __( 'Specialties', 'redrock' ),
			'singular_name' => __( 'Specialty', 'redrock' ),
			'add_new_item'  => __( 'Add New Specialty', 'redrock' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'specialty' ),
	) );

	register_post_type( 'rr_service', array(
		'labels'       => array(
			'name'               => __( 'Services', 'redrock' ),
			'singular_name'      => __( 'Service', 'redrock' ),
			'add_new_item'       => __( 'Add New Service', 'redrock' ),
			'edit_item'          => __( 'Edit Service', 'redrock' ),
			'all_items'          => __( 'All Services', 'redrock' ),
			'featured_image'     => __( 'Service photo', 'redrock' ),
			'set_featured_image' => __( 'Set service photo', 'redrock' ),
		),
		'public'       => true,
		'has_archive'  => 'services',
		'rewrite'      => array( 'slug' => 'services', 'with_front' => false ),
		'menu_icon'    => 'dashicons-heart',
		'menu_position'=> 20,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
		'template'     => array(
			array( 'core/paragraph', array( 'placeholder' => 'Describe this service in plain language for patients…' ) ),
			array( 'core/heading', array( 'level' => 2, 'content' => 'Procedures we perform' ) ),
			array( 'core/list' ),
		),
	) );

	register_post_type( 'rr_provider', array(
		'labels'       => array(
			'name'               => __( 'Providers', 'redrock' ),
			'singular_name'      => __( 'Provider', 'redrock' ),
			'add_new_item'       => __( 'Add New Provider', 'redrock' ),
			'edit_item'          => __( 'Edit Provider', 'redrock' ),
			'all_items'          => __( 'All Providers', 'redrock' ),
			'featured_image'     => __( 'Headshot', 'redrock' ),
			'set_featured_image' => __( 'Set headshot', 'redrock' ),
		),
		'public'       => true,
		'has_archive'  => 'providers',
		'rewrite'      => array( 'slug' => 'providers', 'with_front' => false ),
		'menu_icon'    => 'dashicons-groups',
		'menu_position'=> 21,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
	) );

	register_post_type( 'rr_testimonial', array(
		'labels'       => array(
			'name'          => __( 'Testimonials', 'redrock' ),
			'singular_name' => __( 'Testimonial', 'redrock' ),
			'add_new_item'  => __( 'Add New Testimonial', 'redrock' ),
			'edit_item'     => __( 'Edit Testimonial', 'redrock' ),
			'all_items'     => __( 'All Testimonials', 'redrock' ),
		),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => false,
		'rewrite'             => false,
		'menu_icon'           => 'dashicons-format-quote',
		'menu_position'       => 22,
		'show_in_rest'        => true,
		'supports'            => array( 'title', 'editor', 'page-attributes', 'custom-fields' ),
		'template'            => array(
			array( 'core/paragraph', array( 'placeholder' => 'Paste the patient’s review here…' ) ),
		),
		'template_lock'       => 'all',
	) );
}
add_action( 'init', 'redrock_register_post_types' );

// Testimonials are only ever shown inside grids; send single views back home.
add_action( 'template_redirect', function () {
	if ( is_singular( 'rr_testimonial' ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
} );
