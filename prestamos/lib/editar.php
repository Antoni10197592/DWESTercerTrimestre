<?php require_once 'db.php';

	$id=$_GET['ID_pedido'];
	$tipo=$_GET['type'];
	$fecha=$_GET['date'];
	$titulo=$_GET['title'];

	function editar_pedido($id, $tipo, $fecha, $titulo){
		$conexion = conexion_bd();
		$sql="UPDATE Prestamos 
			SET Tipo='$tipo' , Fecha='$fecha', Descripcion='$titulo'
			WHERE ID_pedido=$id";
		$sentencia = mysqli_query($conexion, $sql);	

	}

	editar_pedido($id, $tipo, $fecha, $titulo);
	header("Location: ../index.php");
?>