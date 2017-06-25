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

$DS = DIRECTORY_SEPARATOR;

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use Eliasis\App\App;

if (!defined('WP_UNINSTALL_PLUGIN')) {

    exit();
}

App::run(__DIR__, 'wordpress-plugin', 'ExtensionsForGrifus');

App::ExtensionsForGrifus()->instance('Uninstall', 'controller')->removeAll();