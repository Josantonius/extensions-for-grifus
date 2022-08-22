# Extensions For Grifus WordPress Plugin

[![License](https://poser.pugx.org/josantonius/extensions-for-grifus/license)](https://packagist.org/packages/josantonius/extensions-for-grifus)

[Versión en español](README-ES.md)

Extensions for the Grifus theme.

![image](resources/banner-1544x500.png)

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Images](#images)
- [Tests](#tests)
- [Sponsor](#Sponsor)
- [License](#license)

---

This plugin contains three modules:

[Copy Movie Grifus](https://github.com/eliasis-framework/copy-movie-grifus.git)
Add a new button in the film pages of the Grifus theme with which you can copy the complete information with a single click.

[Custom Images Grifus](https://github.com/eliasis-framework/custom-images-grifus.git)
Save external IMDB images to your WordPress site. Replaces IMDB rating by your own rating system in Grifus theme.

[Custom Rating Grifus](https://github.com/eliasis-framework/custom-rating-grifus.git)
Replaces IMDB rating by your own rating system in Grifus theme. Replaces the static rating system of the Grifus theme by a dynamic rating system.

<p align="center">
  <a href="https://youtu.be/eU1hSQxo-R4" title="Extensions For Grifus">
   <img src="resources/thumbnail-english-video.png">
  </a>
</p>

## Requirements

This WordPress plugin is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

The plugin has been developed under version 4.8 of WordPress and under version 4.0.3 of the Grifus theme.

## Installation

You can download this plugin from the [official repository](https://es.wordpress.org/plugins/extensions-for-grifus/) in WordPress.

From your WordPress dashboard:

 1. Visit 'Plugins > Add New'
 2. Search for 'Extensions For Grifus'
 3. Activate Extensions For Grifus from your Plugins page.

From WordPress.org:

 1. Download [Extensions For Grifus](https://es.wordpress.org/plugins/extensions-for-grifus/).
 2. Upload the 'extensions-for-grifus' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...).
 3. Activate Extensions For Grifus from your Plugins page.

Once Activated:

 1. Go to Grifus Extensions and install and activate the modules.
 2. Go to Grifus Extensions > Custom Rating and click the button to reset all ratings.
 3. Go to Grifus Extensions > Custom Images and click the button to replace all images.

## Images

![image](resources/screenshot-1.png)
![image](resources/screenshot-2.png)

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    git clone https://github.com/josantonius/extensions-for-grifus.git
    
    cd extensions-for-grifus

    bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    composer phpmd

Run all previous tests:

    composer tests

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius#contact)
