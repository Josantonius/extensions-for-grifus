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

$plugin_name = 'EFG';

return [

	'namespaces' => [

		'modules'         => $plugin_name . '\\Modules\\',
		'plugins'         => $plugin_name . '\\Plugins\\',
		'admin-page'      => $plugin_name . '\\Controller\\Admin\\Page\\',
		'admin-component' => $plugin_name . '\\Controller\\Admin\\Component\\',
		'controller'      => $plugin_name . '\\Controller\\',
	],
];
