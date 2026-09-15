<?php
/**
 * Quail Valley Charities theme bootstrap.
 *
 * @package QuailValley_Charities
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'QVC_VERSION', '1.0.0' );
define( 'QVC_DIR', get_template_directory() );
define( 'QVC_URI', get_template_directory_uri() );

require QVC_DIR . '/inc/defaults.php';
require QVC_DIR . '/inc/customizer.php';

/**
 * Theme setup: supports, nav menus, translations.
 */
function qvc_setup() {
	load_theme_textdomain( 'quailvalley-charities', QVC_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 72,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'quailvalley-charities' ),
			'footer'  => __( 'Footer Menu', 'quailvalley-charities' ),
		)
	);
}
add_action( 'after_setup_theme', 'qvc_setup' );

/**
 * Enqueue styles and scripts.
 */
function qvc_scripts() {
	wp_enqueue_style(
		'qvc-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Open+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'qvc-main',
		QVC_URI . '/assets/css/main.css',
		array( 'qvc-google-fonts' ),
		QVC_VERSION
	);

	wp_enqueue_script(
		'qvc-main',
		QVC_URI . '/assets/js/main.js',
		array(),
		QVC_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'qvc_scripts' );

/**
 * Output the SEO meta description on the front page.
 */
function qvc_meta_description() {
	if ( ! is_front_page() ) {
		return;
	}
	$description = qvc_mod( 'qvc_meta_description' );
	if ( $description ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );
	}
}
add_action( 'wp_head', 'qvc_meta_description', 1 );

/**
 * Fallback menu: reproduces the original hardcoded in-page anchor nav
 * whenever no WordPress menu has been assigned to a location yet.
 *
 * @param array $args wp_nav_menu() args, including our custom 'fallback_items'.
 */
function qvc_fallback_menu( $args ) {
	$items = isset( $args['fallback_items'] ) ? $args['fallback_items'] : array();

	echo '<ul>';
	foreach ( $items as $href => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $href ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * Primary nav links, shared by the fallback for both header and footer menus.
 *
 * @return array href => label
 */
function qvc_default_nav_items() {
	return array(
		'#mission' => __( 'About', 'quailvalley-charities' ),
		'#impact'  => __( 'Impact', 'quailvalley-charities' ),
		'#grants'  => __( 'Grants & Donate', 'quailvalley-charities' ),
		'#events'  => __( 'Events', 'quailvalley-charities' ),
		'#board'   => __( 'Board', 'quailvalley-charities' ),
		'#contact' => __( 'Contact', 'quailvalley-charities' ),
	);
}

/**
 * Footer nav links (original design omits "Contact" since the footer IS
 * the contact area).
 *
 * @return array href => label
 */
function qvc_footer_nav_items() {
	$items = qvc_default_nav_items();
	unset( $items['#contact'] );
	return $items;
}

/**
 * Render the primary header navigation, using a real WP menu if the
 * admin has assigned one, otherwise the original anchor links.
 */
function qvc_primary_nav() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '<ul>%3$s</ul>',
			'fallback_cb'    => 'qvc_fallback_menu',
			'fallback_items' => qvc_default_nav_items(),
		)
	);
}

/**
 * Render the footer navigation, same logic as the primary nav.
 */
function qvc_footer_nav() {
	wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'container'      => false,
			'items_wrap'     => '<ul>%3$s</ul>',
			'fallback_cb'    => 'qvc_fallback_menu',
			'fallback_items' => qvc_footer_nav_items(),
		)
	);
}

/**
 * Render the site brand mark: the uploaded custom logo if set, otherwise
 * the original inline-SVG icon + text wordmark.
 */
function qvc_site_brand() {
	if ( has_custom_logo() ) {
		echo '<a class="brand brand--custom-logo" href="' . esc_url( home_url( '/' ) ) . '">';
		the_custom_logo();
		echo '</a>';
		return;
	}
	?>
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Quail Valley Charities home', 'quailvalley-charities' ); ?>">
		<span class="brand-mark" aria-hidden="true">
			<svg viewBox="0 0 40 40" width="34" height="34"><path d="M20 3c-6 6-14 9-14 18 0 8 6.3 14 14 14s14-6 14-14C34 12 26 9 20 3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 12v18M20 12c-3 1-5.5 3.4-6.5 6.5M20 12c3 1 5.5 3.4 6.5 6.5" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
		</span>
		<span class="brand-text">
			<span class="brand-name"><?php esc_html_e( 'Quail Valley', 'quailvalley-charities' ); ?></span>
			<span class="brand-sub"><?php esc_html_e( 'CHARITIES', 'quailvalley-charities' ); ?></span>
		</span>
	</a>
	<?php
}
