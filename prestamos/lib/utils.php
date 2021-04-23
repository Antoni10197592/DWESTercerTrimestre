
<?php
function conectar_bd(){
    $usuario = 'antoni';
    $contrasenya = 'alumno';
    $servidor = 'localhost';
    $bdatos = 'prestamos';
    $conexion = mysqli_connect($servidor, $usuario, $contrasenya,);
    $db = mysqli_select_db($conexion, $bdatos);
    $sql = "SELECT * FROM Prestamos";

    $consulta = mysqli_query($conexion, $sql);
    $resultado=array();

    if ($consulta) {
        if (mysqli_num_rows($consulta) > 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                array_push($resultado, $row);
            }
        }
    }
    return $resultado;
}

function get_prestamos_tabla($filas){
    
        $resultado = "<table class=\"table\">
		<thead>
			<tr>
				<th>ID Pedido</th>
				<th>Tipo</th>
				<th>Descripcion</th>
				<th>Fecha</th>
                <th>ID Persona</th>
			</tr>
		</thead>
		<tbody>";

        foreach ($filas as $linea) {
                $resultado .= '<tr>';
                $resultado .= '<td scope="row">' . $linea['ID_pedido'] . '</td>';
                $resultado .= '<td scope="row">' . $linea['Tipo'] . '</td>';
                $resultado .= '<td scope="row">' . $linea['Descripcion'] . '</td>';
                $resultado .= '<td scope="row">' . $linea['Fecha'] . '</td>';
                $resultado .= '<td scope="row">' . $linea['ID_persona'] . '</td>';
                $resultado .= '</tr>';
        }
        $resultado .= "</tbody></table>";

        return $resultado;
       
}














function get_prestamos()
{
    $contenido = file_get_contents('data/prestamos.txt', false);
    if ($contenido == false) {
        echo 'No hay prestamos.';
    } else {
        $filas = explode("\n", $contenido);
        $resultado = "<table class=\"table\">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>";

        foreach ($filas as $linea) {

            $columnas = explode("\t", $linea);
            if (count($columnas) == 4) {
                $resultado .= '<tr>';
                $resultado .= '<td scope="row">' . $columnas[0] . '</td>';
                $resultado .= '<td scope="row">' . $columnas[1] . '</td>';
                $resultado .= '<td scope="row">' . $columnas[2] . '</td>';
                $resultado .= '<td scope="row">' . $columnas[3] . '</td>';
                $resultado .= '</tr>';
            }
        }
        $resultado .= "</tbody></table>";

        return $resultado;
    }
}
?>