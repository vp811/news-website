<?php
/* Template Name: News Feature Article
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
          <div class="featured-news top-section">
            <?php the_post_thumbnail(); ?>

            <div class="article-intro">
              <h2><?php echo get_the_title(); ?></h2>

              <!-- Displays subheading if one is set -->
              <?php if(!empty(get_field('subheading'))){
                echo "<p class='sub-heading'>" . get_field('subheading') . "</p>";
              } ?>

              <!-- Displays author's first name and last name and the publish date -->
              <p class="byline-date"><?php echo "By <span class='author-name'>$authorFirstName $authorLastName</span> — <span class='publish-date'>$publishDate</span>";?></p>

              <!-- Displays image caption if there is one -->
              <?php
                $get_description = get_post(get_post_thumbnail_id())->post_excerpt;

                if(!empty($get_description)){//If description is not empty show the div
                  echo '<div class="featured_caption">' . $get_description . '</div>';
                }
              ?>
            </div>
          </div>
          <div class="wrap">
            <div class="body-content">
              <?php the_content(); ?>
            </div>
          </div>
        <?php }
      }


        //Display Share Buttons
        socialMedia();

        //Displays the support text and button
        supportText();

        //Displays the related posts
        relatedPosts();
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
  get_footer();
?>
