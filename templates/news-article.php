<?php
/* Template Name: News Article */
  get_header();
?>
<style>
</style>
<div class="wrap">

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="featured-news top-section">
        <?php the_post_thumbnail(); ?>
      </div>
      <h2 class="entry-title"><?php echo get_the_title(); ?></h2>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php
  get_footer();
?>
