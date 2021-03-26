
<?php
function get_prestamos(){
	$contenido=file_get_contents('data/prestamos.txt', false);
	if($contenido==false){
		echo 'No hay prestamos.';
	}
	else{
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
			$resultado .="<td scope='row'>".$columna[0]."</td>";
			$resultado .="<td scope='row'>".$columna[1]."</td>";
			$resultado .="<td scope='row'>".$columna[2]."</td>";
			$resultado .="<td scope='row'>".$columna[3]."</td>";
			$resultado.="</tr>";
		}
		$resultado.="</tbody></table>";

	return $resultado;
	}
}
?>