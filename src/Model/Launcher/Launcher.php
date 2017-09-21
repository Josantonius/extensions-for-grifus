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

namespace ExtensionsForGrifus\Model\Launcher;

use Eliasis\Model\Model,
    Eliasis\App\App;

/**
 * Main plugin launcher model.
 *
 * @since 1.0.0
 */
class Launcher extends Model {

    /**
     * Set plugin version and plugin options.
     * 
     * @since 1.0.0
     *
     * @uses get_option()    → option value based on an option name
     * @uses add_option()    → add a new option to Wordpress options
     * @uses update_option() → update a named option/value
     *
     * @return void
     */
    public function setOptions() {

        $slug = App::ExtensionsForGrifus()->get('slug');

        $actualVersion = App::ExtensionsForGrifus()->get('version');

        if (!$installed_version = get_option($slug . '-version')) {

            add_option($slug . '-version', $actualVersion);
            add_option($slug . '-check-updates', 0);
        
        } else {

            if ($installed_version < $actualVersion) {

                update_option($slug . '-version', $actualVersion);
                update_option($slug . '-check-updates', 0);
            }
        }
    }

    /**
     * Set module states.
     * 
     * @since 1.0.3
     *
     * @param array $states → modules states
     *
     * @uses get_option()    → option value based on an option name
     * @uses add_option()    → add a new option to Wordpress options
     * @uses update_option() → update a named option/value
     *
     * @return void
     */
    public function setModuleStates($states) {

        $slug = App::ExtensionsForGrifus()->get('slug');

        $states = json_encode($states, true);

        if (get_option($slug . '-modules-states') !== false) {

            update_option($slug . '-modules-states', $states);
         
        } else {
         
            add_option($slug . '-modules-states', $states);
        }
    }
}
