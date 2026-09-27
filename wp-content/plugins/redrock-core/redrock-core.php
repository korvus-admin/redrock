<?php
/**
 * Plugin Name:       Red Rock Core
 * Plugin URI:        https://redrocksurgerycenter.com
 * Description:       Services, Providers, Testimonials and site details for Red Rock Surgery Center. Works with any theme; designed for the Red Rock block theme.
 * Version:           0.1.0
 * Requires at least: 6.5
 * Requires PHP:      8.0
 * Author:            Korvus
 * License:           GPL-2.0-or-later
 * Text Domain:       redrock
 */

defined( 'ABSPATH' ) || exit;

define( 'REDROCK_CORE_VERSION', '0.1.0' );
define( 'REDROCK_CORE_DIR', plugin_dir_path( __FILE__ ) );

require_once REDROCK_CORE_DIR . 'includes/post-types.php';
require_once REDROCK_CORE_DIR . 'includes/meta.php';
require_once REDROCK_CORE_DIR . 'includes/settings.php';
require_once REDROCK_CORE_DIR . 'includes/bindings.php';
require_once REDROCK_CORE_DIR . 'includes/seed.php';

register_activation_hook( __FILE__, function () {
	redrock_register_post_types();
	flush_rewrite_rules();
} );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
