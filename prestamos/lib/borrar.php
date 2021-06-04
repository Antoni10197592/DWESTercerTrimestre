<?php require_once 'db.php';

$id=$_GET['ID_pedido'];

function borrar_pedido($id){
	$db=new Database();
	$conexion = $db->conexion_bd();
	$sql="DELETE FROM Prestamos WHERE ID_pedido=$id";
	$sentencia = mysqli_query($conexion, $sql);
	
}
borrar_pedido($id);
header("Location: ../index.php");
?>


