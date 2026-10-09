<?php
/**
 * Generic template for any additional WordPress pages the admin creates
 * (e.g. a Privacy Policy page). Keeps the same header/footer chrome and
 * typography as the front page.
 *
 * @package QuailValley_Charities
 */

get_header();
?>

<section class="section">
  <div class="wrap page-content">
    <?php
    while ( have_posts() ) :
      the_post();
      ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php
    endwhile;
    ?>
  </div>
</section>

<?php get_footer(); ?>
