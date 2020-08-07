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
              //Displays author's first name and last name and the publish date

              //Checks to see if author needs to hidden
              $hidden  = get_field('featured-image');

              if( in_array('hide-image', $hidden) == false ) {

                //Display Featured Image
                the_post_thumbnail();

                // Displays image caption if there is one
                  $get_description = get_post(get_post_thumbnail_id())->post_excerpt;

                if(!empty($get_description)){//If description is not empty show the div
                  echo '<div class="featured_caption"><p>' . $get_description . '</p></div>';
                }
              }else{
                $noimage =  "no-image";
              }
            ?>
          </div>
            <div class="wrap <?php echo $noimage; ?>">
              <div class="article-intro">
                <h2><?php echo get_the_title(); ?></h2>

                <?php
                //Displays subheading if one is set
                if(!empty(get_field('subheading'))){
                  echo "<p class='sub-heading'>" . get_field('subheading') . "</p>";
                } ?>

                <?php
                  //Displays author's first name and last name and the publish date

                  //Checks to see if author needs to hidden
                  $hidden = get_field('article-author');

                  $author = "By <span class='author-name'>$authorFirstName $authorLastName</span> —";
                  $date   = "<span class='publish-date'>$publishDate</span>";

                  if( in_array('hide-author', $hidden) == false ) {
                    echo "<p class='byline-date'> $author $date</p>";
                  }else{
                    echo "<p class='byline-date'>$date</p>";
                  }
                ?>
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
