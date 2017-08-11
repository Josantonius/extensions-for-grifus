<?php
/**
 * Extensions For Grifus WordPress plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Extensions-For-Grifus.git
 * @since      1.0.0
 */

use Eliasis\App\App;

$iconsUrl = App::ExtensionsForGrifus()->get('url', 'icons');

return [

	'menu' => [
		'top-level' => [
			'title'      => __('Extensions For Grifus theme', 'custom-images-grifus'),
			'name'       => __('Grifus Extensions', 'extensions-for-grifus'),
			'capability' => 'manage_options',
			'slug'       => 'extensions-for-grifus',
			'function'   => '',
			'icon_url'   => $iconsUrl . 'extensions-grifus-admin.png',
			'position'   => 25,
		],
	],
];
