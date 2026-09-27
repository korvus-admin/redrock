<?php
defined( 'ABSPATH' ) || exit;

/**
 * Settings → Red Rock. One place for phone, address, hours and the external
 * links (Phreesia payments, appointment/referral forms). Every value is
 * available to the theme through the `redrock/info` block binding.
 */
function redrock_info_fields() {
	return array(
		'phone'           => array( 'label' => 'Phone', 'type' => 'text' ),
		'fax'             => array( 'label' => 'Fax', 'type' => 'text' ),
		'email'           => array( 'label' => 'Email', 'type' => 'email' ),
		'address_line1'   => array( 'label' => 'Address line 1', 'type' => 'text' ),
		'address_line2'   => array( 'label' => 'Address line 2 (city, state, zip)', 'type' => 'text' ),
		'hours_weekday'   => array( 'label' => 'Hours (Mon–Fri)', 'type' => 'text' ),
		'hours_weekend'   => array( 'label' => 'Hours (Sat–Sun)', 'type' => 'text' ),
		'maps_url'        => array( 'label' => 'Google Maps link', 'type' => 'url' ),
		'payment_url'     => array( 'label' => 'Online payment link (Phreesia)', 'type' => 'url' ),
		'appointment_url' => array( 'label' => 'Request appointment link', 'type' => 'url' ),
		'referral_url'    => array( 'label' => 'Patient referral link', 'type' => 'url' ),
		'review_url'      => array( 'label' => 'Write-a-review link', 'type' => 'url' ),
		'accreditation'   => array( 'label' => 'Accreditation line', 'type' => 'text' ),
	);
}

function redrock_info_defaults() {
	return array(
		'phone'           => '702-227-5848',
		'fax'             => '702-357-9475',
		'email'           => 'support@redrocksurgerycenter.com',
		'address_line1'   => '7135 W Sahara Ave #101',
		'address_line2'   => 'Las Vegas, NV 89117',
		'hours_weekday'   => 'Monday – Friday: 6am to 5pm',
		'hours_weekend'   => 'Saturday – Sunday: by arrangement',
		'maps_url'        => 'https://maps.google.com/?q=7135+W+Sahara+Ave+%23101+Las+Vegas+NV+89117',
		'payment_url'     => 'https://z5-ppw.phreesia.net/z5/patient/Payment.aspx/Start',
		'appointment_url' => '/request-appointment/',
		'referral_url'    => '/refer-a-patient/',
		'review_url'      => 'https://www.google.com/search?q=Red+Rock+Surgery+Center+Las+Vegas',
		'accreditation'   => 'AAAHC-accredited ambulatory surgery center',
	);
}

/** Read one value, with a couple of derived keys used by the theme. */
function redrock_info( $key ) {
	$info = wp_parse_args( (array) get_option( 'redrock_info', array() ), redrock_info_defaults() );
	switch ( $key ) {
		case 'phone_tel':
			return 'tel:+1' . preg_replace( '/\D/', '', $info['phone'] );
		case 'email_mailto':
			return 'mailto:' . $info['email'];
		case 'address':
			return trim( $info['address_line1'] . ', ' . $info['address_line2'], ', ' );
		case 'year':
			return (string) gmdate( 'Y' );
		default:
			return $info[ $key ] ?? '';
	}
}

add_action( 'admin_menu', function () {
	add_options_page( 'Red Rock Site Details', 'Red Rock', 'manage_options', 'redrock-info', 'redrock_render_settings_page' );
} );

add_action( 'admin_init', function () {
	register_setting( 'redrock_info_group', 'redrock_info', array(
		'type'              => 'array',
		'sanitize_callback' => function ( $input ) {
			$clean = array();
			foreach ( redrock_info_fields() as $key => $field ) {
				$val = $input[ $key ] ?? '';
				$clean[ $key ] = 'url' === $field['type'] ? esc_url_raw( $val ) : sanitize_text_field( $val );
			}
			return $clean;
		},
		'default'           => redrock_info_defaults(),
	) );
} );

function redrock_render_settings_page() {
	$info = wp_parse_args( (array) get_option( 'redrock_info', array() ), redrock_info_defaults() );
	?>
	<div class="wrap">
		<h1>Red Rock Site Details</h1>
		<p>These values appear automatically in the header, footer and contact sections. Change them here once and every page updates.</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'redrock_info_group' ); ?>
			<table class="form-table" role="presentation">
				<?php foreach ( redrock_info_fields() as $key => $field ) : ?>
					<tr>
						<th scope="row"><label for="rr_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
						<td><input class="regular-text" type="<?php echo esc_attr( $field['type'] ); ?>" id="rr_<?php echo esc_attr( $key ); ?>" name="redrock_info[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $info[ $key ] ); ?>"></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
