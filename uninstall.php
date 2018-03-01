<?php
/**
 * Extensions For Grifus WordPress plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/extensions-for-grifus
 * @copyright 2017 - 2018 (c) Josantonius - Extensions For Grifus
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/extensions-for-grifus.git
 * @since     1.0.0
 */

require 'lib/vendor/autoload.php';

use Eliasis\App\App;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit();
}

App::run( __DIR__, 'wordpress-plugin', 'EFG' );

App::EFG()->getControllerInstance( 'Uninstall', 'controller' )->removeAll();
