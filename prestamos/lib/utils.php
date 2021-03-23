
<?php
function get_prestamos(){
	$contenido=file_get_contents('data/prestamos.txt', false);
	$filas=explode("\n",$contenido);
	$resultado= "<table class=\"tabla\">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>";

		foreach($filas as $linea){
			$columna= explode("\t", $linea);
			$resultado .="<tr>";
			$resultado .="<td>".$columna[0]."</td>";
			$resultado .="<td>".$columna[1]."</td>";
			$resultado .="<td>".$columna[2]."</td>";
			$resultado .="<td>".$columna[3]."</td>";
			$resultado.="</tr>";
		}
		$resultado.="</tbody></table>";

	return $resultado;
}
?>