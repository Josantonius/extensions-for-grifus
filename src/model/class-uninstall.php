<?php
/**
 * Extensions For Grifus WordPress plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   Josantonius\Extensions-For-Grifus
 * @copyright 2017 - 2018 (c) Josantonius - Extensions For Grifus
 * @license   GPL-2.0+
 * @link      https://github.com/Josantonius/Extensions-For-Grifus.git
 * @since     1.0.0
 */

namespace EFG\Model;

use Eliasis\Framework\Model;
use Eliasis\Framework\App;

/**
 * Main method for cleaning and removal of components.
 */
class Uninstall extends Model {

	/**
	 * Remove and uninstall the plugin components.
	 *
	 * @uses delete_option()      → removes option by name
	 * @uses delete_site_option() → removes a option by name
	 *
	 * @return void
	 */
	public function remove_all() {

		$slug = App::EFG()->getOption( 'slug' );

		delete_option( $slug . '-version' );
		delete_option( $slug . '-check-updates' );
		delete_option( $slug . '-modules-states' );

		delete_option( 'wp_register_files' );

		delete_site_option( $slug . '-version' );
		delete_site_option( $slug . '-check-updates' );
		delete_site_option( $slug . '-modules-states' );

		delete_site_option( 'wp_register_files' );
	}
}
