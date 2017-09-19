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

namespace ExtensionsForGrifus\Controller\Uninstall;

use Eliasis\Module\Module,
	Eliasis\Controller\Controller;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.0
 */
class Uninstall extends Controller { 
    
    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.0
     */
    public function removeAll() {

    	$module = Module::getInfo('wp-plugin-extension');

        foreach ($module as $key => $value) {
        	
        	Module::remove($module[$key]['id']);
        }

        $this->model->removeAll();   
    }
}
