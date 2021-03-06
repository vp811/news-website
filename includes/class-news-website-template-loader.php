<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://mediaservices.clas.ufl.edu
 * @since      1.0.0
 *
 * @package    News_Website_Template
 * @subpackage News_Website_Template/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    News_Website_Template
 * @subpackage News_Website_Template/includes
 * @author     Media Services <mediaservices@clas.ufl.edu>
 */
class News_Website_Template_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress action that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         The priority at which the function should be fired.
	 * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

	}

}


class clasNewsPageTemplates {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	/**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new clasNewsPageTemplates();
		}

		return self::$instance;

	}

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_post_templates', array( $this, 'add_new_template' )
			);

			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_project_templates' )
		);


		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);


		// Add your templates to this array.
		$this->templates = array(
			'../public/templates/news-article.php' => 'News Article',
			'../public/templates/news-feature-article.php' => 'News Feature Article',
			'../public/templates/news-home-page.php' => 'News Home Page'
		);

		function news_remove_page_templates( $templates ) {
	    unset( $templates['single-magazine-article.php'] );
			unset( $templates['page-clas-home.php'] );
	    return $templates;
		}

		add_filter( 'theme_page_templates', 'news_remove_page_templates' );

	}

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {
		// Return the search or achive template if we're searching (instead of the template for the first result)
		if ( is_search() || is_archive() ) {
			return $template;
		}

		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		// Allows filtering of file path
		$filepath = apply_filters( 'page_templater_plugin_dir_path', plugin_dir_path( __FILE__ ) );

		$file =  $filepath . get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

}
add_action( 'plugins_loaded', array( 'clasNewsPageTemplates', 'get_instance' ) );


/*========================================

Resizes Thumbnail Sizes

=========================================*/
class thumbnailImages {
    public function __construct() {
        add_action( 'after_setup_theme', array( $this, 'overwrite_wptheme_settings' ) );
    }

    public function overwrite_wptheme_settings() {
        add_image_size( 'thumbnail', 150, 150, false );
    }
}


/*========================================

Sets up ACF fields

=========================================*/
if(function_exists('acf_add_local_field_group')){

	//Adds the Subheading section to a post
	acf_add_local_field_group(array(
		'key' => 'subheading',
		'title' => 'Sub Heading',
		'fields' => array (
			array (
				'key' => 'subheading',
				'label' => 'Sub Heading',
				'instructions' => 'Enter the sub-head for this article.',
				'name' => 'sub_heading',
				'type' => 'text',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'position' => 'acf_after_title',
		'style' => 'seamless',
	));

	//Adds the Support section to a post
	acf_add_local_field_group(array(
		'key' => 'support_link',
		'title' => 'Support Link',
		'fields' => array (
			array (
				'key' => 'support_Link',
				'label' => 'Support Link',
				'instructions' => 'Paste link to giving page for department/center.',
				'name' => 'support_link',
				'type' => 'text',
			),
			array (
				'key' => 'support_Text',
				'label' => 'Support Text',
				'instructions' => 'Type in the message that you would like to show up in the button.',
				'name' => 'support_Text',
				'type' => 'text',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'position' => 'acf_after_title',
		'style' => 'seamless',
	));

	//Adds the Featured Images to categories
	acf_add_local_field_group(array(
		'key' => 'cat_featured',
		'title' => 'Category Featured Image',
		'fields' => array (
			array (
				'key' => 'category_image',
				'label' => 'Category Image',
				'instructions' => 'Select an image for this category',
				'name' => 'cats_image',
				'type' => 'image',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'category'
				),
			),
		),
		'style' => 'seamless',
	));

	acf_add_local_field_group(array(
		'key' => 'hide-fields',
		'title' => 'Hide These Items from Displaying:',
		'fields' => array (
			array (
				'key' => 'featured-image',
				'label' => 'Featured Image',
				'name' => 'featured-image',
				'type' => 'checkbox',
				'choices' => array(
					'hide-image'	=> 'Hide featured image from individual article'
				),
			),
			array (
				'key' => 'article-author',
				'label' => 'Author',
				'name' => 'article-author',
				'type' => 'checkbox',
				'choices' => array(
					'hide-author'	=> 'Hide author from individual article'
				),
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post'
				),
			),
		),
		'position' => 'side',
	));
}

/*========================================

	Related Posts

=========================================*/
function relatedPosts(){
		global $post;
		$tags = wp_get_post_tags($post->ID);

		//Gets arguments for Related Posts Query
		if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag){
				$tag_ids[] = $individual_tag->term_id;

				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=>3, // Number of related posts to display.
					'ignore_sticky_posts'=>1,
					'orderby' => 'rand'
				);
			}

			$my_query = new wp_query( $args ); ?>

			<div class="wrap related-posts">
				<section class="relatedposts">
					<h3>You Might Also Like</h3>

					<div class="relatedposts-container"><?php

						while( $my_query->have_posts() ) {
							$my_query->the_post();
						?>

						<div class="relatedthumb">
							<a rel="external" href="<?php the_permalink(); ?>">
							<div class="related-post-featured-image">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<div class="related-post-title-excerpt">
								<h4><?php echo get_the_title(); ?></h4>
								<p><?php echo get_the_excerpt(); ?></p>
							</div>
							</a>
						</div>

			<?php }
			}
			wp_reset_query();
		?>
					</div> <!-- relatedposts-container -->
				</section>
			</div> <!-- Wrap -->
	<?php
}
/*========================================

	Support Department Link/Text

=========================================*/
function supportText(){
	//Gets the values entered in the Advanced Custom Fields in the post
	$supportLink = get_field( "support_Link" );
	$supportText = get_field( "support_Text" );

	//If both values are empty, this will not display
	if(!empty($supportLink) && !empty($supportText)){	?>
		<div class="wrap support-link">
			<section class="support-text-container">
				<p>To further support this initiative and research of the college go to the link below.</p>
				<p><a class="give-button" href="<?php echo $supportLink; ?>" target="_blank"><?php echo $supportText; ?></a></p>
				<?php
					}
				?>
			</section>
		</div>

<?php }

/*========================================

	Display Share to Social Media Icons

=========================================*/
function socialMedia(){
	$postUrl = get_the_permalink(); ?>
	<!-- <script type="text/javascript">
		function copyLink() {
			/* Get the text field */
			var copyText = document.getElementById("copyLink");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /*For mobile devices*/

			/* Copy the text inside the text field */
			document.execCommand("copy");
		}
	</script> -->
	<div class="wrap share-buttons">
		<section class="sharing-box content-margin content-background clearfix">
				<h3 class="sharing-box-name"><i class="fa fa-share-alt" aria-hidden="true"></i>Share The Story<i class="fa fa-share-alt fa-rotate-180" aria-hidden="true"></i></h3>
				<div class="share-button-wrapper">
						<!-- Facebebook Link -->
						<p><a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fab fa-facebook-square"></i></a></p>

						<!-- Twitter Link -->
						<p><a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Share on Twitter"><i class="fab fa-twitter"></i></i></a></p>

						<!-- LinkedIn -->
						<p><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $postUrl; ?>&title=<?php echo get_the_title(); ?>"><i class="fab fa-linkedin"></i></a></p>

						<!-- Copy Link -->
						<!-- <p><input type="text" value="<?php //echo $postUrl; ?>" id="copyLink" />
						<button onclick="copyLink();" title="Copy Link"><i class="fas fa-link"></i></button></p> -->
				</div>
		</section>
	</div><!-- Wrap -->
<?php }

/*========================================

	New Archive Page

=========================================*/
function clasNewsArchiveTemplate( $template ) {
    // If the current url is an archive of any kind
    if( is_category(array('recent-news', 'research-news', 'awards-honors')) ) {
        // Set this to the template file inside your plugin folder
        $template = ABSPATH . 'wp-content/plugins/news-website-template/public/templates/archive.php';
    }
    // Always return, even if we didn't change anything
    return $template;
}

add_filter( 'archive_template', 'clasNewsArchiveTemplate' );




function custom_posts_per_page( $query ) {

		//Stores the page number you're on
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		//Shows 13 post on the fist page of an archive page
    if ( ($query->is_archive() || $query->is_category()) && $paged == 1 ) {
        set_query_var('posts_per_page', 13);
    }

		//Shows 12 post on the fist page of an archive page
		if (($query->is_archive() || $query->is_category()) && $paged != 1){
				set_query_var('posts_per_page', 12);
		}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );



/*========================================

	Customizer Options

=========================================*/

function news_customizer_options( $wp_customize ) {
	// Add a Theme Option panel for backwards compatibility
	$wp_customize->add_panel( 'news_options', array(
		'title' => __('News Website Options', 'ufclas-emily'),
		'description' => __('Options for modifying the theme.', 'ufclas-emily'),
		'priority' => '129',
	));

	// Adds subfooter options to customizer
	$wp_customize->add_section( 'theme_options_sub_footer', array(
		'title' => __('Sub Footer', 'ufclas-emily'),
		'description' => __('This section will show up right before the main CLAS footer', 'ufclas-emily'),
		'panel' => 'news_options',
	));

	$wp_customize->add_setting( 'heading_subfooter', array( 'default' => '' ));
	$wp_customize->add_setting( 'fb_subfooter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'twitter_subfooter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'instagram_subfooter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'linkedin_subfooter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'newsletter_cta_subfooter', array( 'default' => '' ));
	$wp_customize->add_setting( 'newsletter_subfooter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));

	$wp_customize->add_control( 'heading_subfooter', array(
		'label' => __('Social Media Text', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'textarea',
	));
	$wp_customize->add_control( 'fb_subfooter', array(
		'label' => __('Facebook URL', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'text',
	));
	$wp_customize->add_control( 'twitter_subfooter', array(
		'label' => __('Twitter URL', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'text',
	));
	$wp_customize->add_control( 'instagram_subfooter', array(
		'label' => __('Instagram URL', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'text',
	));
	$wp_customize->add_control( 'linkedin_subfooter', array(
		'label' => __('LinkedIn URL', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'text',
	));
	$wp_customize->add_control( 'newsletter_cta_subfooter', array(
		'label' => __('Newsletter CTA', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'textarea',
	));
	$wp_customize->add_control( 'newsletter_subfooter', array(
		'label' => __('Newsletter URL', 'ufclas-emily'),
		'description' => __("", 'ufclas-emily'),
		'section' => 'theme_options_sub_footer',
		'type' => 'text',
	));
}

add_action('customize_register','news_customizer_options');



/*=======================================

	Adds subfooter before main footer

=========================================*/
function newsSubFooter() { ?>
	</div>
	<div class="sub-footer">
		<div class="social-media-accounts">
			<?php
			//Text before social media icons in subfooter
			if ( !empty(get_theme_mod('heading_subfooter')) ){ ?>
				<p><?php echo get_theme_mod('heading_subfooter'); ?></p>
			<?php } ?>

			<div class="social-media-icons">
				<?php
					//Facebook Icon
					if ( !empty(get_theme_mod('fb_subfooter')) ){ ?>
						<p><a target="_blank" class="follow facebook" href="<?php echo esc_url(get_theme_mod('fb_subfooter')); ?>" title="Follow CLAS on Facebook"><i class="fab fa-facebook-square"></i></a></p>
					<?php }

					//Instagram Icon
					if ( !empty(get_theme_mod('instagram_subfooter')) ){ ?>
						<p><a target="_blank" class="follow instagram" href="<?php echo esc_url(get_theme_mod('instagram_subfooter')); ?>" title="Follow CLAS on Instagram"><i class="fab fa-instagram"></i></a></p>
					<?php }

					//Twitter Icon
					if ( !empty(get_theme_mod('twitter_subfooter')) ){ ?>
						<p><a target="_blank" class="follow twitter" href="<?php echo esc_url(get_theme_mod('twitter_subfooter')); ?>" title="Follow CLAS on Twitter"><i class="fab fa-twitter"></i></a></p>
					<?php }

					//LinkedIn Icon
					if ( !empty(get_theme_mod('linkedin_subfooter')) ){ ?>
						<p><a target="_blank" class="follow linkedin" href="<?php echo esc_url(get_theme_mod('linkedin_subfooter')); ?>" title="Follow CLAS on LinkedIn"><i class="fab fa-linkedin"></i></a></p>
					<?php } ?>
				</div>
		</div>
		<div class="newsletter">
			<?php
				//Newsletter Button
				if ( !empty(get_theme_mod('newsletter_subfooter')) ){ ?>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-body">
									<button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<iframe src="https://app.e2ma.net/app2/audience/signup/1928037/1764318/" width="810" height="800"frameborder="0"></iframe>
					      </div>
					    </div>
					  </div>
					</div>

					<script type="text/javascript">
						jQuery($('#exampleModal').on('shown.bs.modal', function () {
							$('#myInput').trigger('focus')
						}))
					</script>

					<p class="follow newsletter"><a target="_blank" id="myInput" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  href="<?php echo esc_url(get_theme_mod('newsletter_subfooter')); ?>">Subscribe to Newsletter</a></p>
				<?php }

				//Newsletter Call to Action
				if ( !empty(get_theme_mod('newsletter_cta_subfooter')) ){ ?>
					<p><?php echo get_theme_mod('newsletter_cta_subfooter'); ?></p>
				<?php } ?>
			</div>
	</div>
<?php
}

add_action('get_footer', 'newsSubFooter');
