<?php
/**
 * Template Name: News Home
 */
 ?>

<?php get_header(); ?>

<!-- Featured News -->
  <section class="featured-news-section">
    <div class="container">
  	   <h2 class="category-title">Featured</h2>
     </div>
      	<?php
      		$query_args = array(
      		'post_type' => 'post',
      		'post_status' => 'publish',
      		'order' => 'DESC',
      		'orderby' => 'date',
      		'posts_per_page' => '1',
      		'category_name' => 'featured-news',
      	);

      	// The Query
      	$the_query = new WP_Query( $query_args );

      	// The Loop
      	if ( $the_query->have_posts() ) {
      		while ( $the_query->have_posts() ) {
      			$the_query->the_post(); ?>

            <div class="featured-news-container">
      			  <div class="news-featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>

        			<div class="featured-section">
        				<h3 class="featured-h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        				<div class="news-excerpt"><p><?php echo get_the_excerpt(); ?></p></div>
        			</div>
            </div>
      			<?php
      		}

      		/* Restore original Post Data */
      		wp_reset_postdata();
      	} ?>
  </section>

<div class="news-and-honors-container">
  <section class="recent-news">
    <!-- Recent news -->
    <h2 class="category-title">Recent</h2>
    <div class="recent-news-section">
    	<?php $query_args = array(
    		'post_type' => 'post',
    		'post_status' => 'publish',
    		'order' => 'DESC',
    		'orderby' => 'date',
    		'posts_per_page' => '4',
    		'category_name' => 'recent-news',
    	);

    	// The Query
    	$the_query = new WP_Query( $query_args );

    	// The Loop
    	if ( $the_query->have_posts() ) {
    		while ( $the_query->have_posts() ) {
    			$the_query->the_post(); ?>
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
    	} ?>
    </div>

    <div class="more-news">
      <?php
        $categoryID = get_cat_ID('Recent News'); ?>
        <a href="<?php echo get_category_link($categoryID); ?>">More <?php echo get_cat_name($categoryID); ?></a>
    </div>
  </section>




  <div class="home-bottom-container">
    <!-- Research news -->
    <section class="research-news-section">
    	<h2 class="category-title">Research</h2>
    	<?php $query_args = array(
    		'post_type' => 'post',
    		'post_status' => 'publish',
    		'order' => 'DESC',
    		'orderby' => 'date',
    		'posts_per_page' => '8',
    		'category_name' => 'research-news',
    	);

    	// The Query
    	$the_query = new WP_Query( $query_args );

    	// The Loop
    	if ( $the_query->have_posts() ) {
    		while ( $the_query->have_posts() ) {
    			$the_query->the_post(); ?>
          <div class="research-individual-news">
        		<div class="news-left-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
            <div class="research-text">
        			 <h3 class="researchnews-h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p class="researchnews-p"><?php echo get_the_excerpt(); ?></p>
            </div>
          </div>
    			<?php
    		}
    		/* Restore original Post Data */
    		wp_reset_postdata();
    	} ?>

      <div class="more-news">
        <?php
          $categoryID = get_cat_ID('Research News'); ?>
          <a href="<?php echo get_category_link($categoryID); ?>">More <?php echo get_cat_name($categoryID); ?></a>
      </div>
    </section>

    <div class="awards-submit-ytori-container">
      <!-- Awards and Honors -->
      <section class="awards-news-section">
      	<h2 class="category-title">Awards & Honors</h2>
      	<?php $query_args = array(
      		'post_type' => 'post',
      		'post_status' => 'publish',
      		'order' => 'ASC',
      		'orderby' => 'date',
      		'posts_per_page' => '10',
      		'category_name' => 'awards-honors',
      	);

      	// The Query
      	$the_query = new WP_Query( $query_args );

      	// The Loop
      	if ( $the_query->have_posts() ) {
      		while ( $the_query->have_posts() ) {
      			$the_query->the_post(); ?>

      			<h3 class="awards-h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      			<hr />
      			<?php
      		}
      		/* Restore original Post Data */
      		wp_reset_postdata();
      	} ?>

        <div class="more-news">
          <?php
            $categoryID = get_cat_ID('Awards & Honors'); ?>
            <a href="<?php echo get_category_link($categoryID); ?>">More <?php echo get_cat_name($categoryID); ?></a>
        </div>
      </section>

      <?php
      //Submit your Story Section
      $query_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'date',
        'posts_per_page' => '1',
        'category_name' => 'submit-news',
      );

      // The Query
      $the_query = new WP_Query( $query_args );

      // The Loop
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post(); ?>
          <section class="submit-story-container">
            <div class="submit-news-thumbnail">
              <?php the_post_thumbnail('square-crop'); ?>
            </div>

            <div class="submit-news">
               <h3><?php echo get_the_title(); ?></h3>
               <p><?php echo get_the_excerpt(); ?></p>
               <p class="submit-news-link"><a href="<?php echo get_the_permalink(); ?>">Submit a story idea</a></p>
            </div>
          </section>
          <?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
      } ?>

      <?php
      //Ytori Section
      $query_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'date',
        'posts_per_page' => '1',
        'category_name' => 'ytori',
      );

      // The Query
      $the_query = new WP_Query( $query_args );

      // The Loop
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post(); ?>
          <section class="ytori-current-issue-container">

            <div class="ytori-current-issue">
               <h2 class="category-title">Ytori Magazine</h2>
               <div class="ytori-text-image">
                 <p class="ytoriexcerpt-p"><?php echo get_the_excerpt(); ?></p>
                 <p class="ytori-current-issue-link"><a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('portrait-crop'); ?></a></p>
               </div>
            </div>
          </section>
          <?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
      } ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
