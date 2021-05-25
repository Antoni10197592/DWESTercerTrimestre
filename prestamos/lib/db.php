
<?php
function conexion_bd()
{
    $usuario = 'antoni';
    $contrasenya = 'alumno';
    $servidor = 'localhost';
    $bdatos = 'prestamos';

    $conexion = mysqli_connect($servidor, $usuario, $contrasenya, $bdatos);
    return $conexion;
}
function get_persona_id($name)/*comprueba el ID del nombre que recibe */
{
    $conexion = conexion_bd();
    $select = "SELECT * FROM Persona WHERE nombre LIKE '$name'";
   
    $datos = mysqli_query($conexion, $select);
    $row = mysqli_fetch_array($datos);

       if ($row == null) {
        return false;

    } else {

        $idPersona = $row['ID'];

        return $idPersona;
    }
}
function get_prestamos()/*obtiene los prestamos */
{
    $conexion = conexion_bd();
    $sql = "SELECT Prestamos.ID_pedido, Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre
    FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID";

    $consulta = mysqli_query($conexion, $sql);
    $resultado = array();

    if ($consulta) {
        if (mysqli_num_rows($consulta) > 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                array_push($resultado, $row);
            }
        }
    }
    return $resultado;
}


function get_amigos(){

    $conexion = conexion_bd();
    $select = "SELECT Nombre FROM Persona";
   
    $datos = mysqli_query($conexion, $select);
	$resultado = array();


    if ($datos) {
        if (mysqli_num_rows($datos) > 0) {
            while ($row = mysqli_fetch_assoc($datos)) {
                array_push($resultado, $row);
            }
        }
    }
	return $resultado;
}



function insertarPrestamo($name, $type, $title, $date ){

    /*sentencia sql para añadir prestamos a la tabla */
    $sql="INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
    VALUES('$type', '$title', '$date', $name)";

    $conexion = conexion_bd();
    $id = get_persona_id($name);

    if ($id == false) {

        /*añade el nuevo nombre a la tabla persona */
        $insertPersona = "INSERT INTO Persona (Nombre) VALUES ('$name')";
        $insertPersonasql = mysqli_query($conexion, $insertPersona);
    
        /*recuperamos el nuevo id */
        $id = get_persona_id($name);

        /*insertamos el prestamo */
        $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
            VALUES ('$type', '$title', '$date', $id)";
        $insertPrestamosql = mysqli_query($conexion, $insertPrestamo);
    }
   else {

        $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
            VALUES ('$type', '$title', '$date', $id)";

       $insertPrestamosql = mysqli_query($conexion, $insertPrestamo);

    }
}

?>