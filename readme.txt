=== Extensions For Grifus ===
Contributors: josantonius
Donate link: https://paypal.me/Josantonius
Tags: Grifus, Grifus-theme, Custom-images, Custom-Rating, Grifus-Extensions, Grifus-modules
Requires at least: 4.0.0
Tested up to: 4.8
Stable tag: 1.0.5
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

= 1.0.5 Extensions For Grifus =
* Added functionality to minify CSS/JS content and unify plugin files into a single file.

= 1.0.4 Extensions For Grifus =
* Updating the plugin will now keep the current modules and statuses.

* Gulp was added to the project for task automation.

= 1.0.3 Extensions For Grifus =
* Libraries were improved.

* The extensions page was improved and some bugs were fixed.

* Now in the management of extensions `Vue.js` will be used instead of `JQuery`.

* Extension management will now be handled from the `Eliasis\Complements` library.

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
* First version.

== Upgrade Notice ==

= 1.0.0 =
* First version.

= 1.0.1 =

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

= 1.0.2 =
* The `Custom Rating Grifus module` was updated to version 1.0.2.

* [Custom Rating Grifus module] Fixed bug on archive or search pages, now will also replace the IMDB legend by TOTAL.

* [Custom Rating Grifus module] Now when manipulate it the rating of the movie from the administration panel will show the total number of votes and the rating in real time.

= 1.0.3 =
* Libraries were improved.

* The extensions page was improved and some bugs were fixed.

* Now in the management of extensions `Vue.js` will be used instead of `JQuery`.

* Extension management will now be handled from the `Eliasis\Complements` library.

= 1.0.4 Extensions For Grifus =
* Updating the plugin will now keep the current modules and statuses.

* Gulp was added to the project for task automation.


= 1.0.5 Extensions For Grifus =
* Added functionality to minify CSS/JS content and unify plugin files into a single file.
