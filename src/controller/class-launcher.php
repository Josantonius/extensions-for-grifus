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

use Josantonius\WP_Register\WP_Register;
use Josantonius\Hook\Hook;
use Eliasis\Framework\App;
use Eliasis\Framework\Controller;
use Eliasis\Complement\Type\Module;

/**
 * Main plugin launcher.
 */
class Launcher extends Controller {

	/**
	 * Class initializer method.
	 */
	public function init() {

		if ( is_admin() ) {
			$this->admin();
		}

		WP_Register::unify(
			'eliasis', [
				'styles'  => App::EFG()->getOption( 'url', 'css' ) . 'min/',
				'scripts' => App::EFG()->getOption( 'url', 'js' ) . 'min/',
			], true
		);

		App::EFG()->setOption( 'main', $this );

		Hook::getInstance( App::getCurrentID() );
		Hook::doAction( 'launch-modules' );

		add_action(
			'upgrader_process_complete',
			[ $this, 'after_upgrade_plugin' ], 10, 2
		);
	}

	/**
	 * Hook plugin activation | Executed only when activating the plugin.
	 *
	 * @uses check_admin_referer() → user was referred from admin page
	 * @uses flush_rewrite_rules() → remove rewrite rules and recreate
	 */
	public function activation() {

		if ( ! function_exists( 'grifus_users' ) ) {

			deactivate_plugins( basename( __FILE__ ) );

			$message = __(
				'Extensions For Grifus requires "Grifus theme".',
				'extensions-for-grifus'
			);

			wp_die( filter_var( $message, FILTER_SANITIZE_STRING ) );
		}

		$plugin = isset( $_REQUEST['plugin'] ) ? filter_var( wp_unslash( $_REQUEST['plugin'] ), FILTER_SANITIZE_STRING ) : null;

		check_admin_referer( "activate-plugin_$plugin" );

		$this->model->set_options();

		flush_rewrite_rules();
	}

	/**
	 * Hook plugin deactivation. Executed when deactivating the plugin.
	 *
	 * @uses check_admin_referer() → tests if the current request is valid
	 * @uses flush_rewrite_rules() → remove rewrite rules and recreate
	 */
	public function deactivation() {

		$plugin = isset( $_REQUEST['plugin'] ) ? filter_var( wp_unslash( $_REQUEST['plugin'] ), FILTER_SANITIZE_STRING ) : null;

		check_admin_referer( "deactivate-plugin_$plugin" );

		flush_rewrite_rules();
	}

	/**
	 * Admin initializer method.
	 */
	public function admin() {

		add_action( 'init', [ $this, 'set_language' ] );

		$this->set_menus(
			App::EFG()->getOption( 'pages' ),
			App::EFG()->getOption( 'namespaces', 'admin-page' )
		);

		$this->save_modules_states();
	}

	/**
	 * Set plugin texdomain for translations.
	 */
	public function set_language() {

		$slug = App::EFG()->getOption( 'slug' );

		load_plugin_textdomain(
			$slug,
			false,
			$slug . '/languages/'
		);
	}

	/**
	 * Get current page and load submenu.
	 *
	 * @param array  $pages     → pages IDs.
	 * @param string $namespace → page namespace.
	 */
	public function set_menus( $pages = [], $namespace = '' ) {

		foreach ( $pages as $page ) {

			$page = $namespace . $page;

			if ( ! class_exists( $page ) ) {
				continue;
			}

			$instance = call_user_func( $page . '::getInstance' );

			if ( method_exists( $instance, 'init' ) ) {
				call_user_func( [ $instance, 'init' ] );
			}

			if ( method_exists( $instance, 'set_menu' ) ) {
				call_user_func( [ $instance, 'set_menu' ] );
			}

			if ( method_exists( $instance, 'set_submenu' ) ) {
				call_user_func( [ $instance, 'set_submenu' ] );
			}
		}
	}

	/**
	 * Check if it is after inserting or updating post.
	 *
	 * @param object  $post      → (WP_Post) post object.
	 * @param boolean $is_update → true if update post.
	 *
	 * @return boolean
	 */
	public function is_after_insert_post( $post, $is_update ) {

		if ( ! isset( $post->post_status, $post->post_type ) ) {
			return false;
		}

		$is_revision = ( 'revision' === $post->post_type );
		$is_inherit  = ( 'inherit' === $post->post_status );

		return ( $is_revision && $is_inherit && ! $is_update );
	}

	/**
	 * Check if it is after updating post.
	 *
	 * @since 1.0.1
	 *
	 * @param object $post   → (WP_Post) post object.
	 * @param object $update → true if update post.
	 *
	 * @return boolean
	 */
	public function is_after_update_post( $post, $update ) {

		return ( $this->is_publish_post( $post ) && $update );
	}

	/**
	 * Check if it is a publication page and published.
	 *
	 * @since 1.0.1
	 *
	 * @param object $post   → (WP_Post) post object.
	 *
	 * @return boolean
	 */
	public function is_publish_post( $post ) {

		if ( ! isset( $post->post_status, $post->post_type ) ) {
			return false;
		}

		$is_post    = ( 'post' === $post->post_type );
		$is_publish = ( 'publish' === $post->post_status );

		return ( $is_post && $is_publish );
	}

	/**
	 * Check if it is front and single page.
	 *
	 * @return boolean
	 */
	public function is_single() {

		if ( is_admin() ) {
			return false;
		}

		return ( is_single() && is_numeric( get_the_ID() ) );
	}

	/**
	 * Run after set complement state.
	 *
	 * @since 1.0.4
	 */
	public function save_modules_states() {

		$states = @file_get_contents( App::MODULES() . '.modules-states.json' );

		if ( false !== $states ) {
			$slug = App::EFG()->getOption( 'slug' );
			$this->model->save_modules_states( $slug, $states );
		}
	}

	/**
	 * Run after updating the plugin to install the modules that were in use.
	 *
	 * @since 1.0.3
	 *
	 * @param object $upgrader_object → upgrader object.
	 * @param array  $options         → upgrader options.
	 */
	public function after_upgrade_plugin( $upgrader_object, $options ) {

		$slug = App::EFG()->getOption( 'slug' );

		$path_name = plugin_basename( App::ROOT() . $slug . '.php' );

		if ( 'update' === $options['action'] &&
			'plugin' === $options['type'] &&
			in_array( $path_name, $options['plugins'] ) ) {

			$modules = json_decode( get_option( $slug . '-modules-states' ), 1 );

			$remote = App::getOption( 'remote-modules' );

			foreach ( $modules['EFG'] as $module ) {
				$state = $modules['EFG'][ $module ]['state'];
				if ( 'uninstalled' !== $state ) {
					Module::load( $remote[ $module ] );
					Module::$module()->install();
					Module::$module()->setState( $state );
				}
			}
		}
	}
}
