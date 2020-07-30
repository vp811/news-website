<?php get_header(); ?>


<?php
  // get the current taxonomy term andimage from field
  $term = get_queried_object();
  $image = get_field('category_image', $term);
?>

<!-- Featured Image -->
<div class="archive-hero-image">
  <img src="<?php echo $image['url']; ?>"  alt="<?php echo esc_attr($image['alt']); ?>" />

  <div class="category-intro">
    <!-- Category Title -->
    <h2 class="category-title"><?php single_cat_title(); ?></h2>

    <!-- Displays image caption if there is one -->
    <?php
      $get_description = esc_attr($image['description']);

      if(!empty($get_description)){//If description is not empty show the div
        echo '<div class="category-caption">' . $get_description . '</div>';
      }
    ?>
  </div>
</div>
  <main class="archive-container">
    <section class="recent-news">

      <div class="recent-news-section">
        <?php
        // The Loop
        if (have_posts() ) {
          while (have_posts() ) {
            the_post(); ?>
            <div class="recent-individual-news">
              <div class="news-left-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',  array( 'class' => 'img-responsive' )); ?></a></div>
              <div class="news-right-text">
                <h3 class="news-h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="news-p"><?php echo get_the_excerpt(); ?></p>
              </div>
          </div>
            <?php
          }
          /* Restore original Post Data */
          wp_reset_postdata();
        ?>
        <div class="archive-pagination">
          <?php
            the_posts_pagination( array(
                'mid_size'  => 5,
                'prev_text' => __( '&#8592;', 'news-website-template' ),
                'next_text' => __( '&#8594;', 'news-website-template' ),
            ) );
          ?>
        </div>
        <?php } ?>
      </div>
    </section>
  </main>

<?php get_footer(); ?>