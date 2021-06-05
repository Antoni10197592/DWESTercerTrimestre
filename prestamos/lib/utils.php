
<?php require_once  'db.php';

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
                <th>Borrar</th>
                <th>Editar</th>
			</tr>
		</thead>
		<tbody>";

        
        $db= new Database();
        $prestamos=$db-> get_prestamos();

    foreach ($filas as $linea) {
        $ID_pedido = $linea['0'];
        $tipo = $linea['1'];
<<<<<<< HEAD
        $descripcion= $linea['2'];
=======
        $descripcion=['2'];
>>>>>>> 46b774e343dea72642bd57b5cca6768e8ec5128d
        $fecha = $linea['3'];
        $nombre = $linea['4'];
        
        

        $resultado .= '<tr>';
        $resultado .= '<td scope="row">' . $ID_pedido . "</td>\n";
        $resultado .= '<td scope="row">' . $tipo . "</td>\n";
        $resultado .= '<td scope="row">' . $descripcion . "</td>\n";
        $resultado .= '<td scope="row">' . $fecha . "</td>\n";
        $resultado .= '<td scope="row">' . $nombre . "</td>\n";
        $resultado .= '<td scope="row"><a href="lib/borrar.php?ID_pedido='.$ID_pedido.'">Borrar</a>'."</td>\n";
        $resultado .= '<td scope="row"><a href="editar_prestamo.php?ID_pedido='.$ID_pedido.'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;

}

function get_amigos_tabla(){

    $db = new Database();
<<<<<<< HEAD
    $filas = $db->get_amigos();
=======
    $filas = $db->getAmigos();
>>>>>>> 46b774e343dea72642bd57b5cca6768e8ec5128d

    $resultado = "<table class=\"table table-sm\">
		<thead>
			<tr>
                <th>Amigos</th>
                <th>Editar</th>
			</tr>
		</thead>
		<tbody>";

    foreach ($filas as $linea) {

        $nombre = $linea['0'];

        $resultado .= '<tr>';
        $resultado .= '<td scope="row"><a href="./friendDetail.php?Nombre=' . $nombre . '">' . $nombre . "</a></td>\n";
        $resultado .= '<td scope="row"><a href="./friendDetail.php?Nombre='.$nombre.'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;

}


function tabla_friend_detail(){
<<<<<<< HEAD

    $db = new Database();
    $filas = $db->get_prestamos_amigos();

=======
	$persona=get_persona_id($_GET ["Nombre"]);
	$conexion=conexion_bd();
    $sql = "SELECT Prestamos.ID_pedido, Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre
    FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID WHERE Persona.ID=$persona";

    $consulta = mysqli_query($conexion, $sql);
    $filas = array();

    if ($consulta) {
        if (mysqli_num_rows($consulta) > 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                array_push($filas, $row);
            }
        }
    }
>>>>>>> 46b774e343dea72642bd57b5cca6768e8ec5128d

    $resultado = "<table class=\"table\">
		<thead>
			<tr>
				<th>ID Pedido</th>
				<th>Tipo</th>
				<th>Descripcion</th>
				<th>Fecha</th>
                <th>Nombre</th>
                <th>Borrar</th>
                <th>Editar</th>
			</tr>
		</thead>
		<tbody>";

    foreach ($filas as $linea) {
        
        $ID_pedido = $linea['0'];
        $tipo = $linea['1'];
        $descripcion= $linea['2'];
        $fecha = $linea['3'];
        $nombre = $linea['4'];
        

        $resultado .= '<tr>';
        $resultado .= '<td scope="row">' . $ID_pedido . "</td>\n";
        $resultado .= '<td scope="row">' . $tipo . "</td>\n";
        $resultado .= '<td scope="row">' . $descripcion . "</td>\n";
        $resultado .= '<td scope="row">' . $fecha . "</td>\n";
        $resultado .= '<td scope="row">' . $nombre . "</td>\n";
        $resultado .= '<td scope="row"><a href="lib/borrar.php?ID_pedido='.$ID_pedido.'"> Borrar</a>'."</td>\n";
        $resultado .= '<td scope="row"><a href="editar_prestamo.php?ID_pedido='.$ID_pedido.'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;
    }
?>
<?php
/*



function getPrestamoAmigoLista()
{

    $resultado = '<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo</th>
        <th scope="col">Información</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>';
    $contador = 0;

    $db = new Database();
    $arrayDatos = $db->getPrestamoAmigo();

    foreach ($arrayDatos as $linea) {
        $id = $linea['1'];
        $nombreAmigo = $linea['0'];
        $tipo = $linea['2'];
        $informacion = $linea['3'];
        $fecha = $linea['4'];
        $contador = $contador + 1;

        $resultado .= '<tr>
        <th scope="row">' . $contador . '</th>
        <td>' . $nombreAmigo . '</td>
        <td>' . $tipo . '</td>
        <td>' . $informacion . '</td>
        <td>' . $fecha . '</td>
        <td><a href="./controller.php?id=' . $id . '&action=delete">Borrar</a> /
            <a href="./controller.php?id=' . $id . '&action=edit">Editar</a></td>
      </tr>';
    }
    $resultado .= '</tbody>
    </table>';

    return $resultado;
}*/
?>