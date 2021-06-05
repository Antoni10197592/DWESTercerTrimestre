<?php require_once 'db.php';

	$id=$_GET['ID_pedido'];
	$tipo=$_GET['type'];
	$fecha=$_GET['date'];
	$titulo=$_GET['title'];

	$db=New Database();
	$resultado= $db->editar_pedido($id, $tipo, $fecha, $titulo);

	header("Location: ../index.php");
?>