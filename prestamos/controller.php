<?php require_once 'lib/utils.php';

if(isset($_POST['Guardar'])){
// Obtengo los datos cargados desde add.php.
$name = $_POST['name'];
$type = $_POST['type'];
$title = $_POST['title'];
$date = $_POST['date'];
// Comprobacion de datos
//if ($name == "" || $type == "" || $title == "" || $date == "") 

if(empty($name) || empty($type) || empty($title) || empty($date)){

    echo 'Algun campo esta vacio,<a href="add.php">vuelva a intenarlo</a>';

} else {
    // Guardo el contenido en el fichero. 
	$sql="INSERT INTO Prestamos(Tipo, Descripcion, Fecha, ID_persona)
    FROM Prestamos INNER JOIN Prestamos.ID_persona = Persona.Nombre
    VALUES($type, $title, $date, $name)";

    // Redirecciono al usuario a la página principal del sitio.
    header("Location: index.php");
}
}
else if(isset($_POST['Cancelar'])){
    header("Location: index.php");
}
else{
    header("Location: index.php");
}

?>