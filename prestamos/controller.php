<?php
require_once 'add.php';
// Obtengo los datos cargados desde add.php.
$name = $_POST['name'];
$type = $_POST['type'];
$title = $_POST['title'];
$date = $_POST['date'];
// Comprobacion de datos
if ($name == false || $type == false || $title == false || $date == false) {

    echo 'Algun campo esta vacio,<a href="add.php">vuelva a intenarlo</a>';

} else {
    // Guardo el contenido en el fichero. 
	//fopen("direccion_del_fichero", "que haces con el(w, empieza a escribir el principìo, a empieza por el final)");
    $file = fopen("data/prestamos.txt", "a");

    fwrite($file, "$name\t$type\t$title\t$date" . PHP_EOL);

    fclose($file);

    // Redirecciono al usuario a la página principal del sitio.
    header("Location: index.php");
}
