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

namespace EFG\Controller\Admin\Page;

use Josantonius\WP_Register\WP_Register;
use Josantonius\WP_Menu\WP_Menu;
use Eliasis\Framework\App;
use Eliasis\Framework\Controller;
use Eliasis\Complement\Type\Module;


/**
 * Handler Extensions Grifus page.
 */
class Extensions extends Controller {

	/**
	 * Slug for this administration page.
	 *
	 * @var string $page
	 */
	public $slug = 'extensions-for-grifus';

	/**
	 * Class initializer method. It starts when the submenu is loaded.
	 */
	public function init() {}

	/**
	 * Add menu and instance to associated method to display the page.
	 */
	public function set_menu() {

		WP_Menu::add(
			'menu',
			App::EFG()->getOption( 'menu', 'top-level' ),
			[ $this, 'render' ],
			[ $this, 'add_scripts' ],
			[ $this, 'add_styles' ]
		);
	}

	/**
	 * Load scripts.
	 */
	public function add_scripts() {

		$js = App::EFG()->getOption( 'assets', 'js' );

		WP_Register::add( 'script', $js['eliasisModule'] );
		WP_Register::add( 'script', $js['eliasisMaterial'] );
		WP_Register::add( 'script', $js['extensionsForGrifusAdmin'] );
	}

	/**
	 * Load styles.
	 */
	public function add_styles() {

		WP_Register::add(
			'style',
			App::EFG()->getOption(
				'assets',
				'css',
				'extensionsForGrifusAdmin'
			)
		);

		WP_Register::add(
			'style',
			App::EFG()->getOption(
				'assets',
				'css',
				'eliasisModule'
			)
		);
	}

	/**
	 * Renderizate admin page.
	 */
	public function render() {

		App::setCurrentID( 'EFG' );

		$layout = App::getOption( 'path', 'layout' );
		$this->view->renderizate( $layout, 'header' );

		Module::render(
			'wp-plugin-extension',
			App::getOption( 'remote-complements' ),
			'asort',
			[
				'active' => 'activo',
				'activate' => 'activar',
				'install' => 'instalar',
				'update' => 'actualizar',
				'uninstall' => 'desinstalar',
			]
		);
		$this->view->renderizate( $layout, 'footer' );
	}
}
