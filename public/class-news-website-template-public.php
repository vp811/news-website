<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mediaservices.clas.ufl.edu
 * @since      1.0.0
 *
 * @package    News_Website_Template
 * @subpackage News_Website_Template/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    News_Website_Template
 * @subpackage News_Website_Template/public
 * @author     Media Services <mediaservices@clas.ufl.edu>
 */
class News_Website_Template_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in News_Website_Template_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The News_Website_Template_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//If the page template is the Featured Article, this CSS will load
 	 	if ( is_page_template( '../templates/news-feature-article.php' ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/news-website-feature-article-template-public.css', array(), $this->version, 'all' );
		}

		if ( is_page_template( '../templates/news-article.php' ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/news-website-article-template-public.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in News_Website_Template_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The News_Website_Template_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//Loads Font Awesome JS
		wp_register_script('font-awesome', 'https://kit.fontawesome.com/a076d05399.js',null, null, true);
		wp_enqueue_script('font-awesome');

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/news-website-template-public.js', array( 'jquery' ), $this->version, false );

	}

}
