<?php
/*ESTATUS*/
include("conexiondb.php");
if ($estado) {
	if ($estado === 3){	
	$query->prepare('UPDATE Estatus SET estado_actual_unidad=3 WHERE id_estatus=:idEstatus');
	}
	else if ($estado === 4){
	$query->prepare('UPDATE Estatus SET estado_actual_unidad=4 WHERE id_estatus=:idEstatus');
	$query->execute();
	}
	else if ($estado === 5){
	$query->prepare('UPDATE Estatus SET estado_actual_unidad=5 WHERE id_estatus=:idEstatus');
	$query->execute();
	}
	else if ($estado === 6){
	$query->prepare('UPDATE Estatus SET estado_actual_unidad=6 WHERE id_estatus=:idEstatus');
	$query->execute();
	}	
}
else {
if ($_POST['comentarios_estatus'])
$query->prepare('UPDATE Estatus SET fallas=:fallas WHERE id_estatus=:idEstatus'); //Falta hacer que tome la id_estatus
$query->bindParam(:fallas,$_POST['comentarios_estatus']);
$query->execute();
}
?>