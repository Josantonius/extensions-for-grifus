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

$icons_url = App::EFG()->getOption( 'url', 'icons' );

return [

	'menu' => [
		'top-level' => [
			'title'      => __(
				'Extensions For Grifus theme',
				'extensions-for-grifus'
			),
			'name'       => __(
				'Grifus Extensions',
				'extensions-for-grifus'
			),
			'capability' => 'manage_options',
			'slug'       => 'extensions-for-grifus',
			'function'   => '',
			'icon_url'   => $icons_url . 'extensions-grifus-admin.png',
			'position'   => 25,
		],
	],
];
