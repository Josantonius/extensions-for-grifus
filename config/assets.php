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

use Eliasis\Framework\App;
use Eliasis\Complement\Type\Module;

$icons_url = App::EFG()->getOption( 'url', 'icons' );
$css_url   = App::EFG()->getOption( 'url', 'css' );
$js_url    = App::EFG()->getOption( 'url', 'js' );

return [

	'assets' => [

		'js'  => [
			'eliasisMaterial' => [
				'name'    => 'eliasisMaterial',
				'url'     => $js_url . 'eliasis-material.min.js',
				'place'   => 'admin',
				'deps'    => [ 'jquery' ],
				'version' => '1.0.0',
				'footer'  => true,
				'params'  => [],
			],
			'extensionsForGrifusAdmin' => [
				'name'    => 'extensionsForGrifusAdmin',
				'url'     => $js_url . 'extensions-for-grifus-admin.min.js',
				'place'   => 'admin',
				'deps'    => [ 'jquery' ],
				'version' => '1.0.0',
				'footer'  => true,
				'params'  => [
					'ajax_url'  => admin_url( 'admin-ajax.php' ),
					'icons_url' => $icons_url,
				],
			],
			'eliasisModule' => [
				'name'    => 'eliasisModule',
				'url'     => Module::script(),
				'place'   => 'admin',
				'version' => '1.0.0',
				'footer'  => true,
				'params'  => [],
			],
		],

		'css' => [
			'extensionsForGrifusAdmin' => [
				'name'    => 'extensionsForGrifusAdmin',
				'url'     => $css_url . 'extensions-for-grifus-admin.min.css',
				'place'   => 'admin',
				'deps'    => [],
				'version' => '1.0.0',
				'media'   => '',
			],
			'eliasisModule' => [
				'name'    => 'eliasisModule',
				'url'     => Module::style(),
				'place'   => 'admin',
				'deps'    => [],
				'version' => '1.0.0',
				'media'   => '',
			],
		],
	],
];
