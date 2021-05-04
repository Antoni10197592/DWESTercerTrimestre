
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
function get_persona_id($name)
{
    $sql = "SELECT ID FROM Persona WHERE $name";
    $conexion = conexion_bd();
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta && mysqli_num_rows($consulta) > 0) {
        mysql_fetch_assoc();
    }
}
function get_prestamos()
{
    $usuario = 'antoni';
    $contrasenya = 'alumno';
    $servidor = 'localhost';
    $bdatos = 'prestamos';
    $conexion = mysqli_connect($servidor, $usuario, $contrasenya, ); /* */
    $db = mysqli_select_db($conexion, $bdatos);
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

function get_prestamos_tabla($filas)
{

    $resultado = "<table class=\"table\">
		<thead>
			<tr>
				<th>ID Pedido</th>
				<th>Tipo</th>
				<th>Descripcion</th>
				<th>Fecha</th>
                <th>Nombre</th>
			</tr>
		</thead>
		<tbody>";

    foreach ($filas as $linea) {
        $resultado .= '<tr>';
        $resultado .= '<td scope="row">' . $linea['ID_pedido'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Tipo'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Descripcion'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Fecha'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Nombre'] . "</td>\n";
        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;

}
function insertarPrestamo($name, $type, $title, $date ){
    $sql="INSERT INTO Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre)
    FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID
    VALUES($type, $title, $date, $name)";
}
?>