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

$root_path = App::ROOT();

return [

	'path' => [

		'modules'   => $root_path . 'modules/',
		'plugins'   => $root_path . 'plugins/',
		'public'    => $root_path . 'public/',
		'layout'    => $root_path . 'src/template/layout/',
		'page'      => $root_path . 'src/template/page/',
	],
];
