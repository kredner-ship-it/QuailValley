<?php
/**
 * The footer for the Quail Valley Charities theme.
 *
 * @package QuailValley_Charities
 */
?>
</main>

<footer class="site-footer" id="contact">
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <span class="brand-text">
        <span class="brand-name"><?php esc_html_e( 'Quail Valley', 'quailvalley-charities' ); ?></span>
        <span class="brand-sub"><?php esc_html_e( 'CHARITIES', 'quailvalley-charities' ); ?></span>
      </span>
      <p><?php echo esc_html( qvc_mod( 'qvc_footer_tagline' ) ); ?></p>
    </div>

    <div class="footer-col">
      <h3><?php esc_html_e( 'Contact', 'quailvalley-charities' ); ?></h3>
      <ul>
        <li><?php echo esc_html( qvc_mod( 'qvc_contact_location' ) ); ?></li>
        <li><a href="<?php echo esc_url( qvc_mod( 'qvc_contact_phone_link' ) ); ?>"><?php echo esc_html( qvc_mod( 'qvc_contact_phone_label' ) ); ?></a></li>
        <li><?php echo esc_html( qvc_mod( 'qvc_contact_person' ) ); ?></li>
      </ul>
    </div>

    <div class="footer-col">
      <h3><?php esc_html_e( 'Explore', 'quailvalley-charities' ); ?></h3>
      <?php qvc_footer_nav(); ?>
    </div>

    <div class="footer-col">
      <h3><?php esc_html_e( 'Follow', 'quailvalley-charities' ); ?></h3>
      <?php $facebook_url = qvc_mod( 'qvc_facebook_url' ); ?>
      <ul class="social-list">
        <li>
          <a href="<?php echo $facebook_url ? esc_url( $facebook_url ) : '#'; ?>"
             <?php echo $facebook_url ? '' : 'data-placeholder-link'; ?>
             aria-label="<?php esc_attr_e( 'Quail Valley Charities on Facebook', 'quailvalley-charities' ); ?>">
            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M14 9h3V6h-3c-1.7 0-3 1.3-3 3v2H9v3h2v6h3v-6h2.6l.4-3H14V9.5c0-.3.2-.5.5-.5Z" fill="currentColor"/></svg>
          </a>
        </li>
      </ul>
      <?php if ( ! $facebook_url ) : ?>
        <p class="fine-print"><?php esc_html_e( 'Facebook link placeholder — add your page URL.', 'quailvalley-charities' ); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="wrap footer-bottom">
    <p>&copy; <span id="year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> <?php echo esc_html( qvc_mod( 'qvc_footer_copyright' ) ); ?></p>
    <p class="footer-fine"><?php echo esc_html( qvc_mod( 'qvc_footer_fine' ) ); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
