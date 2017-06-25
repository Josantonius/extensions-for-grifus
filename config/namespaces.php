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

$pluginName = 'ExtensionsForGrifus';

return [

    'namespaces' => [

        'modules'         => $pluginName . '\\Modules\\',
        'admin-page'      => $pluginName . '\\Controller\\Admin\\Page\\',
        'admin-component' => $pluginName . '\\Controller\\Admin\\Component\\',
        'controller'      => $pluginName . '\\Controller\\',
    ],
];
