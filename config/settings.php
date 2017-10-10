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

return [

	'slug' 				  => dirname(dirname(plugin_basename( __FILE__))),
	'version'             => '1.0.5',
    'interval'            => (24*60*60) * 1, // once a day
    'minimum_wp_version'  => '4.0.0',
    'minimum_php_version' => '5.6',
];
