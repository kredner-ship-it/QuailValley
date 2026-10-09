<?php
/**
 * Required fallback template — used for blog listings, search results,
 * archives, or as the last-resort catch-all. The one-page marketing
 * design lives in front-page.php.
 *
 * @package QuailValley_Charities
 */

get_header();
?>

<section class="section">
  <div class="wrap page-content">
    <?php if ( have_posts() ) : ?>
      <?php
      while ( have_posts() ) :
        the_post();
        ?>
        <article <?php post_class(); ?>>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
        </article>
        <?php
      endwhile;

      the_posts_navigation();
      ?>
    <?php else : ?>
      <p><?php esc_html_e( 'Nothing found.', 'quailvalley-charities' ); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
