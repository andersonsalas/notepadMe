# notepadMe! (Alpha)


notepadMe! es un pequeño bloc de notas personal. Utiliza el editor WYSWYG TinyMCE 4 y CodeIgniter para el backend. notepadMe! es software libre, distribuído bajo licencia GNU-GPLv3.


### Es una versión de pruebas

Se trata de un script aún muy verde, probablemente no funcione como se espera que deba hacerlo, aún así quise compartirlo con la comunidad. En el transcurso de los días iré añadiendo más funciones.


### Instalación:

1. Descomprimir en el servidor. Recomendado en el directorio raíz: Ej.: **/notepadMe/**
2. Modificar el archivo **notepad/config/database.php** con los parámetros de conexión correctos.
3. Ejecutar en su motor de base de datos (phpMyAdmin/MySQL Workbench) el script **instalar.sql**
4. ¡Listo!

**Nota:**

Si vas a guardar en un directorio diferente a /notepadMe/ en el servidor, edita el archivo .htaccess y cambia el parámetro **rewrite_base** por la ubicación donde hayas descomprimido el script. De igual forma edita el archivo **notepad/config/config.php** y cambia la clave **$config['base_url']** por la url deseada.


### ¿Quieres colaborar?

¡Toda ayuda es bienvenida!, para contribuir con el repositorio, haz lo siguiente:

1. Realiza un fork
2. Crear una nueva branch con la característica que deseas añadirle
3. Haz el push request.

¿Dudas?, puedes escribirme a contacto@andersonsalas.com.ve

Recuerda que puedes consultar la documentacion de CodeIgniter [aquí](http://codeigniter.com/).


### Roadmap

[Pendiente]

* Script de autoinstalación
* Mejoras varias en la interfaz
* Opción para importar/exportar notas
* Soporte para el formato Markdown (REALMENTE QUIERO HACER ESTO!)

### Screenshoots

![notepadMe_001](screenshoots/notepadMe_001.png)
![notepadMe_001](screenshoots/notepadMe_002.png)
