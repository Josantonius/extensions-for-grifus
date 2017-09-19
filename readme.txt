=== Extensions For Grifus ===
Contributors: josantonius
Donate link: https://paypal.me/Josantonius
Tags: Grifus, Grifus-theme, Custom-images, Custom-Rating, Grifus-Extensions, Grifus-modules
Requires at least: 4.0.0
Tested up to: 4.8
Stable tag: 1.0.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Extensions for Grifus theme.

== Description ==

[youtube https://youtu.be/eU1hSQxo-R4]

This plugin contains three modules:

[Copy Movie Grifus](https://github.com/Josantonius/Copy-Movie-Grifus.git)
Add a new button in the film pages of the Grifus theme with which you can copy the complete information with a single click.

[Custom Images Grifus](https://github.com/Josantonius/Custom-Images-Grifus.git)
Save external IMDB images to your WordPress site. Replaces IMDB rating by your own rating system in Grifus theme.

[Custom Rating Grifus](https://github.com/Josantonius/Custom-Rating-Grifus.git)
Replaces IMDB rating by your own rating system in Grifus theme. Replaces the static rating system of the Grifus theme by a dynamic rating system.

[Descripción en español](https://github.com/Josantonius/Extensions-For-Grifus/master/README-ES.md)

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
2. Search for 'Extensions For Grifus'
3. Activate Extensions For Grifus from your Plugins page.

= From WordPress.org =

1. Download Extensions For Grifus.
2. Upload the 'custom-images-grifus' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate Extensions For Grifus from your Plugins page.

= Once Activated =

1. Go to Grifus Extensions and install and activate the modules.
2. Go to Grifus Extensions > Custom Images and click the button to reset all ratings.
3. Go to Grifus Extensions > Custom Images and click the button to replace all images.

== Frequently Asked Questions ==

= Does it work with the latest version of the Grifus theme? =

Yes, this plugin was tested with 4.0.2.6 and 4.0.3 versions of Grifus theme.

= Is it compatible with HipHop Virtual Machine (HHVM)? =

Yes, it is compatible.

= Minimum Requirements =

* WordPress 4.0.0 or greater
* PHP version 5.6 or greater

== Screenshots ==
1. Extensions For Grifus (English)
2. Extensions For Grifus (English)
3. Extensions For Grifus (Español)
4. Extensions For Grifus (Español)

== Languages ==

Extensions For Grifus is available in english and spanish language.

== Changelog ==

= 1.0.3 Extensions For Grifus =
* Libraries were improved.

* The extensions page was improved and some bugs were fixed.

* Now in the management of extensions `Vue.js` will be used instead of `JQuery`.

* Extension management will now be handled from the `Eliasis\Complements` library.

* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->getModulesInfo()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->moduleStatusHandler()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->installModule()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->uninstallModule()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->hasNewVersion()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->updated()` method.
* Deleted `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->runAjax()` method.

* Deleted `extensions-for-grifus-admin/src/template/pages/extensions.php` file.

= 1.0.2 Extensions For Grifus =

* The `Custom Rating Grifus module` was updated to version 1.0.2.

* [Custom Rating Grifus module] Fixed bug on archive or search pages, now will also replace the IMDB legend by TOTAL.

* [Custom Rating Grifus module] Now when manipulate it the rating of the movie from the administration panel will show the total number of votes and the rating in real time.

= 1.0.1 Extensions For Grifus =

* Bug fix in the Josantonius\WP_Register library.

* The `Custom Rating Grifus module` was updated to version 1.0.1.

* [Custom Rating Grifus module] Now, on sites that use WP Super Cache it will automatically clear cache when the ratings change.

* [Custom Rating Grifus module] Added a option in the menu to set whether to restart the rating when adding a new movie.

* [Custom Rating Grifus module] Added a section to manually set votes when updating movie.

* [Custom Rating Grifus module] The rating has been improved on the front end.

* The `Custom Images Grifus module` was updated to version 1.0.1.

* [Custom Images Grifus module] Images attached will now be deleted when a movie is deleted.

* [Custom Images Grifus module] Added a option in the menu to set whether to replace images when adding a new movie.

* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->isAfterUpdatedPost()` method.

* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->isPublishPost()` method.

= 1.0.0 Extensions For Grifus =

* Added `ExtensionsForGrifus\Controller\Launcher\Launcher` class.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->init()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->activation()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->deactivation()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->admin()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->setLanguage()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->setMenus()` method.
* Added `ExtensionsForGrifus\Controller\Launcher\Launcher->isAfterInsertPost()` method.
* Added `ExtensionsForGrifus\Controller\Launcher->isSingle()` method.

* Added `ExtensionsForGrifus\Model\Launcher\Launcher` class.
* Added `ExtensionsForGrifus\Model\Launcher\Launcher->setOptions()` method.

* Added `ExtensionsForGrifus\Controller\Uninstall\Uninstall` class.
* Added `ExtensionsForGrifus\Controller\Uninstall\Uninstall->removeAll()` method.

* Added `ExtensionsForGrifus\Model\Uninstall\Uninstall` class.
* Added `ExtensionsForGrifus\Model\Uninstall\Uninstall->removeAll()` method.

* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions` class.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->init()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->runAjax()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->setMenu()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->setSubmenu()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->addScripts()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->addStyles()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->getModulesInfo()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->moduleStatusHandler()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->installModule()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->uninstallModule()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->hasNewVersion()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->updated()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Page\Extensions\Extensions->render()` method.

* Added `ExtensionsForGrifus\Controller\Admin\Components\Rating\Rating` class.
* Added `ExtensionsForGrifus\Controller\Admin\Components\Rating\Rating->getPluginRating()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Components\Rating\Rating->prepareStars()` method.
* Added `ExtensionsForGrifus\Controller\Admin\Components\Rating\Rating->render()` method.

* Added `extensions-for-grifus-admin/config/add-urls.php` file.
* Added `extensions-for-grifus-admin/config/assets.php` file.
* Added `extensions-for-grifus-admin/config/settings.php` file.
* Added `extensions-for-grifus-admin/config/menu.php` file.
* Added `extensions-for-grifus-admin/config/namespaces.php` file.
* Added `extensions-for-grifus-admin/config/pages.php` file.
* Added `extensions-for-grifus-admin/config/paths.php` file.

* Added `extensions-for-grifus-admin/public/css/extensions-for-grifus-admin.css` file.
* Added `extensions-for-grifus-admin/public/css/eliasis-material.css` file.
* Added `extensions-for-grifus-admin/public/css/eliasis-material-icons.css` file.

* Added `extensions-for-grifus-admin/public/sass/admin/extensions-for-grifus-admin.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/custom/_global.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/custom/_layout.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/layout/_extensions.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/layout/_footer.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/layout/_header.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/partials/_cards.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/partials/_dialogs.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/partials/_donation.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/partials/_nav.sass` file.
* Added `extensions-for-grifus-admin/public/sass/admin/partials/_wp.rating.sass` file.

* Added `extensions-for-grifus-admin/public/js/extensions-for-grifus-admin-admin.js` file.
* Added `extensions-for-grifus-admin/public/js/eliasis-material.min.js` file.

* Added `extensions-for-grifus-admin/public/images/icons/extensions-grifus-admin.png` file.

* Added `extensions-for-grifus-admin/public/images/modules/copy-movie-grifus.png` file.
* Added `extensions-for-grifus-admin/public/images/modules/custom-images-grifus.png` file.
* Added `extensions-for-grifus-admin/public/images/modules/custom-rating-grifus.png` file.

* Added `extensions-for-grifus-admin/resources/banner-1544x500.png` file.
* Added `extensions-for-grifus-admin/resources/screenshot-1.png` file.

* Added `extensions-for-grifus-admin/src/template/elements/footer.php` file.
* Added `extensions-for-grifus-admin/src/template/elements/header.php` file.

* Added `extensions-for-grifus-admin/src/template/layout/extensions.php` file.

* Added `extensions-for-grifus-admin/src/template/pages/extensions.php` file.

* Added `eliasis-framework/eliasis` library.
* Added `composer/installers` library.
* Added `Josantonius/WP_Register` library.
* Added `Josantonius/Hook` library.
* Added `Josantonius/WP_Menu` library.

* Added `Josantonius/WP_Plugin-Info` module.

* Added `Josantonius/copy-movie-grifus` module.
* Added `Josantonius/custom-rating-grifus` module.
* Added `Josantonius/custom-images-grifus` module.

== Upgrade Notice ==

= 1.0.0 =
* First version.

= 1.0.1 =
* Bug fix in the Josantonius\WP_Register library.

* The `Custom Rating Grifus module` was updated to version 1.0.1.

* The `Custom Images Grifus module` was updated to version 1.0.1.

= 1.0.2 =
* The `Custom Rating Grifus module` was updated to version 1.0.2.

= 1.0.3 =
* Libraries were improved.

* The extensions page was improved and some bugs were fixed.

* Now in the management of extensions `Vue.js` will be used instead of `JQuery`.

* Extension management will now be handled from the `Eliasis\Complements` library.
