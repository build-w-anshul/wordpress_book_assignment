<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/build-w-anshul/
 * @since             1.0.0
 * @package           Wp_Book
 *
 * @wordpress-plugin
 * Plugin Name:       WP Book
 * Plugin URI:        https://https://github.com/build-w-anshul/
 * Description:       WORDPRESS ASSIGNMENT
 * Version:           1.0.0
 * Author:            Anshul
 * Author URI:        https://https://github.com/build-w-anshul//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-book
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
define( 'WP_BOOK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-book-activator.php
 */
function activate_wp_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-activator.php';
	Wp_Book_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-book-deactivator.php
 */
function deactivate_wp_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-deactivator.php';
	Wp_Book_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_book' );
register_deactivation_hook( __FILE__, 'deactivate_wp_book' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-book.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_book() {

	$plugin = new Wp_Book();
	$plugin->run();

}
run_wp_book();

//custom post type activation in menu 
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-cpt.php';
new Wp_custom_post_type();

//cutom taxonomy - hierarchal
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-taxonomies.php';
new Wp_Book_Category_Taxonomy_Hierarchal();

// Book metabox
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-metabox.php';
new Wp_Book_Custom_Metabox();

//Book meta table
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-meta-table.php';
$book_meta = new Wp_book_Meta_Table();

register_activation_hook(__FILE__, [$book_meta, 'create_table']);
register_deactivation_hook(__FILE__, 'wp_book_delete_table');

function wp_book_delete_table() {
    global $wpdb;
    $table = $wpdb->prefix . 'book_meta';
    $wpdb->query("DROP TABLE IF EXISTS $table");
}

require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-settings.php';
new Wp_Book_Settings();

require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-info-shortcode.php';
new WPBook_Shortcode();

require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-block.php';
new Wp_Book_Block();

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'wp-book-block',
        plugins_url('block/index.js', __FILE__),
        ['wp-blocks', 'wp-element', 'wp-components', 'wp-editor'],
        filemtime(plugin_dir_path(__FILE__) . 'block/index.js'),
        true
    );
});

require_once plugin_dir_path(__FILE__) . 'includes/class-wp-book-dashboard-widget.php';
new Wp_Book_Dashboard_Widget();
