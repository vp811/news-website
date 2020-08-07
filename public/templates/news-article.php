<?php
/* Template Name: News Article
*/
  get_header();

  global $post;
  $author_id = $post->post_author;
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php if(have_posts()){
        while (have_posts()) {
          the_post();

          //Pulls in the Author's first and last name along with the publish date
          $authorFirstName = get_the_author_meta('first_name');
          $authorLastName  = get_the_author_meta('last_name');
          $publishDate     = get_the_date();
          ?>
          <div class="news-article top-section">

            <?php

              //Variable that checks to see if user selected featured image to be hidden in article
              $hide = get_post_meta( get_the_ID(), 'ufclas_featured_image_display', true );


              //If checkbox is not checked, display image
              if($hide != true){
                //Display Featured Image
                the_post_thumbnail();

                // Displays image caption if there is one
                  $get_description = get_post(get_post_thumbnail_id())->post_excerpt;

                if(!empty($get_description)){//If description is not empty show the div
                  echo '<div class="featured_caption"><p>' . $get_description . '</p></div>';
                }
              }
            ?>
          </div>
            <div class="wrap">
              <div class="article-intro">
                <h2><?php echo get_the_title(); ?></h2>

                <!-- Displays subheading if one is set -->
                <?php if(!empty(get_field('subheading'))){
                  echo "<p class='sub-heading'>" . get_field('subheading') . "</p>";
                } ?>

                <!-- Displays author's first name and last name and the publish date -->
                <p class="byline-date"><?php echo "By <span class='author-name'>$authorFirstName $authorLastName</span> — <span class='publish-date'>$publishDate</span>";?></p>
              </div>



            <div class="body-content">
              <?php the_content(); ?>
            </div>
          </div><!-- Wrap -->
        <?php }
      }

        //Display Share Buttons
        socialMedia();

        //Displays the support text and button
        supportText();

        echo "<hr />";

        //Displays the related posts
        relatedPosts();
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
  get_footer();
?>
