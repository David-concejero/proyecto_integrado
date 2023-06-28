# Proyecto Final de Curso :mortar_board:

Este proyecto se ha desarrollado para el final de curso del grado de desarrollo de aplicaciones web. Todo el proyecto ha sido realizado por David Concejero Hernández.

![Imagen del proyecto](https://i.imgur.com/kuZvuCl.png)

# :question: ¿De que trata el proyecto?

El proyecto final de curso se basa en el desarrollo de una aplicación que permita al usuario emular la compra/reserva de entradas para las salas de un negocio. En este caso, el negocio es un cine. En él el usuario se puede registrar en el sistema, comprar películas para un día determinado, una vez vista la película puede escribir una reseña y por último este recibe en su correo electrónico personal un ticket con los datos relacionados al estreno que ha comprado previamente.

La generación de tickets la he realizado mediante el uso de la librería 'mpdf', que nos permite transformar código html a pdf. Y el envío de correos electrónicos usando otra librería llamada 'phpmailer'.

![Generacion de tickets](https://i.imgur.com/q0ewCeD.png)

Cabe destacar que todo el diseño de mi página es responsive y puede ser usada desde el teléfono móvil.

# :hammer: ¿Que podemos hacer dentro de la aplicación?

La aplicación tendrá principalmente tres secciones, una para la administración, otra para usuarios no registrados y otra para usuarios registrados.

* **Usuarios no registrados:** Estos pueden ver la cartelera, las tarifas expuestas en el cine y las reseñas de otros usuarios. No pueden comprar tickets. 

* **Usuarios Registrados:** Estos usuarios tienen acceso completo a la aplicación. Pueden comprar entradas y hacer reseñas de las películas que han visto. 

* **Administrador:** Es el administrador del sitio. Puede agregar películas nuevas, crear nuevos estrenos, eliminar películas, cambiar el precio de las tarifas..etc

Para mas información puedes consultar el [manual de usuario](https://github.com/David-concejero/proyecto_integrado/blob/master/Manual%20Version%20Web.pdf) que hay subido en el repositorio.

# Requisitos uso proyecto

Para usar este proyecto necesitas configurar previamente dos aspectos fundamentales:

* Instalar la infraestructura LAMP

* Instalar Mysql y cargar la base de datos del repositorio.

Una vez tengas su servidor apache funcionando lo único que tienes que hacer es coger el directorio raiz del proyecto y moverlo a /var/www/html. Asignarle permisos de escritura (para la generación del ticket de usuario) y ya esta.
