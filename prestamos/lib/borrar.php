<?php require_once 'utils.php';

$id=$_GET['ID_pedido'];

function borrar_pedido($id){
	$conexion = conexion_bd();
	$sql="DELETE FROM Prestamos WHERE ID_pedido=$id";
	$sentencia = mysqli_query($conexion, $sql);
}

?>


