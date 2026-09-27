<?php
defined( 'ABSPATH' ) || exit;

/**
 * Structured fields. Registered for REST (so block bindings work) and edited
 * through simple meta boxes that non-technical editors understand.
 */
function redrock_meta_fields() {
	return array(
		'rr_service'     => array(
			'rr_blurb' => array( 'label' => __( 'Short description (shown on cards)', 'redrock' ), 'type' => 'textarea' ),
			'rr_icon'  => array( 'label' => __( 'Icon (emoji or short text)', 'redrock' ), 'type' => 'text' ),
		),
		'rr_provider'    => array(
			'rr_credentials' => array( 'label' => __( 'Credentials (e.g. MD, FACS)', 'redrock' ), 'type' => 'text' ),
			'rr_role'        => array( 'label' => __( 'Role / title', 'redrock' ), 'type' => 'text' ),
			'rr_practice_url'=> array( 'label' => __( 'Practice website (optional)', 'redrock' ), 'type' => 'url' ),
		),
		'rr_testimonial' => array(
			'rr_author' => array( 'label' => __( 'Patient name (as it should appear)', 'redrock' ), 'type' => 'text' ),
			'rr_rating' => array( 'label' => __( 'Star rating (1–5)', 'redrock' ), 'type' => 'number' ),
			'rr_source' => array( 'label' => __( 'Source (e.g. Google)', 'redrock' ), 'type' => 'text' ),
		),
	);
}

add_action( 'init', function () {
	foreach ( redrock_meta_fields() as $post_type => $fields ) {
		foreach ( $fields as $key => $field ) {
			register_post_meta( $post_type, $key, array(
				'type'              => 'number' === $field['type'] ? 'integer' : 'string',
				'single'            => true,
				'default'           => 'number' === $field['type'] ? 5 : '',
				'show_in_rest'      => true,
				'sanitize_callback' => 'number' === $field['type'] ? 'absint' : ( 'url' === $field['type'] ? 'esc_url_raw' : 'sanitize_textarea_field' ),
				'auth_callback'     => function () { return current_user_can( 'edit_posts' ); },
			) );
		}
	}
} );

add_action( 'add_meta_boxes', function () {
	foreach ( redrock_meta_fields() as $post_type => $fields ) {
		add_meta_box( 'redrock_details', __( 'Details', 'redrock' ), 'redrock_render_meta_box', $post_type, 'side', 'high' );
	}
} );

function redrock_render_meta_box( $post ) {
	$fields = redrock_meta_fields()[ $post->post_type ] ?? array();
	wp_nonce_field( 'redrock_meta', 'redrock_meta_nonce' );
	foreach ( $fields as $key => $field ) {
		$value = get_post_meta( $post->ID, $key, true );
		echo '<p><label for="' . esc_attr( $key ) . '"><strong>' . esc_html( $field['label'] ) . '</strong></label><br>';
		if ( 'textarea' === $field['type'] ) {
			echo '<textarea class="widefat" rows="3" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '">' . esc_textarea( $value ) . '</textarea>';
		} else {
			$extra = 'number' === $field['type'] ? ' min="1" max="5"' : '';
			echo '<input class="widefat" type="' . esc_attr( $field['type'] ) . '"' . $extra . ' id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
		}
		echo '</p>';
	}
}

add_action( 'save_post', function ( $post_id, $post ) {
	if ( ! isset( $_POST['redrock_meta_nonce'] ) || ! wp_verify_nonce( $_POST['redrock_meta_nonce'], 'redrock_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = redrock_meta_fields()[ $post->post_type ] ?? array();
	foreach ( $fields as $key => $field ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			continue;
		}
		$raw = wp_unslash( $_POST[ $key ] );
		$val = 'number' === $field['type'] ? max( 1, min( 5, absint( $raw ) ) ) : ( 'url' === $field['type'] ? esc_url_raw( $raw ) : sanitize_textarea_field( $raw ) );
		update_post_meta( $post_id, $key, $val );
	}
}, 10, 2 );
