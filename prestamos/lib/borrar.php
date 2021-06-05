<?php require_once 'db.php';

$id=$_GET['ID_pedido'];

<<<<<<< HEAD
	$db=new Database();
	$borrado = $db->borrar_prestamo($id) ;
=======
function borrar_pedido($id){
	$db=new Database();
	$conexion = $db->conexion_bd();
	$sql="DELETE FROM Prestamos WHERE ID_pedido=$id";
	$sentencia = mysqli_query($conexion, $sql);
>>>>>>> 46b774e343dea72642bd57b5cca6768e8ec5128d
	
header("Location: ../index.php");
?>