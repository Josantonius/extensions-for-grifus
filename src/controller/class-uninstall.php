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

namespace EFG\Controller;

use Eliasis\Complement\Type\Module;
use Eliasis\Framework\Controller;

/**
 * Main method for cleaning and removal of components.
 */
class Uninstall extends Controller {

	/**
	 * Remove and uninstall the plugin components.
	 */
	public function remove_all() {

		$module = Module::getList( 'wp-plugin-extension' );

		foreach ( $modules as $module ) {
			$name = $module['id'];
			Module::$name()->remove();
		}

		$this->model->remove_all();
	}
}
