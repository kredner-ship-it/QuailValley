<?php
/**
 * Theme Customizer — makes every text block on the front page editable
 * from Appearance > Customize, with no plugin required.
 *
 * @package QuailValley_Charities
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize a short line of text.
 */
function qvc_sanitize_text( $value ) {
	return sanitize_text_field( $value );
}

/**
 * Sanitize a multi-line block that may include a handful of inline tags
 * (e.g. <strong> in the mission paragraph).
 */
function qvc_sanitize_richtext( $value ) {
	return wp_kses_post( $value );
}

/**
 * Sanitize a URL, allowing tel:, mailto:, #anchors, and normal links.
 */
function qvc_sanitize_link( $value ) {
	$value = trim( $value );

	if ( '' === $value ) {
		return '';
	}

	if ( 0 === strpos( $value, '#' ) ) {
		return sanitize_text_field( $value );
	}

	if ( 0 === strpos( $value, 'tel:' ) || 0 === strpos( $value, 'mailto:' ) ) {
		return sanitize_text_field( $value );
	}

	return esc_url_raw( $value );
}

/**
 * Register all Customizer sections, settings, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function qvc_customize_register( $wp_customize ) {

	// ---------------------------------------------------------------
	// Sections
	// ---------------------------------------------------------------
	$sections = array(
		'qvc_hero'       => 'Hero Section',
		'qvc_mission'    => 'Mission / History Section',
		'qvc_impact'     => 'Impact Stats Section',
		'qvc_grants'     => 'Donate & Grants Section',
		'qvc_events'     => 'Events Section',
		'qvc_leadership' => 'Leadership Section',
		'qvc_newsletter' => 'Newsletter Section',
		'qvc_footer'     => 'Footer & Contact Info',
	);

	$priority = 30;
	foreach ( $sections as $id => $label ) {
		$wp_customize->add_section(
			$id,
			array(
				'title'    => $label,
				'priority' => $priority,
			)
		);
		$priority += 10;
	}

	// ---------------------------------------------------------------
	// Field definitions: key => [ section, label, control type ]
	// control types: text | textarea | richtext | link | image
	// ---------------------------------------------------------------
	$fields = array(
		// Hero.
		'qvc_hero_eyebrow'        => array( 'qvc_hero', 'Eyebrow label', 'text' ),
		'qvc_hero_heading'        => array( 'qvc_hero', 'Headline', 'text' ),
		'qvc_hero_lead'           => array( 'qvc_hero', 'Intro paragraph', 'textarea' ),
		'qvc_cta_label'           => array( 'qvc_hero', 'Primary button label (used in header + hero)', 'text' ),
		'qvc_cta_link'            => array( 'qvc_hero', 'Primary button link', 'link' ),
		'qvc_secondary_cta_label' => array( 'qvc_hero', 'Secondary button label', 'text' ),
		'qvc_secondary_cta_link'  => array( 'qvc_hero', 'Secondary button link', 'link' ),

		// Mission.
		'qvc_mission_eyebrow'     => array( 'qvc_mission', 'Eyebrow label', 'text' ),
		'qvc_mission_heading'     => array( 'qvc_mission', 'Heading', 'text' ),
		'qvc_mission_body'        => array( 'qvc_mission', 'Body copy (blank line = new paragraph; <strong> allowed)', 'richtext' ),
		'qvc_mission_image'       => array( 'qvc_mission', 'Photo (leave empty to keep the placeholder)', 'image' ),

		// Impact.
		'qvc_impact_eyebrow'      => array( 'qvc_impact', 'Eyebrow label', 'text' ),
		'qvc_impact_heading'      => array( 'qvc_impact', 'Heading', 'text' ),
		'qvc_stat1_number'        => array( 'qvc_impact', 'Stat 1 — number', 'text' ),
		'qvc_stat1_label'         => array( 'qvc_impact', 'Stat 1 — label', 'text' ),
		'qvc_stat2_number'        => array( 'qvc_impact', 'Stat 2 — number', 'text' ),
		'qvc_stat2_label'         => array( 'qvc_impact', 'Stat 2 — label', 'text' ),
		'qvc_stat3_number'        => array( 'qvc_impact', 'Stat 3 — number', 'text' ),
		'qvc_stat3_label'         => array( 'qvc_impact', 'Stat 3 — label', 'text' ),

		// Grants.
		'qvc_grants_eyebrow'      => array( 'qvc_grants', 'Eyebrow label', 'text' ),
		'qvc_grants_heading'      => array( 'qvc_grants', 'Heading', 'text' ),
		'qvc_donate_heading'      => array( 'qvc_grants', 'Donate card — heading', 'text' ),
		'qvc_donate_text'         => array( 'qvc_grants', 'Donate card — text', 'textarea' ),
		'qvc_donate_button_label' => array( 'qvc_grants', 'Donate card — button label', 'text' ),
		'qvc_donate_button_link'  => array( 'qvc_grants', 'Donate card — button link', 'link' ),
		'qvc_grant_heading'       => array( 'qvc_grants', 'Partnerships card — heading', 'text' ),
		'qvc_grant_text'          => array( 'qvc_grants', 'Partnerships card — text', 'textarea' ),
		'qvc_grant_button_label'  => array( 'qvc_grants', 'Partnerships card — button label', 'text' ),
		'qvc_grant_button_link'   => array( 'qvc_grants', 'Partnerships card — button link', 'link' ),

		// Events.
		'qvc_events_eyebrow'      => array( 'qvc_events', 'Eyebrow label', 'text' ),
		'qvc_events_heading'      => array( 'qvc_events', 'Heading', 'text' ),
		'qvc_events_note'         => array( 'qvc_events', 'Note below heading', 'textarea' ),
		'qvc_events_list'         => array( 'qvc_events', 'Event names (one per line)', 'textarea' ),

		// Leadership.
		'qvc_leadership_eyebrow'  => array( 'qvc_leadership', 'Eyebrow label', 'text' ),
		'qvc_leadership_heading'  => array( 'qvc_leadership', 'Heading', 'text' ),
		'qvc_leader_initials'     => array( 'qvc_leadership', 'Avatar initials', 'text' ),
		'qvc_leader_name'         => array( 'qvc_leadership', 'Name', 'text' ),
		'qvc_leader_role'         => array( 'qvc_leadership', 'Role / title', 'text' ),
		'qvc_leader_bio'          => array( 'qvc_leadership', 'Short bio line', 'textarea' ),
		'qvc_leader_phone_label'  => array( 'qvc_leadership', 'Phone — display text', 'text' ),
		'qvc_leader_phone_link'   => array( 'qvc_leadership', 'Phone — link (tel:...)', 'link' ),
		'qvc_committee_note'      => array( 'qvc_leadership', 'Committee governance note', 'textarea' ),

		// Newsletter.
		'qvc_newsletter_eyebrow'  => array( 'qvc_newsletter', 'Eyebrow label', 'text' ),
		'qvc_newsletter_heading'  => array( 'qvc_newsletter', 'Heading', 'text' ),
		'qvc_newsletter_lead'     => array( 'qvc_newsletter', 'Supporting text', 'textarea' ),

		// Footer.
		'qvc_footer_tagline'      => array( 'qvc_footer', 'Footer tagline (under logo)', 'textarea' ),
		'qvc_contact_location'    => array( 'qvc_footer', 'City / state', 'text' ),
		'qvc_contact_phone_label' => array( 'qvc_footer', 'Phone — display text', 'text' ),
		'qvc_contact_phone_link'  => array( 'qvc_footer', 'Phone — link (tel:...)', 'link' ),
		'qvc_contact_person'      => array( 'qvc_footer', 'Contact person line', 'text' ),
		'qvc_facebook_url'        => array( 'qvc_footer', 'Facebook page URL (leave empty to show a placeholder)', 'link' ),
		'qvc_footer_copyright'    => array( 'qvc_footer', 'Copyright line (year is added automatically)', 'text' ),
		'qvc_footer_fine'         => array( 'qvc_footer', 'Footer fine print', 'text' ),
		'qvc_meta_description'    => array( 'qvc_footer', 'SEO meta description', 'textarea' ),
	);

	foreach ( $fields as $key => $field ) {
		list( $section, $label, $type ) = $field;

		$sanitize = 'qvc_sanitize_text';
		if ( 'textarea' === $type ) {
			$sanitize = 'sanitize_textarea_field';
		} elseif ( 'richtext' === $type ) {
			$sanitize = 'qvc_sanitize_richtext';
		} elseif ( 'link' === $type ) {
			$sanitize = 'qvc_sanitize_link';
		} elseif ( 'image' === $type ) {
			$sanitize = 'esc_url_raw';
		}

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => qvc_default( $key ),
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);

		if ( 'textarea' === $type || 'richtext' === $type ) {
			$wp_customize->add_control(
				$key,
				array(
					'label'   => $label,
					'section' => $section,
					'type'    => 'textarea',
				)
			);
		} elseif ( 'image' === $type ) {
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					$key,
					array(
						'label'   => $label,
						'section' => $section,
					)
				)
			);
		} else {
			$wp_customize->add_control(
				$key,
				array(
					'label'   => $label,
					'section' => $section,
					'type'    => 'text',
				)
			);
		}
	}
}
add_action( 'customize_register', 'qvc_customize_register' );
