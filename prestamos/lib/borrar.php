<?php require_once 'db.php';

$id=$_GET['ID_pedido'];

	$db=new Database();
	$borrado = $db->borrar_prestamo($id) ;
	
header("Location: ../index.php");
?>