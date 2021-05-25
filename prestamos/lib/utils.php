
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

    foreach ($filas as $linea) {
        $resultado .= '<tr>';
        $resultado .= '<td scope="row">' . $linea['ID_pedido'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Tipo'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Descripcion'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Fecha'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Nombre'] . "</td>\n";
        $resultado .= '<td scope="row"><a href="lib/borrar.php?ID_pedido='.$linea['ID_pedido'].'">Borrar</a>'."</td>\n";
        $resultado .= '<td scope="row"><a href="editar_prestamo.php?ID_pedido='.$linea['ID_pedido'].'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;

}


function get_amigos_tabla($filas)
{

    $resultado = "<table class=\"table table-sm\">
		<thead>
			<tr>
                <th>Amigos</th>
                <th>Editar</th>
			</tr>
		</thead>
		<tbody>";

    foreach ($filas as $linea) {
        $resultado .= '<tr>';
        $resultado .= '<td scope="row"><a href="./friendDetail.php?Nombre=' . $linea['Nombre'] . '">' . $linea['Nombre'] . "</a></td>\n";
        $resultado .= '<td scope="row"><a href="./friendDetail.php?Nombre='.$linea['Nombre'].'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;

}


function tabla_friend_detail(){
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
        $resultado .= '<tr>';
        $resultado .= '<td scope="row">' . $linea['ID_pedido'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Tipo'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Descripcion'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Fecha'] . "</td>\n";
        $resultado .= '<td scope="row">' . $linea['Nombre'] . "</td>\n";
        $resultado .= '<td scope="row"><a href="lib/borrar.php?ID_pedido='.$linea['ID_pedido'].'"> Borrar</a>'."</td>\n";
        $resultado .= '<td scope="row"><a href="editar_prestamo.php?ID_pedido='.$linea['ID_pedido'].'"> Editar</a>'."</td>\n";

        $resultado .= '</tr>';
    }
    $resultado .= "</tbody></table>";

    return $resultado;
    }
?>