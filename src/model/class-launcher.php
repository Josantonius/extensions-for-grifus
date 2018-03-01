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

use Eliasis\Framework\Model,
	Eliasis\Framework\App;

/**
 * Main plugin launcher model.
 */
class Launcher extends Model {

	/**
	 * Set plugin version and plugin options.
	 *
	 * @uses get_option()    → option value based on an option name
	 * @uses add_option()    → add a new option to WordPress options
	 * @uses update_option() → update a named option/value
	 */
	public function set_options() {

		$slug = App::EFG()->getOption( 'slug' );

		$installed_version = get_option( $slug . '-version' );

		$actual_version = App::EFG()->getOption( 'version' );

		if ( ! $installed_version ) {
			add_option( $slug . '-version', $actual_version );
			add_option( $slug . '-check-updates', 0 );

		} else {

			if ( $installed_version < $actual_version ) {
				update_option( $slug . '-version', $actual_version );
				update_option( $slug . '-check-updates', 0 );
			}
		}
	}

	/**
	 * Run after set complement state.
	 *
	 * @since 1.0.4
	 *
	 * @param string $slug   → application slug.
	 * @param string $states → modules states.
	 *
	 * @uses get_option()    → option value based on an option name
	 * @uses add_option()    → add a new option to WordPress options
	 * @uses update_option() → update a named option/value
	 */
	public function save_modules_states( $slug, $states ) {

		if ( get_option( $slug . '-modules-states' ) !== false ) {
			update_option( $slug . '-modules-states', $states );

		} else {
			add_option( $slug . '-modules-states', $states );
		}
	}
}
