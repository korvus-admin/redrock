<?php
defined( 'ABSPATH' ) || exit;

/**
 * Demo content. Used by the local wp-env site and the WordPress Playground
 * blueprint. Never runs on its own; call redrock_seed_demo() explicitly.
 * Safe to re-run: it skips anything that already exists unless $force.
 */
function redrock_seed_demo( $force = false ) {
	if ( get_option( 'redrock_seeded' ) && ! $force ) {
		return 'already seeded';
	}

	// Site basics.
	update_option( 'blogname', 'Red Rock Surgery Center' );
	update_option( 'blogdescription', 'Same-day outpatient surgery in Las Vegas' );
	update_option( 'timezone_string', 'America/Los_Angeles' );
	update_option( 'redrock_info', redrock_info_defaults() );
	if ( function_exists( 'wp_get_theme' ) && 'redrock' !== get_stylesheet() && wp_get_theme( 'redrock' )->exists() ) {
		switch_theme( 'redrock' );
	}

	// A forced re-seed starts clean so demo content never duplicates.
	if ( $force ) {
		foreach ( get_posts( array( 'post_type' => array( 'rr_service', 'rr_provider', 'rr_testimonial' ), 'numberposts' => -1, 'post_status' => 'any', 'fields' => 'ids' ) ) as $old ) {
			wp_delete_post( $old, true );
		}
	}

	// Specialties.
	$specialties = array(
		'Ophthalmology', 'Hand Surgery', 'Plastic & Reconstructive Surgery', 'Spine Surgery', 'Oculoplastic Surgery',
		'Pain Management', 'Podiatry', 'Orthopedics', 'General Surgery', 'Gynecology', 'ENT', 'Dental', 'Anesthesia',
	);
	$term_ids = array();
	foreach ( $specialties as $name ) {
		$existing = get_term_by( 'name', $name, 'rr_specialty' );
		$term_ids[ $name ] = $existing ? $existing->term_id : wp_insert_term( $name, 'rr_specialty' )['term_id'];
	}

	// Services (order = menu_order).
	$services = array(
		array( 'Ophthalmology', '👁️', 'Cataract removal, advanced lens implants, glaucoma and cornea surgery, eyelid lifts and pterygium removal.', array( 'Cataract surgery', 'Eyelid surgery', 'Glaucoma surgery (including minimally invasive)', 'Cornea surgery', 'Pterygium removal with grafts', 'Ocular cancer (CIN)', 'Advanced technology lens implants: Tecnis Multifocal, Tecnis Symfony, Restor, PanOptix' ) ),
		array( 'Hand Surgery', '🖐️', 'Carpal tunnel release, trigger finger, fractures, nerve and tendon repair, and joint replacement.', array( 'Carpal tunnel release', 'Trigger finger', 'Contracture and ulnar nerve release', 'Hand trauma and fractures', 'Nerve and tendon repair', 'Joint replacement', 'Wrist and elbow surgery', 'Cysts, abscesses and infections' ) ),
		array( 'Pain Management', '🩺', 'Facet and trigger point injections, nerve ablations, spinal cord stimulators and SI joint procedures.', array( 'Facet injections (lidocaine, steroids)', 'Trigger point injections', 'Nerve ablations (rhizotomy)', 'Spinal cord stimulators', 'SI joint procedures' ) ),
		array( 'Plastic & Reconstructive Surgery', '✨', 'Breast augmentation and reduction, liposuction, facelift, eyelid lift and tummy tuck.', array( 'Breast augmentation and reduction', 'Liposuction', 'Facelift', 'Eyelid lift', 'Tummy tuck' ) ),
		array( 'General Surgery', '🏥', 'Hernia repair, cholecystectomy, cysts, lumps and tumors, and wound care for adults and children.', array( 'Hernia repair', 'Cholecystectomy', 'Cysts, lumps and bumps', 'Tumor removal', 'Wound care' ) ),
		array( 'Spine Surgery', '🦴', 'Minimally invasive spine and neurosurgical procedures performed on a same-day basis.', array( 'Minimally invasive spine procedures', 'Neurosurgery (spine)' ) ),
		array( 'Podiatry', '🦶', 'Bunions, hammer toe, foot trauma, lesions, plantar warts and wound care.', array( 'Bunion', 'Hammer toe', 'Foot pain and trauma', 'Lesions and plantar warts', 'Frame removals', 'Wound care' ) ),
		array( 'Orthopedics', '💪', 'Arthroscopy, rotator cuff, tendon and muscle repair, and small orthopedic cases.', array( 'Arthroscopy', 'Rotator cuff repair', 'Tendon and muscle repair', 'Trauma' ) ),
		array( 'ENT', '👂', 'Sinus, tonsils, polyps and head-and-neck procedures.', array( 'Sinus surgery', 'Tonsils', 'Polyps', 'Head and neck plastics' ) ),
		array( 'Gynecology', '🌸', 'Hysterectomy and fibroid treatment in a private, comfortable setting.', array( 'Hysterectomy', 'Fibroids' ) ),
		array( 'Dental Surgery', '🦷', 'Pediatric and adult dental surgery and restoration with sedation.', array( 'Dental surgery with sedation', 'Dental restoration' ) ),
		array( 'Rapid Opioid Detox', '🌿', 'Naloxone infusion and private addiction care under anesthesia.', array( 'Naloxone infusion', 'Private addiction care' ) ),
	);
	$i = 0;
	foreach ( $services as $s ) {
		list( $title, $icon, $blurb, $procs ) = $s;
		if ( ! $force && get_page_by_path( sanitize_title( $title ), OBJECT, 'rr_service' ) ) { $i++; continue; }
		$list = '<!-- wp:list --><ul class="wp-block-list">' . implode( '', array_map( fn( $p ) => '<!-- wp:list-item --><li>' . esc_html( $p ) . '</li><!-- /wp:list-item -->', $procs ) ) . '</ul><!-- /wp:list -->';
		$content = '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">' . esc_html( $blurb ) . '</p><!-- /wp:paragraph -->'
			. '<!-- wp:heading --><h2 class="wp-block-heading">Procedures we perform</h2><!-- /wp:heading -->' . $list
			. '<!-- wp:heading --><h2 class="wp-block-heading">What to expect</h2><!-- /wp:heading -->'
			. '<!-- wp:paragraph --><p>Every procedure at Red Rock is performed on a same-day, outpatient basis in one of our three AAAHC-accredited operating suites. Your surgeon will walk you through preparation, anesthesia options and recovery before your visit.</p><!-- /wp:paragraph -->';
		$id = wp_insert_post( array(
			'post_type' => 'rr_service', 'post_status' => 'publish', 'post_title' => $title, 'post_content' => $content,
			'post_excerpt' => $blurb, 'menu_order' => $i++,
			'meta_input' => array( 'rr_blurb' => $blurb, 'rr_icon' => $icon ),
		) );
		$term = $term_ids[ $title ] ?? ( 'Dental Surgery' === $title ? $term_ids['Dental'] : ( 'Rapid Opioid Detox' === $title ? $term_ids['Pain Management'] : null ) );
		if ( $term ) { wp_set_object_terms( $id, (int) $term, 'rr_specialty' ); }
	}

	// Providers (names from the current site; credentials are placeholders to fill in).
	$providers = array(
		'Ophthalmology' => array( 'Dr. Malitz' ),
		'Hand Surgery' => array( 'Dr. Amesur' ),
		'Plastic & Reconstructive Surgery' => array( 'Dr. Khorsandi', 'Dr. Parker' ),
		'Spine Surgery' => array( 'Dr. Debiparshad', 'Dr. McNulty', 'Dr. Elkanich' ),
		'Oculoplastic Surgery' => array( 'Dr. Liebowitz' ),
		'Pain Management' => array( 'Dr. Harawey', 'Dr. Goloshchapov', 'Dr. Su', 'Dr. Ghallager', 'Dr. Nam', 'Dr. Kozmary', 'Dr. Passimio', 'Dr. Garcia', 'Dr. Tsao', 'Dr. Tran', 'Dr. Chmiela', 'Dr. Najafi', 'Dr. Thantacheva' ),
		'Podiatry' => array( 'Dr. Brody' ),
		'Orthopedics' => array( 'Dr. Pinegar', 'Dr. Richards' ),
		'General Surgery' => array( 'Dr. Enriquez', 'Dr. Dasari' ),
		'Gynecology' => array( 'Dr. Free', 'Dr. Gomez' ),
	);
	$i = 0;
	foreach ( $providers as $specialty => $names ) {
		foreach ( $names as $name ) {
			if ( ! $force && get_page_by_path( sanitize_title( $name ), OBJECT, 'rr_provider' ) ) { $i++; continue; }
			$id = wp_insert_post( array(
				'post_type' => 'rr_provider', 'post_status' => 'publish', 'post_title' => $name, 'menu_order' => $i++,
				'post_content' => '<!-- wp:paragraph --><p>' . esc_html( $name ) . ' is a credentialed member of the Red Rock Surgery Center medical staff, specializing in ' . esc_html( strtolower( $specialty ) ) . '. A short biography, education and board certifications can be added here.</p><!-- /wp:paragraph -->',
				'meta_input' => array( 'rr_credentials' => 'MD', 'rr_role' => $specialty ),
			) );
			wp_set_object_terms( $id, (int) $term_ids[ $specialty ], 'rr_specialty' );
		}
	}

	// Testimonials (from the current site).
	$testimonials = array(
		array( 'Irene Matthews', 5, 'My experience at Red Rock Surgery Center was great! Dr. Blanco and her team were awesome and very attentive. You all were very friendly and took the time to make sure I was comfortable and answered any questions I had. I had little to no pain after surgery and was handled with care and kindness throughout the whole process. I highly recommend Red Rock Surgery Center.' ),
		array( 'Equality Tinn', 5, 'A big shout out and kudos to the wonderful Dr. Malitz and his fantastic crew. I came to get an irritating bump removed from my lower eyelid. Dr. Malitz and the nurses made me feel comfortable and helped ease my anxiety. The facility is clean and professionally set up. Thank you again for being my superheroes of the day.' ),
		array( 'Kay', 5, 'During my third appointment here, I was struck by the kindness and compassion of every staff member I met. The positive energy in the office, created by the staff’s smiles, laughter and caring attitude, made me feel more comfortable and at ease. Diana, Jazmin and Agnes went above and beyond to ensure I received the best possible care.' ),
	);
	$i = 0;
	foreach ( $testimonials as $t ) {
		list( $author, $rating, $quote ) = $t;
		if ( ! $force && get_page_by_path( sanitize_title( $author ), OBJECT, 'rr_testimonial' ) ) { $i++; continue; }
		wp_insert_post( array(
			'post_type' => 'rr_testimonial', 'post_status' => 'publish', 'post_title' => $author, 'menu_order' => $i++,
			'post_content' => '<!-- wp:paragraph --><p>' . esc_html( $quote ) . '</p><!-- /wp:paragraph -->',
			'meta_input' => array( 'rr_author' => $author, 'rr_rating' => $rating, 'rr_source' => 'Google' ),
		) );
	}

	// Pages.
	$pages = array(
		'home'                => array( 'Home', redrock_seed_pattern_content( array( 'redrock/hero', 'redrock/trust-bar', 'redrock/services-grid', 'redrock/journey', 'redrock/providers-preview', 'redrock/testimonials', 'redrock/cta' ) ) ),
		'about'               => array( 'About Red Rock', redrock_seed_about() ),
		'philosophy-of-care'  => array( 'Philosophy of Care', redrock_seed_philosophy() ),
		'our-facility'        => array( 'Our Facility', redrock_seed_facility() ),
		'your-surgical-journey' => array( 'Your Surgical Journey', redrock_seed_journey() ),
		'request-appointment' => array( 'Request an Appointment', redrock_seed_form_page( 'appointment' ) ),
		'refer-a-patient'     => array( 'Refer a Patient', redrock_seed_form_page( 'referral' ) ),
		'contact'             => array( 'Contact', redrock_seed_pattern_content( array( 'redrock/contact' ) ) ),
		'careers'             => array( 'Careers', '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">We are always looking for caring nurses, surgical technicians and support staff who want to make a difference. Send your résumé to the email below and we will be in touch.</p><!-- /wp:paragraph -->' . redrock_seed_pattern_content( array( 'redrock/contact' ) ) ),
	);
	$page_ids = array();
	foreach ( $pages as $slug => $p ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing && ! $force ) { $page_ids[ $slug ] = $existing->ID; continue; }
		$args = array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $p[0], 'post_name' => $slug, 'post_content' => $p[1] );
		if ( $existing ) { $args['ID'] = $existing->ID; }
		$page_ids[ $slug ] = wp_insert_post( $args );
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_ids['home'] );
	if ( $sample = get_page_by_path( 'sample-page', OBJECT, 'page' ) ) { wp_trash_post( $sample->ID ); }
	if ( $hello = get_page_by_path( 'hello-world', OBJECT, 'post' ) ) { wp_trash_post( $hello->ID ); }

	// Navigation (the header Navigation block picks up the newest wp_navigation post).
	$nav_content = redrock_seed_nav( $page_ids );
	$nav = get_page_by_path( 'primary', OBJECT, 'wp_navigation' );
	if ( $nav && $force ) { wp_update_post( array( 'ID' => $nav->ID, 'post_content' => $nav_content ) ); }
	elseif ( ! $nav ) { wp_insert_post( array( 'post_type' => 'wp_navigation', 'post_status' => 'publish', 'post_title' => 'Primary', 'post_name' => 'primary', 'post_content' => $nav_content ) ); }

	update_option( 'permalink_structure', '/%postname%/' );
	flush_rewrite_rules();
	update_option( 'redrock_seeded', time() );
	return 'seeded';
}

/** Concatenate registered pattern markup so a page starts with editable, locked sections. */
function redrock_seed_pattern_content( array $slugs ) {
	$registry = WP_Block_Patterns_Registry::get_instance();
	$out      = '';
	foreach ( $slugs as $slug ) {
		$p = $registry->get_registered( $slug );
		if ( $p ) { $out .= $p['content'] . "\n\n"; }
	}
	return $out;
}

function redrock_seed_nav( $ids ) {
	$link = fn( $label, $slug, $kind = 'page' ) => sprintf( '<!-- wp:navigation-link {"label":"%s","type":"%s","id":%d,"url":"%s","kind":"post-type"} /-->', esc_attr( $label ), $kind, $ids[ $slug ] ?? 0, esc_url( home_url( '/' . $slug . '/' ) ) );
	return '<!-- wp:navigation-submenu {"label":"About","type":"page","id":' . $ids['about'] . ',"url":"' . esc_url( home_url( '/about/' ) ) . '","kind":"post-type"} -->'
		. $link( 'About Red Rock', 'about' ) . $link( 'Philosophy of Care', 'philosophy-of-care' ) . $link( 'Our Facility', 'our-facility' )
		. '<!-- wp:navigation-link {"label":"Our Providers","url":"' . esc_url( home_url( '/providers/' ) ) . '","kind":"custom"} /-->'
		. $link( 'Careers', 'careers' )
		. '<!-- /wp:navigation-submenu -->'
		. '<!-- wp:navigation-link {"label":"Services","url":"' . esc_url( home_url( '/services/' ) ) . '","kind":"custom"} /-->'
		. $link( 'Your Surgical Journey', 'your-surgical-journey' )
		. $link( 'Refer a Patient', 'refer-a-patient' )
		. $link( 'Contact', 'contact' );
}

function redrock_seed_about() {
	return '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">Red Rock Surgery Center was established over 10 years ago with the goal of providing outstanding surgical care for same-day procedures, focusing on patient safety and comfort. As part of the Malitz family of healthcare facilities, we serve the local Las Vegas community and the world through our medical tourism program.</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph --><p>Red Rock Surgery Center is a high-tech, high-touch, multi-specialty ambulatory surgery center, featuring three state-of-the-art operating suites and one minor laser procedure room. We are equipped to perform several hundred types of procedures, with approximately 1,000 procedures completed each year.</p><!-- /wp:paragraph -->'
		. redrock_seed_pattern_content( array( 'redrock/trust-bar', 'redrock/services-grid', 'redrock/cta' ) );
}

function redrock_seed_philosophy() {
	$li = fn( $items ) => '<!-- wp:list --><ul class="wp-block-list">' . implode( '', array_map( fn( $x ) => '<!-- wp:list-item --><li>' . $x . '</li><!-- /wp:list-item -->', $items ) ) . '</ul><!-- /wp:list -->';
	return '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">At Red Rock Surgery Center, we are committed to improving the quality of life for our patients, staff and surgeons.</p><!-- /wp:paragraph -->'
		. '<!-- wp:heading --><h2 class="wp-block-heading">Quality of life, three ways</h2><!-- /wp:heading -->'
		. $li( array(
			'<strong>For our patients:</strong> cutting-edge treatments in a comfortable, private environment, with access to minimally invasive technology and patient-focused care.',
			'<strong>For our staff:</strong> an environment where staff are empowered to make a difference and take pride in driving continuous improvement.',
			'<strong>For our surgeons:</strong> an efficient surgery center, stellar service and advanced technology, enabling enhanced outcomes for their patients.',
		) )
		. '<!-- wp:heading --><h2 class="wp-block-heading">Our values</h2><!-- /wp:heading -->'
		. $li( array( 'We believe in “Quality of Life” for our customers, patients, staff and surgeons.', 'We believe in exceeding expectations.', 'We are passionate about continuous improvement and being the best in our industry and in Las Vegas.', 'We believe in hard work and a healthy work-life balance.' ) )
		. '<!-- wp:heading --><h2 class="wp-block-heading">Our goals</h2><!-- /wp:heading -->'
		. $li( array( '<strong>Technology:</strong> utilize leading technology for surgery and center operations.', '<strong>Communication:</strong> enhance listening and communication to achieve our values.', '<strong>Reputation:</strong> continually pursue ways to make patients, staff and surgeons say, “I want to have my surgery at Red Rock.”' ) )
		. redrock_seed_pattern_content( array( 'redrock/cta' ) );
}

function redrock_seed_facility() {
	return '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">Red Rock Surgery Center is proud to be accredited by AAAHC (Accreditation Association for Ambulatory Health Care), ensuring that we meet the highest national standards for quality and safety.</p><!-- /wp:paragraph -->'
		. '<!-- wp:paragraph --><p>We adhere to the strictest federal and state regulatory requirements. Our facility is equipped with state-of-the-art technology and staffed by highly qualified and experienced professionals, including nurses, surgical technicians and support personnel. Your safety and comfort are our top priority.</p><!-- /wp:paragraph -->'
		. redrock_seed_pattern_content( array( 'redrock/trust-bar' ) )
		. '<!-- wp:heading --><h2 class="wp-block-heading">Virtual tour</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A 360° walkthrough of our operating suites and recovery areas can be embedded here.</p><!-- /wp:paragraph -->'
		. redrock_seed_pattern_content( array( 'redrock/contact' ) );
}

function redrock_seed_journey() {
	return '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">Knowing what to expect makes surgery day easier. Please read both sections carefully and call us with any questions.</p><!-- /wp:paragraph -->'
		. '<!-- wp:heading {"anchor":"before-surgery"} --><h2 class="wp-block-heading" id="before-surgery">Before surgery</h2><!-- /wp:heading -->'
		. '<!-- wp:list --><ul class="wp-block-list"><!-- wp:list-item --><li>Do not eat or drink anything after midnight the night before, unless your surgeon tells you otherwise.</li><!-- /wp:list-item --><!-- wp:list-item --><li>Arrange for a responsible adult to drive you home and stay with you for 24 hours.</li><!-- /wp:list-item --><!-- wp:list-item --><li>Bring your photo ID, insurance card and a list of current medications.</li><!-- /wp:list-item --><!-- wp:list-item --><li>Wear loose, comfortable clothing and leave jewelry and valuables at home.</li><!-- /wp:list-item --></ul><!-- /wp:list -->'
		. '<!-- wp:heading {"anchor":"after-surgery"} --><h2 class="wp-block-heading" id="after-surgery">After surgery</h2><!-- /wp:heading -->'
		. '<!-- wp:list --><ul class="wp-block-list"><!-- wp:list-item --><li>Rest for the remainder of the day. Do not drive, operate machinery or make important decisions for 24 hours.</li><!-- /wp:list-item --><!-- wp:list-item --><li>Follow the written discharge instructions and take medications only as prescribed.</li><!-- /wp:list-item --><!-- wp:list-item --><li>Call us right away with fever, uncontrolled pain, bleeding or any concern.</li><!-- /wp:list-item --></ul><!-- /wp:list -->'
		. redrock_seed_pattern_content( array( 'redrock/cta' ) );
}

function redrock_seed_form_page( $kind ) {
	$who = 'appointment' === $kind ? 'patients' : 'referring providers';
	return '<!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">This page is for ' . $who . '. On the live site the form below is served by a HIPAA-covered form provider (or the existing Phreesia intake) so that no patient information is stored in WordPress.</p><!-- /wp:paragraph -->'
		. '<!-- wp:group {"className":"rr-form-placeholder","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"width":"2px","style":"dashed","radius":"12px"}},"borderColor":"stone","layout":{"type":"constrained"}} --><div class="wp-block-group rr-form-placeholder has-border-color has-stone-border-color" style="border-style:dashed;border-width:2px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">'
		. '<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Secure form embed goes here.</strong><br>Existing Gravity Forms can be placed with the Gravity Forms block if a BAA is in place with the host.</p><!-- /wp:paragraph -->'
		. '</div><!-- /wp:group -->'
		. redrock_seed_pattern_content( array( 'redrock/contact' ) );
}

// `wp redrock seed [--force]`
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'redrock seed', function ( $args, $assoc ) {
		WP_CLI::success( redrock_seed_demo( isset( $assoc['force'] ) ) );
	} );
}
