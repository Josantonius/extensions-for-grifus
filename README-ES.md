# Extensions For Grifus WordPress Plugin

[![License](https://poser.pugx.org/josantonius/wp-extensions-for-grifus/license)](https://packagist.org/packages/josantonius/wp-extensions-for-grifus)

[English version](README.md)

Extensiones para el theme Grifus.

![image](resources/banner-1544x500.png)

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Imágenes](#imagenes)
- [Tests](#tests)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

Este plugin contiene tres módulos:

[Copy Movie Grifus](https://github.com/eliasis-framework/copy-movie-grifus.git)
Añade un nuevo botón en las páginas de películas del theme Grifus con el que podrás copiar la información completa de la película con un solo click.

[Custom Images Grifus](https://github.com/eliasis-framework/custom-images-grifus.git)
Guarda imágenes externas de IMDB en tu sitio de WordPress. Reemplaza imágenes externas de IMDB y las guarda en tu sitio de WordPress.

[Custom Rating Grifus](https://github.com/eliasis-framework/custom-rating-grifus.git)
Reemplaza la clasificación IMDB en las películas del theme Grifus por tu propio sistema de clasificación. Sustituye el sistema de clasificación estática del theme Grifus por un sistema de clasificación dinámica.

<p align="center">
  <a href="resources/extensions-for-grifus-wordpress-plugin-spanish.mp4" title="Extensions For Grifus">
   <img src="resources/thumbnail-spanish-video.png">
  </a>
</p>

## Requisitos

Este plugin es soportado por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

Extensions For Grifus ha sido desarrollado bajo la versión 4.8 de WordPress y bajo la versión 4.0.3 del theme Grifus.

## Instalación

Puedes instalar este plugin desde el [repositorio oficial](https://es.wordpress.org/plugins/extensions-for-grifus/) en WordPress.

Desde el panel de administración de WordPress:

 1. Entra en 'Plugins > Añadir Nuevo'
 2. Busca 'Extensions For Grifus'
 3. Activa Extensions For Grifus en tu página de plugins.

Desde WordPress.org:

 1. Descarga [Extensions For Grifus](https://es.wordpress.org/plugins/extensions-for-grifus/).
 2. Sube el directorio 'extensions-for-grifus' a tu directorio '/ wp-content / plugins /', usando tu método favorito (ftp, sftp, scp, etc ...).
 3. Activa Extensions For Grifus en tu página de plugins.

Una vez activado:

 1. Entra en Grifus Extensions e instala y activa los módulos.
 2. Entra en Grifus Extensions > Custom Rating y haz click en el botón para reiniciar todas las clasificaciones.
 3. Entra en Grifus Extensions > Custom Images y haz click en el botón para reemplazar todas las imágenes.

## Imágenes

![image](resources/screenshot-3.png)
![image](resources/screenshot-4.png)

### Tests

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    git clone https://github.com/josantonius/wp-extensions-for-grifus.git
    
    cd wp-extensions-for-grifus

    composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    composer phpunit

Ejecutar pruebas de estándares de código para [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    composer phpmd

Ejecutar todas las pruebas anteriores:

    composer tests

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [GPLv2 License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
