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

$url = App::PUBLIC_URL();

return [

    'url' => [

        'js'             => $url . 'js/'     ,
        'css'            => $url . 'css/'    ,
        'icons'          => $url . 'images/icons/',
        'wp-plugins'     => 'https://wordpress.org/support/plugin/',
        'github-api'     => 'https://api.github.com/repos/',
        'github-content' => 'https://raw.githubusercontent.com/Josantonius/',
    ],
];
