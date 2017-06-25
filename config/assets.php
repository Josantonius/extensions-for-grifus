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

$icons = App::ExtensionsForGrifus()->get('url', 'icons');
$css   = App::ExtensionsForGrifus()->get('url', 'css');
$js    = App::ExtensionsForGrifus()->get('url', 'js');

return [

    'assets' => [

        'js' => [
            'eliasisMaterial' => [
                'name'      => 'eliasisMaterial',
                'url'       => $js . 'eliasis-material.min.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [],
            ],
            'extensionsForGrifusAdmin' => [
                'name'      => 'extensionsForGrifusAdmin',
                'url'       => $js . 'extensions-for-grifus-admin.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [
                    'ajax_url'  => admin_url('admin-ajax.php'),
                    'icons_url' => $icons,
                ],
            ],
        ],

        'css' => [
            'extensionsForGrifusAdmin' => [
                'name'      => 'extensionsForGrifusAdmin',
                'url'       => $css . 'extensions-for-grifus-admin.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.0.0',
                'media'     => '',
            ],
        ],
    ],
];
