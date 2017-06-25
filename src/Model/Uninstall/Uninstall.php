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

namespace ExtensionsForGrifus\Model\Uninstall;

use Eliasis\Model\Model,
    Eliasis\App\App;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.0
 */
class Uninstall extends Model { 
    
    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.0
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public function removeAll() {

        $slug = App::ExtensionsForGrifus()->get('slug');

        delete_option($slug . '-version');
        delete_option($slug . '-check-updates');
        // For site options in Multisite
        delete_site_option($slug . '-version');
        delete_site_option($slug . '-check-updates');  
    }
}
