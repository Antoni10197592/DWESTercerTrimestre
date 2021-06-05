<?php require_once 'lib/db.php';
session_start();

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
    } 

    else {
        // Guardo el contenido en el fichero. 
        $db=new Database();

        $db->insertarPrestamo($name, $type, $title, $date);
        session_destroy();
        // Redirecciono al usuario a la página principal del sitio.
        header("Location: index.php");
    }
}
if(isset($_POST['Cancelar'])){
    header("Location: index.php");
}

?>