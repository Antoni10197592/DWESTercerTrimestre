# PrestaCosas

## Primera iteración

- Visualizar desde el índice un listado en forma de tabla con los elementos que hemos prestado a nuestros amigos.
- Esos elementos estarán guardados en un fichero de texto llamado prestamos.txt alojado en el directorio data.
- Un ejemplo del contenido es:
> juan  libro   El señor de los anillos 15/03/2021

> julio cd  El canto del loco   21/03/2021

- Utiliza bootstrap

## Segunda iteración

- Si no se puede acceder al fichero de préstamos o se produce un error en la lectura, debemos mostrar un mensaje al usuario "No hay préstamos que mostrar".

- Si una fila está mal formada (no tiene los 4 campos) no debe aparecer en la tabla.

## Tercer iteración

- Crear una nueva página add.php:
    - Debe contener un formulario para añadir un préstamo nuevo.
    - Cuando hacemos submit nos lleva a controller.php que debe escribir la nueva línea en el fichero de préstamos y redirigirnos a index.php.
- Crear controller.php
    - Si recibimos "Cancelar" nos redirige a index.php directamente
    - Si recibimos "Guardar" guarda en el fichero y nos redirige a index.php

## Cuarta iteración

- En controller.php:
    - Si algún campo del formulario está vacío o no podemos escribir en el fichero, nos debe redirigir a add.php y mostrar en los campos del formulario la información que habíamos tecleado previamente.