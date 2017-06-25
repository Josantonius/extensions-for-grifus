# Extensions For Grifus Wordpress Plugin

[![WordPress plugin](https://img.shields.io/wordpress/plugin/v/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![WordPress](https://img.shields.io/wordpress/plugin/dt/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![WordPress](https://img.shields.io/wordpress/v/extensions-for-grifus.svg)](https://wordpress.org/plugins/extensions-for-grifus/) [![License](https://poser.pugx.org/josantonius/extensions-for-grifus/license)](https://packagist.org/packages/josantonius/extensions-for-grifus/license)

[English version](README.md)

Extensiones para el theme Grifus.

![image](resources/banner-1544x500.png)

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Vídeo](#video)
- [Imágenes](#imagenes)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

Este plugin contiene tres módulos:

[Copy Movie Grifus](https://github.com/Josantonius/Copy-Movie-Grifus.git)
Añade un nuevo botón en las páginas de películas del theme Grifus con el que podrás copiar la información completa de la película con un solo click.

[Custom Images Grifus](https://github.com/Josantonius/Custom-Images-Grifus.git)
Guarda imágenes externas de IMDB en tu sitio de WordPress. Reemplaza imágenes externas de IMDB y las guarda en tu sitio de WordPress.

[Custom Rating Grifus](https://github.com/Josantonius/Custom-Rating-Grifus.git)
Reemplaza la clasificación IMDB en las películas del theme Grifus por tu propio sistema de clasificación. Sustituye el sistema de clasificación estática del theme Grifus por un sistema de clasificación dinámica.

### Instalación 

Puedes instalar este plugin desde el [repositorio oficial](https://es.wordpress.org/plugins/extensions-for-grifus/) en WordPress.

Utilizando [Composer](http://getcomposer.org/download/). En la carpeta raíz de WordPress ejecutar:

    $ composer require josantonius/extensions-for-grifus

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, archivos sass, documentos...) puedes utilizar:

    $ composer require josantonius/extensions-for-grifus --prefer-source

También puedes clonar el repositorio completo con Git:

	$ git clone https://github.com/Josantonius/Extensions-For-Grifus.git
	
Desde el panel de administración de WordPress:

	1. Entra en 'Plugins > Añadir Nuevo'
	2. Busca 'Extensions For Grifus'
	3. Activa Extensions For Grifus en tu página de plugins.

Desde WordPress.org:

	1. Descarga [Extensions For Grifus](https://es.wordpress.org/plugins/extensions-for-grifus/).
	2. Sube el directorio 'extensions-for-grifus' a tu directorio '/ wp-content / plugins /', usando tu método favorito (ftp, sftp, scp, etc ...).
	3. Activa Extensions For Grifus en tu página de plugins.

Una vez activado:

	1. Entra en Grifus Extensions > Custom Rating y haz click en el botón para reiniciar todas las clasificaciones.
	2. Entra en Grifus Extensions > Custom Images y haz click en el botón para reemplazar todas las imágenes.
    
### Requisitos

Este plugin es soportado por versiones de PHP 5.3 o superiores y es compatible con versiones de HHVM 3.0 o superiores. 

El plugin ha sido desarrollado bajo la versión 4.7.4 de WordPress y bajo la versión 4.0.2.6 del theme Grifus. 

### Vídeo

[![Extensions For Grifus](https://img.youtube.com/vi/frVGux8zSXU/0.jpg)](https://youtu.be/frVGux8zSXU "Extensions For Grifus")

### Imágenes

![image](resources/screenshot-3.png)
![image](resources/screenshot-4.png)
![image](modules/copy-movie-grifus/resources/screenshot-10.png)
![image](modules/copy-movie-grifus/resources/screenshot-11.png)
![image](modules/copy-movie-grifus/resources/screenshot-12.png)
![image](modules/copy-movie-grifus/resources/screenshot-13.png)
![image](modules/copy-movie-grifus/resources/screenshot-14.png)
![image](modules/custom-images-grifus/resources/screenshot-22.png)
![image](modules/custom-images-grifus/resources/screenshot-23.png)
![image](modules/custom-images-grifus/resources/screenshot-24.png)
![image](modules/custom-images-grifus/resources/screenshot-25.png)
![image](modules/custom-images-grifus/resources/screenshot-26.png)
![image](modules/custom-images-grifus/resources/screenshot-27.png)
![image](modules/custom-images-grifus/resources/screenshot-28.png)
![image](modules/custom-rating-grifus/resources/screenshot-29.png)
![image](modules/custom-rating-grifus/resources/screenshot-30.png)
![image](modules/custom-rating-grifus/resources/screenshot-31.png)
![image](modules/custom-rating-grifus/resources/screenshot-32.png)
![image](modules/custom-rating-grifus/resources/screenshot-33.png)
![image](modules/custom-rating-grifus/resources/screenshot-34.png)
![image](modules/custom-rating-grifus/resources/screenshot-37.png)
![image](modules/custom-rating-grifus/resources/screenshot-38.png)

### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Licencia

Este proyecto está licenciado bajo **licencia GPL-2.0+**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).