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
    Eliasis\Module\Module,
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
     * Errors if module installation or update fails.
     *
     * @since 1.0.0
     *
     * @var string $error
     */
    public $error = false;

    /**
     * Class initializer method. It starts when the submenu is loaded.
     *
     * @since 1.0.0
     */
    public function init() {

        $this->runAjax();
    }

    /**
     * Run ajax.
     * 
     * @since 1.0.0
     */
    public function runAjax() {

        add_action(
            'wp_ajax_moduleStatusHandler', 
            [$this, 'moduleStatusHandler']
        );
    }

    /**
     * Add menu and instance to associated method to display the page.
     * 
     * @since 1.0.0
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
     */
    public function addScripts() {

        $js = App::ExtensionsForGrifus()->get('assets', 'js');

        WP_Register::add('script', $js['eliasisMaterial']);

        $settings = $js['extensionsForGrifusAdmin'];

        $params = [
            'custom_nonce' => wp_create_nonce('extensionsForGrifusAdmin'),
            'updating'     => __('Updating', 'extensions-for-grifus'),
            'installing'   => __('Installing', 'extensions-for-grifus'),
        ];

        $settings['params'] = array_merge($settings['params'], $params);

        WP_Register::add('script', $settings);
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
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
    }

    /**
     * Get modules info.
     *
     * @since 1.0.0
     */
    public function getModulesInfo() {

        $data = Module::getModulesInfo('wp-plugin-extension');

        foreach ($data as $key => $value) {

            $slug = $data[$key]['slug'];

            $name = $data[$key]['id'];

            $version = $data[$key]['version'];

            $state = ($data[$key]['state'] === 'active');

            if ($state && $this->hasNewVersion($slug, $version)) {

                $data[$key]['state'] = 'outdated';

                Module::$name('setState', 'outdated');
            }

            $data[$key]['show-uninstall-button'] = 'style="display:none;"';

            switch ($data[$key]['state']) {

                case 'installed':
                case 'inactive':

                    $data[$key]['stateText'] = __(
                        'activate', 'extensions-for-grifus'
                    );

                    $data[$key]['show-uninstall-button'] = '';
                    break;

                case 'uninstalled':
                    $data[$key]['stateText'] = __(
                        'install', 'extensions-for-grifus'
                    );
                    break;

                case 'active':
                    $data[$key]['stateText'] = __(
                        'active', 'extensions-for-grifus'
                    );
                    break;

                case 'outdated':
                    $data[$key]['stateText'] = __(
                        'update', 'extensions-for-grifus'
                    );
                    break;
            }

            $moduleUrl = App::MODULES_URL() . $slug . '/public/images/';

            $data[$key]['image'] = $moduleUrl . $slug .'.png';
        }        

        return array_reverse($data);
    }

    /**
     * Module status handler.
     *
     * @since 1.0.0
     */
    public function moduleStatusHandler() {

        $nonce = isset($_POST['custom_nonce']) ? $_POST['custom_nonce'] : '';

        if (!wp_verify_nonce($nonce, 'extensionsForGrifusAdmin')) {
            
            die('Busted!');
        }

        $response = false;

        App::id('ExtensionsForGrifus');

        if (isset($_POST['id']) && isset($_POST['state'])) {

            $moduleID = $_POST['id'];

            if ($_POST['state'] === 'uninstall') {

                $state = $this->uninstallModule($moduleID);
                
            } else {

                $state = Module::changeState($moduleID);
            }

            switch ($state) {
                case 'active':
                    $text = __('active', 'extensions-for-grifus');
                    break;
                
                case 'inactive':
                    $text = __('activate', 'extensions-for-grifus');
                    break;

                case 'uninstalled':
                    $text = __('install', 'extensions-for-grifus');
                    break;

                case 'installed':
                case 'updated':

                    $path  = App::path('modules');
                    $files = App::module($moduleID);
                    $slug  = key($files);

                    $this->uninstallModule($moduleID);
                    
                    if ($this->installModule($files, $path, $slug) === true) {

                        if ($state === 'updated') {

                            Module::$moduleID('setState', 'updated');
                            $text = __('active', 'extensions-for-grifus');
                        
                        } else {

                            Module::$moduleID('setState', 'active');
                            $text = __('activate', 'extensions-for-grifus');
                        }

                        $state = Module::changeState($moduleID);

                    } else {

                        $this->uninstallModule($moduleID);
                        Module::$moduleID('setState', 'remove');
                        $state = Module::changeState($moduleID);
                        $text = __('install', 'extensions-for-grifus');
                    }

                    break;
            }

            $response = [

                'id'        => $_POST['id'],
                'state'     => $state,
                'stateText' => $text,
                'error'     => $this->error,
            ];
        }

        echo json_encode($response, true);

        die();
    }

    /**
     * Install module.
     *
     * @since 1.0.0
     *
     * @param string $module → module files
     *
     * @return string → module state
     */
    public function installModule($module, $path, $slug) {

        $path = $path . key($module) . App::DS;

        if (!is_dir($path)) {

            if (!mkdir($path, 0777, true)) {
                
                $error = __('Error creating directory in:', 
                            'extensions-for-grifus');

                return $this->error = $error . ' ' . $path;
            }
        }

        foreach ($module as $folder => $file) {      

            foreach ($file as $key => $value) {

                if (is_array($value)) {

                    $this->installModule([$key => $value], $path, $slug);

                    continue;  
                }
                
                $filepath = $path . $value;

                $modulePath = App::path('modules') . $slug . App::DS;

                $route = str_replace($modulePath, '', $filepath);

                $fileUrl = App::url('github-content');

                $fileUrl = $fileUrl . $slug  . '/master/' . $route;

                $response = wp_remote_get($fileUrl);

                if (isset($response->message)) {

                    return $this->error = $response->message;
                } 

                $response = isset($response['body']) ? $response['body'] : 0;

                if (!$response || $response === "404: Not Found\n") {

                    $error = __('Error to download file:', 
                                'extensions-for-grifus');

                    return $this->error = $error . ' ' . $fileUrl;
                }

                if (!file_put_contents($filepath, $response)) {

                    $error = __('Failed to save file to:', 
                                'extensions-for-grifus');

                    return $this->error = $error . ' ' . $filepath;
                }
            }
        }

        return true;
    }

    /**
     * Uninstall module.
     *
     * @since 1.0.0
     *
     * @param string $moduleID → module id
     *
     * @return string → module state
     */
    public function uninstallModule($moduleID) {

        return Module::remove($moduleID, false);
    }

    /**
     * Check for new version.
     *
     * @since 1.0.0
     *
     * @param string $repository → repository slug
     * @param string $version    → repository version
     *
     * @return boolen
     */
    public function hasNewVersion($repository, $version) {

        if ($this->updated()) { return false; } 

        $url = App::ExtensionsForGrifus()->get('url', 'github-api');

        $resp = wp_remote_get($url . 'Josantonius/' . $repository . '/tags');

        $resp = isset($resp['body']) ? json_decode($resp['body']) : false;

        if (!isset($resp->message) && isset($resp[0]->name)) {

            return ($version < $resp[0]->name);
        }

        return false;
    }

    /**
     * Check the last update.
     * 
     * @since 1.0.0
     *
     * @return boolean
     */
    protected function updated() {

        $now = time();

        $slug = App::ExtensionsForGrifus()->get('slug');

        $interval = App::ExtensionsForGrifus()->get('interval');

        $lastUpdate = get_option($slug . '-check-updates');

        if (($now - $lastUpdate) < $interval) {

            return true;
        }

        update_option($slug . '-check-updates', $now);

        return false;
    }

    /**
     * Renderizate admin page.
     *
     * @since 1.0.0
     */
    public function render() {

        $modulesInfo = $this->getModulesInfo();

        $page = App::ExtensionsForGrifus()->get('path', 'page');

        $layout = App::ExtensionsForGrifus()->get('path', 'layout');

        $this->view->renderizate($layout, 'header');

        $this->view->renderizate($page, 'extensions', $modulesInfo);

        $this->view->renderizate($layout, 'footer');     
    }
}
