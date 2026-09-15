<?php
/**
 * Default content for every editable field.
 *
 * These defaults reproduce the original static design exactly. They are
 * used both as the Customizer control defaults and as the fallback passed
 * to get_theme_mod() in the templates, so the site looks identical to the
 * original design until an admin edits something in Appearance > Customize.
 *
 * @package QuailValley_Charities
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get a default value by key.
 *
 * @param string $key Setting key.
 * @return string
 */
function qvc_default( $key ) {
	static $defaults = null;

	if ( null === $defaults ) {
		$defaults = array(
			// Header / shared CTA.
			'qvc_cta_label'           => 'Donate Now',
			'qvc_cta_link'            => 'tel:+17724922069',

			// Hero.
			'qvc_hero_eyebrow'        => 'Vero Beach, FL · Since 2001',
			'qvc_hero_heading'        => 'A Lifetime of Impact for Local Children',
			'qvc_hero_lead'           => "Quail Valley Charities is a 501(c)(3) dedicated to funding nonprofit programs across Indian River County that support children, their education, and their well-being. To date, we've distributed over \$15.5 million to local causes.",
			'qvc_secondary_cta_label' => 'Program Partnerships',
			'qvc_secondary_cta_link'  => '#grants',

			// Mission / history.
			'qvc_mission_eyebrow'     => 'Our History',
			'qvc_mission_heading'     => 'Two decades of giving, focused entirely on children',
			'qvc_mission_body'        => "Quail Valley Charities is a 501(c)(3). Since its founding in 2001, we've dedicated our funding to selected nonprofit organizations and programs in Indian River County that focus solely on children and their education.\n\nIn our first year, the QVC Committee created the Charity Cup, a two-day golf tournament that raised \$120,000 — all of it donated to 12 specifically chosen programs. Every year since, the Committee has grown the number and variety of events offered, now spanning multiple weeks of charitable events each season.\n\nTo date, Quail Valley Charities has distributed over <strong>\$15.5 million</strong> to local nonprofit organizations across Indian River County supporting children, their education, and their well-being.",
			'qvc_mission_image'       => '',

			// Impact stats.
			'qvc_impact_eyebrow'      => 'Our Impact',
			'qvc_impact_heading'      => 'What your support makes possible',
			'qvc_stat1_number'        => '$15.5M+',
			'qvc_stat1_label'         => 'Distributed to Indian River County nonprofits since 2001',
			'qvc_stat2_number'        => '2001',
			'qvc_stat2_label'         => 'Founded — supporting local children ever since',
			'qvc_stat3_number'        => '100%',
			'qvc_stat3_label'         => "Of funding stays local, for children's education & well-being",

			// Donate & grants.
			'qvc_grants_eyebrow'      => 'Get Involved',
			'qvc_grants_heading'      => 'Give a gift, or put one to work',
			'qvc_donate_heading'      => 'Donate or Sponsor an Event',
			'qvc_donate_text'         => "Every gift to Quail Valley Charities funds nonprofit programs across Indian River County dedicated to children's education and well-being. If you're interested in donating or sponsoring one of our events, contact our Executive Director, Martha Redner.",
			'qvc_donate_button_label' => 'Call (772) 492-2069',
			'qvc_donate_button_link'  => 'tel:+17724922069',
			'qvc_grant_heading'       => 'Program Partnerships',
			'qvc_grant_text'          => "Each year, the QVC Committee selects nonprofit programs across Indian River County that focus on children and their education to receive funding. If you'd like your organization considered for future support, reach out to our Executive Director.",
			'qvc_grant_button_label'  => 'Call (772) 492-2069',
			'qvc_grant_button_link'   => 'tel:+17724922069',

			// Events.
			'qvc_events_eyebrow'      => '2027 Season',
			'qvc_events_heading'      => 'Upcoming events',
			'qvc_events_note'         => 'Dates TBD for the 2027 season — follow our Facebook page for announcements and registration.',
			'qvc_events_list'         => "Junior Golf Tournament\nGolf Tournament\nTennis Tournament\nMah Jongg Game\nDinner Under the Stars\nTower Shoot at Blackwater Creek Ranch\n0–99 & Open Duplicate Bridge Games\n0–750 Duplicate Bridge Game\n1 Mile & 5K Walk/Run with Kids' Fun Zone\nSunday Brunch & Cheers!",

			// Leadership.
			'qvc_leadership_eyebrow'  => 'Leadership',
			'qvc_leadership_heading'  => 'Guided by our committee & staff',
			'qvc_leader_initials'     => 'MR',
			'qvc_leader_name'         => 'Martha Redner',
			'qvc_leader_role'         => 'Executive Director',
			'qvc_leader_bio'          => 'For donations, event sponsorships, or program partnership inquiries, contact Martha directly.',
			'qvc_leader_phone_label'  => '(772) 492-2069',
			'qvc_leader_phone_link'   => 'tel:+17724922069',
			'qvc_committee_note'      => "Quail Valley Charities is guided each year by the QVC Committee — member volunteers who select the nonprofit programs to receive funding — together with Executive Director Martha Redner, who oversees the organization's day-to-day giving and events.",

			// Newsletter.
			'qvc_newsletter_eyebrow'  => 'Stay Connected',
			'qvc_newsletter_heading'  => 'Get updates that make a difference',
			'qvc_newsletter_lead'     => "News on grants, events, and the families you're helping — a few times a year, no spam.",

			// Footer / contact.
			'qvc_footer_tagline'      => 'A 501(c)(3) nonprofit affiliated with Quail Valley Golf Club, Vero Beach, FL.',
			'qvc_contact_location'    => 'Vero Beach, FL',
			'qvc_contact_phone_label' => '(772) 492-2069',
			'qvc_contact_phone_link'  => 'tel:+17724922069',
			'qvc_contact_person'      => 'Martha Redner, Executive Director',
			'qvc_facebook_url'        => '',
			'qvc_footer_copyright'    => 'Quail Valley Charities. All rights reserved.',
			'qvc_footer_fine'         => 'Vero Beach, FL · 501(c)(3) nonprofit organization',

			// SEO.
			'qvc_meta_description'    => 'Quail Valley Charities is a 501(c)(3) that has distributed over $15.5 million since 2001 to nonprofit programs across Indian River County supporting children, their education, and their well-being.',
		);
	}

	return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
}

/**
 * Shorthand: get a theme_mod, falling back to the built-in default.
 *
 * @param string $key Setting key.
 * @return string
 */
function qvc_mod( $key ) {
	return get_theme_mod( $key, qvc_default( $key ) );
}
