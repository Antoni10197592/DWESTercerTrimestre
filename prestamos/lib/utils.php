
<?php
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