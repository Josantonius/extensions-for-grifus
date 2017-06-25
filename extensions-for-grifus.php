<?php
/**
 * Extensions For Grifus WordPress plugin.
 *
 * Plugin Name: Extensions For Grifus
 * Plugin URI:  https://wordpress.org/plugins/extensions-for-grifus/
 * Description: Extensions for Grifus theme.
 * Version:     1.0.0
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

use Eliasis\App\App;

$DS = DIRECTORY_SEPARATOR;

/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

/** 
 * Classloader.
 */
require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

/** 
 * Start application.
 */
App::run(__DIR__, 'wordpress-plugin', 'ExtensionsForGrifus');

/** 
 * Get main instance.
 */
$Launcher = App::instance('Launcher', 'controller');

/** 
 * Register hooks.
 */
register_activation_hook(__FILE__, [$Launcher, 'activation']);

register_deactivation_hook(__FILE__, [$Launcher, 'deactivation']);

/** 
 * Launch application.
 */
$Launcher->init();
?>