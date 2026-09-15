<?php
/**
 * Front page template — the one-page Quail Valley Charities design.
 *
 * All copy is pulled from the Customizer (Appearance > Customize) with
 * defaults matching the original design, via qvc_mod().
 *
 * @package QuailValley_Charities
 */

get_header();

$events = array_filter( array_map( 'trim', explode( "\n", qvc_mod( 'qvc_events_list' ) ) ) );

// Simple inline SVG icons reused across list items below.
$icon_heart = '<svg viewBox="0 0 24 24" width="28" height="28"><path d="M12 21s-7.5-4.6-10-9.3C.5 8 2.6 4.5 6.2 4c2-.3 3.9.6 5.1 2.2C12.5 4.6 14.4 3.7 16.4 4c3.6.5 5.7 4 4.2 7.7C18.1 16.4 12 21 12 21Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
$icon_grant = '<svg viewBox="0 0 24 24" width="28" height="28"><path d="M12 3v6M9 6l3 3 3-3" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 13h16v7a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M4 13c2.5 1.4 5.3 2 8 2s5.5-.6 8-2" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
$icon_calendar = '<svg viewBox="0 0 24 24" width="18" height="18"><rect x="3.5" y="4.5" width="17" height="16" rx="2" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M3.5 9h17M8 3v3M16 3v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
?>

<!-- HERO -->
<section class="hero" id="top">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="wrap hero-inner">
    <p class="eyebrow"><?php echo esc_html( qvc_mod( 'qvc_hero_eyebrow' ) ); ?></p>
    <h1><?php echo esc_html( qvc_mod( 'qvc_hero_heading' ) ); ?></h1>
    <p class="hero-lead"><?php echo esc_html( qvc_mod( 'qvc_hero_lead' ) ); ?></p>
    <div class="hero-actions">
      <a class="btn btn-primary btn-lg" href="<?php echo esc_url( qvc_mod( 'qvc_cta_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_cta_label' ) ); ?></a>
      <a class="btn btn-secondary btn-lg" href="<?php echo esc_url( qvc_mod( 'qvc_secondary_cta_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_secondary_cta_label' ) ); ?></a>
    </div>
  </div>
</section>

<!-- MISSION / HISTORY -->
<section class="section" id="mission">
  <div class="wrap split">
    <div class="split-media">
      <?php $mission_image = qvc_mod( 'qvc_mission_image' ); ?>
      <?php if ( $mission_image ) : ?>
        <img class="mission-photo" src="<?php echo esc_url( $mission_image ); ?>" alt="<?php esc_attr_e( 'Quail Valley Charities community program', 'quailvalley-charities' ); ?>">
      <?php else : ?>
        <div class="photo-placeholder" role="img" aria-label="<?php esc_attr_e( 'Placeholder photo: Quail Valley Charities community program', 'quailvalley-charities' ); ?>">
          <?php echo $icon_heart; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          <span><?php esc_html_e( 'Photo placeholder — community program', 'quailvalley-charities' ); ?></span>
        </div>
      <?php endif; ?>
    </div>
    <div class="split-copy">
      <p class="eyebrow"><?php echo esc_html( qvc_mod( 'qvc_mission_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_mission_heading' ) ); ?></h2>
      <?php echo wp_kses_post( wpautop( qvc_mod( 'qvc_mission_body' ) ) ); ?>
    </div>
  </div>
</section>

<!-- IMPACT STATS -->
<section class="section section-dark" id="impact">
  <div class="wrap">
    <div class="section-head center">
      <p class="eyebrow eyebrow-invert"><?php echo esc_html( qvc_mod( 'qvc_impact_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_impact_heading' ) ); ?></h2>
    </div>
    <div class="stats-grid">
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
        <div class="stat-card">
          <span class="stat-number"><?php echo esc_html( qvc_mod( "qvc_stat{$i}_number" ) ); ?></span>
          <span class="stat-label"><?php echo esc_html( qvc_mod( "qvc_stat{$i}_label" ) ); ?></span>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- DONATE + GRANTS -->
<section class="section" id="grants">
  <div class="wrap">
    <div class="section-head center">
      <p class="eyebrow"><?php echo esc_html( qvc_mod( 'qvc_grants_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_grants_heading' ) ); ?></h2>
    </div>
    <div class="cards-2">
      <article class="action-card" id="donate">
        <span class="action-icon" aria-hidden="true"><?php echo $icon_heart; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
        <h3><?php echo esc_html( qvc_mod( 'qvc_donate_heading' ) ); ?></h3>
        <p><?php echo esc_html( qvc_mod( 'qvc_donate_text' ) ); ?></p>
        <a class="btn btn-primary" href="<?php echo esc_url( qvc_mod( 'qvc_donate_button_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_donate_button_label' ) ); ?></a>
      </article>

      <article class="action-card">
        <span class="action-icon" aria-hidden="true"><?php echo $icon_grant; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
        <h3><?php echo esc_html( qvc_mod( 'qvc_grant_heading' ) ); ?></h3>
        <p><?php echo esc_html( qvc_mod( 'qvc_grant_text' ) ); ?></p>
        <a class="btn btn-secondary" href="<?php echo esc_url( qvc_mod( 'qvc_grant_button_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_grant_button_label' ) ); ?></a>
      </article>
    </div>
  </div>
</section>

<!-- EVENTS -->
<section class="section section-tint" id="events">
  <div class="wrap">
    <div class="section-head center">
      <p class="eyebrow"><?php echo esc_html( qvc_mod( 'qvc_events_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_events_heading' ) ); ?></h2>
    </div>
    <?php if ( qvc_mod( 'qvc_events_note' ) ) : ?>
      <p class="placeholder-note center"><?php echo esc_html( qvc_mod( 'qvc_events_note' ) ); ?></p>
    <?php endif; ?>
    <?php if ( $events ) : ?>
      <ul class="event-list">
        <?php foreach ( $events as $event ) : ?>
          <li>
            <span class="event-icon" aria-hidden="true"><?php echo $icon_calendar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
            <span><?php echo esc_html( $event ); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>

<!-- LEADERSHIP -->
<section class="section" id="board">
  <div class="wrap">
    <div class="section-head center">
      <p class="eyebrow"><?php echo esc_html( qvc_mod( 'qvc_leadership_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_leadership_heading' ) ); ?></h2>
    </div>
    <div class="leadership">
      <span class="person-avatar" aria-hidden="true"><?php echo esc_html( qvc_mod( 'qvc_leader_initials' ) ); ?></span>
      <div>
        <h3><?php echo esc_html( qvc_mod( 'qvc_leader_name' ) ); ?></h3>
        <p class="role"><?php echo esc_html( qvc_mod( 'qvc_leader_role' ) ); ?></p>
        <p><?php echo esc_html( qvc_mod( 'qvc_leader_bio' ) ); ?></p>
        <a class="link-arrow" href="<?php echo esc_url( qvc_mod( 'qvc_leader_phone_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_leader_phone_label' ) ); ?> <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
    <p class="committee-note"><?php echo esc_html( qvc_mod( 'qvc_committee_note' ) ); ?></p>
  </div>
</section>

<!-- NEWSLETTER -->
<section class="section section-dark newsletter" id="newsletter">
  <div class="wrap newsletter-inner">
    <div>
      <p class="eyebrow eyebrow-invert"><?php echo esc_html( qvc_mod( 'qvc_newsletter_eyebrow' ) ); ?></p>
      <h2><?php echo esc_html( qvc_mod( 'qvc_newsletter_heading' ) ); ?></h2>
      <p class="newsletter-lead"><?php echo esc_html( qvc_mod( 'qvc_newsletter_lead' ) ); ?></p>
    </div>
    <form class="newsletter-form" id="newsletterForm" novalidate>
      <label class="sr-only" for="newsletterEmail"><?php esc_html_e( 'Email address', 'quailvalley-charities' ); ?></label>
      <input type="email" id="newsletterEmail" name="email" placeholder="<?php esc_attr_e( 'Enter your email', 'quailvalley-charities' ); ?>" autocomplete="email" required>
      <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Subscribe', 'quailvalley-charities' ); ?></button>
    </form>
    <p class="form-status" id="newsletterStatus" role="status" aria-live="polite"></p>
  </div>
</section>

<?php get_footer(); ?>
