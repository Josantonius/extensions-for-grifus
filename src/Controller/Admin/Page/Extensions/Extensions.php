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

namespace ExtensionsForGrifus\Controller\Admin\Page\Extensions;

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Eliasis\App\App,
    Eliasis\Complement\Type\Module\Module,
    Eliasis\Controller\Controller;

/**
 * Handler Extensions Grifus page.
 *
 * @since 1.0.0
 */
class Extensions extends Controller {
    
    /**
     * Slug for this administration page.
     *
     * @since 1.0.0
     *
     * @var string $page
     */
    public $slug = 'extensions-for-grifus';
    
    /**
     * Class initializer method. It starts when the submenu is loaded.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function init() {}

    /**
     * Add menu and instance to associated method to display the page.
     * 
     * @since 1.0.0
     *
     * @return void
     */
    public function setMenu() {

        WP_Menu::add(
            'menu', 
            App::ExtensionsForGrifus()->get('menu', 'top-level'), 
            [$this, 'render']
        );
    }

    /**
     * Load scripts.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function addScripts() {

        $js = App::ExtensionsForGrifus()->get('assets', 'js');

        WP_Register::add('script', $js['eliasisModule']);
        
        WP_Register::add('script', $js['eliasisMaterial']);

        WP_Register::add('script', $js['extensionsForGrifusAdmin']);
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function addStyles() {

        WP_Register::add(
            'style', 
            App::ExtensionsForGrifus()->get(
                'assets', 
                'css', 
                'extensionsForGrifusAdmin'
            )
        ); 

        WP_Register::add(
            'style', 
            App::ExtensionsForGrifus()->get(
                'assets', 
                'css', 
                'eliasisModule'
            )
        );
    }

    /**
     * Renderizate admin page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function render() {

        App::id('ExtensionsForGrifus');

        $layout = App::get('path', 'layout');

        $this->view->renderizate($layout, 'header');

        Module::render('wp-plugin-extension', App::get('remote-modules'));

        $this->view->renderizate($layout, 'footer');     
    }
}
