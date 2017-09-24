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

use Eliasis\App\App,
    Eliasis\Complement\Type\Module\Module;

$_icons = App::ExtensionsForGrifus()->get('url', 'icons');
$_css   = App::ExtensionsForGrifus()->get('url', 'css');
$_js    = App::ExtensionsForGrifus()->get('url', 'js');

return [

    'assets' => [

        'js' => [
            'eliasisMaterial' => [
                'name'      => 'eliasisMaterial',
                'url'       => $_js . 'eliasis-material.min.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [],
            ],
            'extensionsForGrifusAdmin' => [
                'name'      => 'extensionsForGrifusAdmin',
                'url'       => $_js . 'extensions-for-grifus-admin.min.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [
                    'ajax_url'  => admin_url('admin-ajax.php'),
                    'icons_url' => $_icons,
                ],
            ],
            'eliasisModule' => [
                'name'      => 'eliasisModule',
                'url'       => Module::script(),
                'place'     => 'admin',
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [],
            ],
        ],

        'css' => [
            'extensionsForGrifusAdmin' => [
                'name'      => 'extensionsForGrifusAdmin',
                'url'       => $_css . 'extensions-for-grifus-admin.min.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.0.0',
                'media'     => '',
            ],
            'eliasisModule' => [
                'name'      => 'eliasisModule',
                'url'       => Module::style(),
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.0.0',
                'media'     => '',
            ],
        ],
    ],
];
