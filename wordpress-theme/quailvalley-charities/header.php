<?php
/**
 * The header for the Quail Valley Charities theme.
 *
 * @package QuailValley_Charities
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to main content', 'quailvalley-charities' ); ?></a>

<header class="site-header" id="site-header">
  <div class="wrap header-inner">
    <?php qvc_site_brand(); ?>

    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="primaryNav">
      <span class="sr-only"><?php esc_html_e( 'Toggle menu', 'quailvalley-charities' ); ?></span>
      <span class="nav-toggle-bar" aria-hidden="true"></span>
    </button>

    <nav class="primary-nav" id="primaryNav" aria-label="<?php esc_attr_e( 'Primary', 'quailvalley-charities' ); ?>">
      <?php qvc_primary_nav(); ?>
      <a class="btn btn-primary nav-cta" href="<?php echo esc_url( qvc_mod( 'qvc_cta_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_cta_label' ) ); ?></a>
    </nav>
  </div>
</header>

<main id="main">
