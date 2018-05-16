<?php

require("conexiondb.php");

/* Ingreso */
	/* Ingreso Hardware rellenado*/

	/* Ingreso Hardware obtención */
	$query->prepare('SELECT COUNT(id_hardware) from Hardware');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idHard = $numRows+1;
	$query->prepare('SELECT COUNT(id_estatus) from Estatus');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idEstatus = $numRows+1;

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_h,:comentarios_h,:estadoIngreso_h,:cEnt_h,eActual_h)');
	$query->bindParam(:idEst_h,$idEstatus);
	$query->bindParam(:comentarios_h,'Nada, por el momento.');
	$query->bindParam(:estadoIngreso_h,$_POST['h_estado_ingreso']);
	$query->bindParam(:cEnt_h, 0);
	$query->bindParam(:eActual_h,1);

	$query->execute();

	$query->prepare('INSERT INTO Hardware VALUES(:idHard_h,:tipo_h,:marca_h,:modelo_h,:bienes_h,:usuario_h,:fIngreso_h,:id_estatus_h)');

	$query->bindParam(:idHard_h,$idHard);
	$query->bindParam(:tipo_h,$_POST['h_tipo_ingreso']);
	if ($_POST['h_marca_ingreso'])
	$query->bindParam(:marca_h,$_POST['h_marca_ingreso']);
	if ($_POST['h_modelo_ingreso'])
	$query->bindParam(:modelo_h,$_POST['h_modelo_ingreso']);
	$query->bindParam(:bienes_h,$_POST['h_bienes_ingreso']);
	$query->bindParam(:usuario_h,'OTIC');
	$query->bindParam(:fIngreso_h,$_POST['h_fechaEnt_ingreso']);
	$query->bindParam(:id_estatus_h,$idEstatus);

	$query->execute();
/*END*/

?>