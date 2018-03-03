<?php
/**
 * Extensions For Grifus WordPress plugin.
 *
 * Plugin Name: Extensions For Grifus
 * Plugin URI:  https://wordpress.org/plugins/extensions-for-grifus/
 * Description: Extensions for Grifus theme.
 * Version:     1.0.6
 * Author:      Josantonius
 * Author URI:  https://josantonius.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: extensions-for-grifus
 * Domain Path: /languages
 * Text Domain: extensions-for-grifus-images
 * Domain Path: /modules/custom-images-grifus/languages
 * Text Domain: extensions-for-grifus-rating
 * Domain Path: /modules/custom-rating-grifus/languages
 * Text Domain: extensions-for-grifus-copy
 * Domain Path: /modules/copy-movie-grifus/languages
 */

use Eliasis\Framework\App;

/**
 * Don't expose information if this file called directly.
 */
if ( ! function_exists( 'add_action' ) || ! defined( 'ABSPATH' ) ) {
	echo 'I can do when called directly.';
	die;
}

/**
 * Classloader.
 */
require 'vendor/autoload.php';

/**
 * Start application.
 */
App::run( __DIR__, 'wordpress-plugin', 'EFG' );

/**
 * Get main instance.
 */
$launcher = App::getControllerInstance( 'Launcher', 'controller' );

/**
 * Register hooks.
 */
register_activation_hook( __FILE__, [ $launcher, 'activation' ] );

register_deactivation_hook( __FILE__, [ $launcher, 'deactivation' ] );

/**
 * Launch application.
 */
$launcher->init();
