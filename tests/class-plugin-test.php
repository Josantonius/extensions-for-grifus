<?php
/**
 * Extensions For Grifus WordPress plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/extensions-for-grifus
 * @copyright 2017 - 2018 (c) Josantonius - Extensions For Grifus
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/extensions-for-grifus.git
 * @since     1.0.6
 */

namespace EFG\Tests;

use Eliasis\Framework\App;

/**
 * Tests class for Extensions For Grifus plugin.
 */
final class Plugin_Test extends \WP_UnitTestCase {

	/**
	 * App instance.
	 *
	 * @var object
	 */
	protected $app;

	/**
	 * Launcher instance.
	 *
	 * @var object
	 */
	protected $launcher;

	/**
	 * Set up.
	 */
	public function setUp() {

		parent::setUp();

		$this->app = new App();

		$app = $this->app;

		$app::run( __DIR__ . '/../', 'wordpress-plugin', 'EFG' );

		$this->launcher = $app::getControllerInstance( 'Launcher' );

		register_activation_hook( __FILE__, [ $this->launcher, 'activation' ] );

		register_deactivation_hook( __FILE__, [ $this->launcher, 'deactivation' ] );

		$this->launcher->init();
	}

	/**
	 * Check if it is an instance of.
	 */
	public function test_is_instance_of() {

		$this->assertInstanceOf(
			'Eliasis\Framework\App',
			$this->app
		);

		$this->assertInstanceOf(
			'EFG\Controller\Launcher',
			$this->launcher
		);
	}
}
