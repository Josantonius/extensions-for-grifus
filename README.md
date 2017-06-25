# Extensions For Grifus Wordpress Plugin

[![WordPress plugin](https://img.shields.io/wordpress/plugin/v/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![WordPress](https://img.shields.io/wordpress/plugin/dt/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![WordPress](https://img.shields.io/wordpress/v/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![License](https://poser.pugx.org/josantonius/extensions-for-grifus/license)](https://packagist.org/packages/josantonius/extensions-for-grifus/license)

[Versión en español](README-ES.md)

Extensions for the Grifus theme.

![image](resources/banner-1544x500.png)

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Video](#video)
- [Contribute](#contribute)
- [Licensing](#licensing)
- [Copyright](#copyright)

---

This plugin contains three modules:

[Copy Movie Grifus](https://github.com/Josantonius/Copy-Movie-Grifus.git)
Add a new button in the film pages of the Grifus theme with which you can copy the complete information with a single click.

[Custom Images Grifus](https://github.com/Josantonius/Custom-Images-Grifus.git)
Save external IMDB images to your WordPress site. Replaces IMDB rating by your own rating system in Grifus theme.

[Custom Rating Grifus](https://github.com/Josantonius/Custom-Rating-Grifus.git)
Replaces IMDB rating by your own rating system in Grifus theme. Replaces the static rating system of the Grifus theme by a dynamic rating system.

<p align="center">
  <a href="https://youtu.be/eU1hSQxo-R4" title="Extensions For Grifus">
  	<img src="resources/video-english.png">
  </a>
</p>

### Installation

You can download this plugin from the [official repository](https://es.wordpress.org/plugins/extensions-for-grifus/) in WordPress.

From [Composer](http://getcomposer.org/download/). In the root folder of WordPress run:

    $ composer require josantonius/extensions-for-grifus

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, sass files, docs...) you can use:

    $ composer require josantonius/extensions-for-grifus --prefer-source

Or you can also clone the complete repository with Git:

	$ git clone https://github.com/Josantonius/Extensions-For-Grifus.git

From your WordPress dashboard:

	1. Visit 'Plugins > Add New'
	2. Search for 'Extensions For Grifus'
	3. Activate Extensions For Grifus from your Plugins page.

From WordPress.org:

	1. Download [Extensions For Grifus](https://es.wordpress.org/plugins/extensions-for-grifus/).
	2. Upload the 'extensions-for-grifus' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...).
	3. Activate Extensions For Grifus from your Plugins page.

Once Activated:

	1. Go to Grifus Extensions > Custom Images and click the button to reset all ratings.
	2. Go to Grifus Extensions > Custom Images and click the button to replace all images.

### Requirements

This pluggin is supported by PHP versions 5.3 or higher and is compatible with HHVM versions 3.0 or higher.

The plugin has been developed under version 4.8 of WordPress and under version 4.3 of the Grifus theme.

### Images

![image](resources/screenshot-1.png)
![image](resources/screenshot-2.png)

### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Licensing

This project is licensed under **GPL-2.0+**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).