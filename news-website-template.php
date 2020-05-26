<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mediaservices.clas.ufl.edu
 * @since             1.0.0
 * @package           News_Website_Template
 *
 * @wordpress-plugin
 * Plugin Name:       News Website Templates
 * Plugin URI:        https://mediaservices.clas.ufl.edu
 * Description:       Custom page templates for the News website
 * Version:           1.0.0
 * Author:            Media Services
 * Author URI:        https://mediaservices.clas.ufl.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       news-website-template
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NEWS_WEBSITE_TEMPLATE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-news-website-template-activator.php
 */
function activate_news_website_template() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-news-website-template-activator.php';
	News_Website_Template_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-news-website-template-deactivator.php
 */
function deactivate_news_website_template() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-news-website-template-deactivator.php';
	News_Website_Template_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_news_website_template' );
register_deactivation_hook( __FILE__, 'deactivate_news_website_template' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-news-website-template.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_news_website_template() {

	$plugin = new News_Website_Template();
	$plugin->run();

}
run_news_website_template();
