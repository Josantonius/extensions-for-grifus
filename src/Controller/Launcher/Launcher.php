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
    Eliasis\Complement\Type\Module\Module,
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

        $this->model->setModuleStates();

        add_action('upgrader_process_complete',

            [$this, 'AfterUpgradePlugin'], 10, 2
        );
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

        if (!function_exists('grifus_users')) {

            deactivate_plugins(basename( __FILE__ ));

            $message = __(
                
                'Extensions For Grifus requires "Grifus theme".', 
                'extensions-for-grifus'
            );

            wp_die($message);
        }

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
     * Check if it is after inserting or updating post.
     * 
     * @since 1.0.0
     *
     * @param object $post → (WP_Post) post object
     * 
     * @return boolean
     */
    public function isAfterInsertPost($post, $update) {

        if (!isset($post->post_status, $post->post_type)) {

            return false;
        }

        $isRevision = ($post->post_type   == 'revision');
        $isInherit  = ($post->post_status == 'inherit');

        return ($isRevision && $isInherit && !$update);
    }

    /**
     * Check if it is after updating post.
     * 
     * @since 1.0.1
     *
     * @param object $post   → (WP_Post) post object
     * @param object $update → true if update post
     * 
     * @return boolean
     */
    public function isAfterUpdatePost($post, $update) {

        return ($this->isPublishPost($post) && $update);
    }

    /**
     * Check if it is a publication page and published.
     * 
     * @since 1.0.1
     *
     * @param object $post   → (WP_Post) post object
     * @param object $update → true if update post
     * 
     * @return boolean
     */
    public function isPublishPost($post) {

        if (!isset($post->post_status, $post->post_type)) {

            return false;
        }

        $isPost    = ($post->post_type   == 'post');
        $isPublish = ($post->post_status == 'publish');

        return ($isPost && $isPublish);
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

    /**
     * Run after updating the plugin to install the modules that were in use.
     * 
     * @since 1.0.3
     *
     * @param object $upgraderObject → upgrader object
     * @param array  $options        → upgrader options
     * 
     * @return void
     */
    public function AfterUpgradePlugin($upgraderObject, $options) {

        $slug = App::ExtensionsForGrifus()->get('slug');

        $pathName = plugin_basename(App::ROOT() . $slug . '.php');

        if ($options['action'] == 'update' && 
            $options['type']   == 'plugin' &&
            in_array($pathName, $options['plugins'])) {

            $modules = json_decode(get_option($slug . '-modules-states'), 1);

            $remote = App::get('remote-modules');

            foreach ($modules['ExtensionsForGrifus'] as $module => $value) {

                $state = $modules['ExtensionsForGrifus'][$module]['state'];

                if ($state != 'uninstalled') {

                    Module::load($remote[$module]);

                    Module::$module()->install();

                    Module::$module()->setState($state);
                }
            }
            
        }
    }
}
