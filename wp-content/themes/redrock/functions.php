<?php
/**
 * Red Rock block theme.
 */
defined( 'ABSPATH' ) || exit;

define( 'REDROCK_THEME_VERSION', '0.1.0' );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/theme.css' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'rr-card', 800, 560, true );
	add_image_size( 'rr-portrait', 600, 720, true );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'redrock-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap', array(), null );
	wp_enqueue_style( 'redrock-theme', get_theme_file_uri( 'assets/css/theme.css' ), array(), REDROCK_THEME_VERSION );
} );
add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style( 'redrock-fonts-editor', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap', array(), null );
} );

// Pattern category so editors find the site's sections in one place.
add_action( 'init', function () {
	register_block_pattern_category( 'redrock', array( 'label' => __( 'Red Rock', 'redrock' ), 'description' => __( 'Sections designed for Red Rock Surgery Center', 'redrock' ) ) );
} );

// Block style variations used by patterns.
add_action( 'init', function () {
	register_block_style( 'core/group', array( 'name' => 'card', 'label' => __( 'Card', 'redrock' ) ) );
	register_block_style( 'core/group', array( 'name' => 'card-dark', 'label' => __( 'Card (dark)', 'redrock' ) ) );
	register_block_style( 'core/button', array( 'name' => 'ghost', 'label' => __( 'Ghost (on dark)', 'redrock' ) ) );
	register_block_style( 'core/button', array( 'name' => 'secondary', 'label' => __( 'Secondary', 'redrock' ) ) );
	register_block_style( 'core/list', array( 'name' => 'checks', 'label' => __( 'Checkmarks', 'redrock' ) ) );
} );

// A sane <title> instead of the keyword-stuffed one on the current site.
add_filter( 'document_title_separator', fn() => '·' );

// Local business schema for search engines. Pulls from Settings → Red Rock when the plugin is active.
add_action( 'wp_head', function () {
	if ( ! function_exists( 'redrock_info' ) || ! is_front_page() ) {
		return;
	}
	$schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'MedicalClinic',
		'name'       => get_bloginfo( 'name' ),
		'url'        => home_url( '/' ),
		'telephone'  => redrock_info( 'phone' ),
		'faxNumber'  => redrock_info( 'fax' ),
		'email'      => redrock_info( 'email' ),
		'address'    => array( '@type' => 'PostalAddress', 'streetAddress' => redrock_info( 'address_line1' ), 'addressLocality' => 'Las Vegas', 'addressRegion' => 'NV', 'postalCode' => '89117', 'addressCountry' => 'US' ),
		'medicalSpecialty' => array( 'Ophthalmologic', 'PlasticSurgery', 'Podiatric', 'Otolaryngologic', 'Gynecologic', 'Orthopedic' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
} );
