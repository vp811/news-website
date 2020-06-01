<?php
/**
 * Template Name: News Home
 * The template for displaying page template with image tiles under title
 */
 ?>


 <!-- Styling -->

<style>
 	h2.news-h2 {
    font-family: 'Gentona_Bold';
    color: #C2510A;
    font-size: 1.375rem;
    line-height: 120%;
    text-transform: uppercase;
 	}

  .page-template-page-news-home .container {
    padding: 0 1.125rem;
  }

	#page h3.featured-h3 a {
    font-family: "Surveyor Text A", "Surveyor Text B" !important;
    font-style: normal;
    font-weight: 500;
    color: #002346;
    font-size: 1.375rem;
    line-height: 114%;
	}

  #page h3.news-h3 a, #page .news-right-text a, #page h3.researchnews-h3 a {
    font-family: "Surveyor Text A", "Surveyor Text B" !important;
    font-style: normal;
    font-weight: 500;
    color: #002346;
    font-size: 1.25rem;
    margin-bottom: 1.5%;
    line-height: 125%;
  }

  #page .news-excerpt p, #page p.news-p, #page p.researchnews-p, #page p.ytoriexcerpt-p {
    font-family: "Gentona_Book" !important;
    color: #414141;
    font-size: 1rem;
    line-height: 140%;
    padding: 0;
  }

  #page p.news-p, #page p.researchnews-p {
    margin: 1.4% 0;
  }

  h3.news-h3, h3.researchnews-h3 {
    padding: 0;
  }

  .news-and-honors-container {
    padding: 1rem;
  }

  #page h3.awards-h3 a {
    font-family: 'Quadon_Bold' !important;
    color: #337AB7;
    font-size: 1.0625rem;
    margin: 1.5% 0;
    line-height: 147%;
  }

	.news-featured-thumbnail {
		width: 100%;
	}

  .featured-section {
    padding: 0 1.125rem;
  }

  .research-individual-news, .recent-individual-news {
    display: flex;
  }

  .research-individual-news, .recent-individual-news {
    margin-bottom: 1.25rem;
  }

  .news-left-thumbnail, .news-left-thumbnail {
    flex: 1 28%;
    max-width: 165px;
  }

  .research-text, .news-right-text {
    flex: 1 50%;
    margin-left: 0.6rem;
  }

	.recent-news {
		clear: both;
	}

	.news-right-text {
		width: 60%;
	}

  p.link-more {
    display: none;
  }

  .submit-story-container .submit-news-thumbnail {
    display: none;
  }

  .submit-story-container {
    background: #004083;
    padding: 1.5rem 1rem;
  }

  .submit-news h3 {
    font-family: "Gentona_Bold", sans-serif;
    color: white !important;
    text-transform: uppercase;
    text-align: center;
    font-size: 1.375rem;
    line-height: 120%;
    padding: 0;
  }

  #page .submit-news p {
    font-family: "Gentona_Book", sans-serif !important;
    color: white;
    line-height: 125%;
  }

  .submit-news p a {
    color: white !important;
    text-transform: uppercase;
    border: 1.5px solid white;
    padding: 0.625rem;
  }

  p.submit-news-link {
    text-align: center;
    margin-top: 1rem;
  }

  .ytori-text-image {
    display: flex;
    flex-flow: row-reverse;
  }

  .ytori-text-image > p {
    flex: 1 50%;
    padding: 0;
  }

  p.ytori-current-issue-link {
    flex: 1 23%;
  }

  p.ytori-current-issue-link img {
    min-height: 135px;
    min-width: 100px;
  }

  p.ytoriexcerpt-p {
    margin-left: 3%;
  }

  .awards-news-section h3:first-of-type {
    padding-top: 0;
  }

  hr {
    height: 1px;
    background: #CCCCCC;
    border: none;
  }



	/* Media Queries */

	@media (min-width: 768px) {
		/*.news-featured-thumbnail {
			float: left;
			width: 30%;
			margin-bottom: 5%;
		}*/

    .container {
      padding: 0 1.875rem;
      width: 100%;
    }

    h2.news-h2 {
      font-size: 1.5rem;
      padding-top: .5rem;
    }

    #page h3.featured-h3 {
      padding: 0 0 4% 0;
    }

    #page h3.featured-h3 a {
      font-size: 1.625rem;
      line-height: 120%;
    }

    #page h3.news-h3 a, #page .news-right-text a, #page h3.researchnews-h3 a {
      font-size: 1.375rem;
    }

    #page .news-excerpt p, #page p.news-p, #page p.researchnews-p {
      font-size: 1.125rem;
    }

    .featured-section {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      align-content: center;
    }

    .featured-news-container {
        display: flex;
        padding: 0 1.875rem;
    }

    h3.news-h3 {
      margin-top: 6.5%;
      margin-bottom: 6%;
    }

    .news-featured-thumbnail img {
      min-width: 375px;
      min-height: 290px;
      object-fit: cover;
    }

    .news-and-honors-container {
      padding: 1rem 1.875rem;
    }

    .recent-news-section {
      display: flex;
    }

    .recent-individual-news {
      flex-wrap: wrap;
      flex: 1 25%;
      margin-right: 2.8%;
      align-content: start;
    }

    .recent-individual-news > div {
      flex: 1 100%;
    }

    .recent-news {
      border-top: 1px solid #cccccc;
      border-bottom: 1px solid #cccccc;
      margin: 1rem 0 2rem;
      padding: 1rem 0 2rem;
    }

    .news-left-thumbnail, .news-left-thumbnail {
      max-width: 100%;
    }

    .news-left-thumbnail img {
      width: 100%;
    }

    .research-text,
    .news-right-text {
      margin-left: 0;
    }

		.research-individual-news, .recent-individual-news {
      margin-bottom: 0;
		}

    .home-bottom-container {
      display: flex;
    }

    .research-news-section {
      border-right: 1px solid #CCCCCC;
      margin-right: 2.25rem;
      padding-right: 2.25rem;
      flex: 1 50%;
    }

    .research-news-section h2 {
      padding-top: 0;
    }

    .research-individual-news {
      margin-bottom: 1.25rem;
    }

    .research-individual-news .news-left-thumbnail {
      flex: 1 22%;
    }

    .research-text {
      padding-left: 1rem;
    }

    .awards-submit-ytori-container {
      display: flex;
      flex-wrap: wrap;
      flex-direction: row;
      align-content: flex-start;
      flex: 1 30%;
    }

    .submit-story-container {
      order: 1;
    }

    .awards-news-section {
      order: 2;
    }

    .ytori-current-issue-container {
      order: 3;
    }

    .submit-story-container .submit-news-thumbnail {
      display: block;
    }

    .submit-story-container {
      padding: 0;
      max-width: 250px;
    }

    .submit-news {
      padding: 1.25rem 1rem;
    }

    .submit-news h3 {
      line-height: 114%;
    }

    #page .submit-news p {
      font-size: 1.0625rem;
    }

    .submit-news p a {
      font-size: 0.875rem;
    }

    .ytori-text-image {
      display: block;
    }

    p.ytoriexcerpt-p {
      margin: 0;
    }

    p.ytori-current-issue-link img {
      max-width: 200px;
      max-height: 240px;
      margin-top: 1.25rem;
    }

    #page h3.awards-h3 a {
        line-height: 120%;
    }

		h3.news-h3 a {
			font-size: 1.0625rem;
		}

	}

	@media (min-width: 1025px) {
    div#content {
      max-width: 1025px;
      margin: 0 auto;
    }

    h2.news-h2 {
      font-size: 1.625rem;
    }

    #page h3.news-h3 a, #page .news-right-text a, #page h3.researchnews-h3 a {
      font-size: 1.5rem;
    }

    #page h3.awards-h3 a {
      font-size: 1.125rem;
    }

    .recent-news-section {
      margin-bottom: 3%;
    }

    .news-left-thumbnail {
      margin-bottom: 2%;
    }

    .awards-news-section {
      margin-top: 11%;
    }


	}
</style>



<!-- Code -->



<?php get_header(); ?>



<!-- Featured News -->
  <section class="featured-news-section">
    <div class="container">
  	   <h2 class="news-h2">Featured News</h2>
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
      			  <div class="news-featured-thumbnail"><?php the_post_thumbnail(); ?></div>

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
    <h2 class="news-h2">Recent News</h2>
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
    				<div class="news-left-thumbnail"><?php the_post_thumbnail('thumbnail',  array( 'class' => 'img-responsive' )); ?></div>
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
  </section>




  <div class="home-bottom-container">
    <!-- Research news -->
    <section class="research-news-section">
    	<h2 class="news-h2">Research News</h2>
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
        		<div class="news-left-thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
            <div class="research-text">
        			 <h3 class="researchnews-h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p class="researchnews-p"><?php echo get_the_excerpt(); ?></p>
            </div>
          </div>
    			<?php
    		}
    		/* Restore original Post Data */
    		wp_reset_postdata();
    	} ?>
    </section>

    <div class="awards-submit-ytori-container">
      <!-- Awards and Honors -->
      <section class="awards-news-section">
      	<h2 class="news-h2">Awards & Honors</h2>
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
               <h2 class="news-h2">Ytori Magazine</h2>
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
