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

return [

	'slug'                => dirname( dirname( plugin_basename( __FILE__ ) ) ),
	'version'             => '1.0.6',
	'interval'            => ( 24 * 60 * 60 ) * 1,
	'minimum_wp_version'  => '4.0.0',
	'minimum_php_version' => '5.6',
];
