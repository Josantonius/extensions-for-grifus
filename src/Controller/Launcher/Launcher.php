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
                                                                          
namespace ExtensionsForGrifus\Controller\Launcher;

use Josantonius\Hook\Hook,
    Eliasis\Controller\Controller,
    Eliasis\Module\Module,
    Eliasis\App\App;
                                                                              
/**
 * Main plugin launcher.
 *
 * @since 1.0.0
 */
class Launcher extends Controller {

    /**
     * Class initializer method.
     * 
     * @since 1.0.0
     *
     * @return
     */
    public function init() {

        if (is_admin()) {

            $this->admin();
        }

        App::ExtensionsForGrifus()->set('main', $this);

        Hook::getInstance(App::$id);

        Hook::doAction('launch-modules');
    }

    /**
     * Hook plugin activation | Executed only when activating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer() → user was referred from admin page
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function activation() {

        check_admin_referer("activate-plugin_{$_REQUEST['plugin']}");

        $this->model->setOptions();

        flush_rewrite_rules();
    }

    /**
     * Hook plugin deactivation. Executed when deactivating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer() → tests if the current request is valid 
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function deactivation() {

        check_admin_referer("deactivate-plugin_{$_REQUEST['plugin']}");

        flush_rewrite_rules();
    }

    /**
     * Admin initializer method.
     * 
     * @since 1.0.0
     */
    public function admin() {

        add_action('init', [$this, 'setLanguage']);

        $this->setMenus(

            App::ExtensionsForGrifus()->get('pages'),
            App::ExtensionsForGrifus()->get('namespaces', 'admin-page')
        );
    }

    /**
     * Set plugin texdomain for translations.
     * 
     * @since 1.0.0
     */
    public function setLanguage() {
                
        $slug = App::ExtensionsForGrifus()->get('slug');

        load_plugin_textdomain(
            $slug, 
            false, 
            $slug . App::DS . 'languages' . App::DS
        );
    }

    /**
     * Get current page and load submenu.
     *
     * @since 1.0.0
     *
     * @param array  $pages 
     * @param string $namespace
     *
     * @return
     */
    public function setMenus($pages = [], $namespace = '') {

        foreach ($pages as $page) {

            $page = $namespace . $page . '\\' . $page;

            if (!class_exists($page)) { continue; }

            $instance = call_user_func($page . '::getInstance');

            if (method_exists($instance, 'init')) {
                
                call_user_func([$instance, 'init']);
            }

            if (method_exists($instance, 'setMenu')) {
                
                call_user_func([$instance, 'setMenu']);
            }

            if (method_exists($instance, 'setSubmenu')) {
                
                call_user_func([$instance, 'setSubmenu']);
            }
        }
    }

    /**
     * Check if it is after inserting post.
     * 
     * @since 1.0.0
     * 
     * @return boolean
     */
    public function isAfterInsertPost() {

        if (!is_admin()) {

            return false;
        }

        $current = get_current_screen();

        if (isset($current->id)) {

            return ($current->id === 'post' && $current->action === '');
        }

        return false;
    }

    /**
     * Check if it is front and single page.
     * 
     * @since 1.0.0
     * 
     * @return boolean
     */
    public function isSingle() {

        if (is_admin()) {

            return false;
        }

        return (is_single() && is_numeric(get_the_ID()));
    }
}
