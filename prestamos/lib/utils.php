
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
        $descripcion= $linea['2'];
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
    $filas = $db->get_amigos();

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

    $db = new Database();
    $filas = $db->get_prestamos_amigos();


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