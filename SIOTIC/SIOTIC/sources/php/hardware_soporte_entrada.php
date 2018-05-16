<?php
require("conexiondb.php");
/* Entrada */
	/* Entrada Hardware rellenado */

	/* Entrada Hardware obtención */
	$query->prepare('SELECT COUNT(id_entrada) from Entradas');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idE_h = $numRows+1;

	$query->prepare('SELECT * from Hardware WHERE bienes_hardware=:comprob');
	$query->bindParam(:comprob,$_POST['bienes_entrada']);
	$query->execute();

	if ($query->rowCount() > 0

) {
	$query->prepare('SELECT COUNT(id_hardware) from Hardware');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idHard = $numRows+1;
	$query->prepare('SELECT COUNT(id_estatus) from Estatus');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idEstatus = $numRows+1;

	$query->prepare('INSERT INTO Hardware VALUES(:idHard_h,:tipo_h,:marca_h,:modelo_h,:bienes_h,:usuario_h,:fIngreso_h,:id_estatus_h)');
	$query->bindParam(:idHard_h,$idHard);
	$query->bindParam(:tipo_h,$_POST['tipo_entrada']);
	if ($_POST['marca_entrada'])
	$query->bindParam(:marca_h,$_POST['marca_entrada']);
	if ($_POST['modelo_entrada'])
	$query->bindParam(:modelo_h,$_POST['modelo_entrada']);
	$query->bindParam(:bienes_h,$_POST['bienes_entrada']);
	$query->bindParam(:usuario_h,$_POST['asignado_entrada']);
	$query->bindParam(:fIngreso_h,$fIngreso);
	$query->bindParam(:id_estatus_h,$idEstatus);

	$query->execute();

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_h,:comentarios_h,:cEnt_h,eActual_h)');
	$query->bindParam(:idEst_h,$idEstatus);
	$query->bindParam(:comentarios_h,$_POST['h_comentarios_salida']);
	$query->bindParam(:cEnt_h, 0);
	$query->bindParam(:eActual_h,1);

	$query->execute();
	}

	$query->prepare('INSERT INTO Entradas id_entrada=:idE_h, fecha_Entrada=:fEntrada_h, id_unidad_hardware=:idUnidad_h,salida_pcp=:salPCP_h,fecha_salida_pcp=:fSalPCP_h,numero_orden=:nOrden_h,nom_responsable=:nomResp_h');
	$query->bindParam(:idE_h,$idE_h);
	$query->bindParam(:fEntrada_h,);
	$query->bindParam(:idUnidad_h,$idHard);
	$query->bindParam(:idEncargado_h,$_POST['encargado_entrada']);
	if ($_POST['pcp_entrada'])
	$query->bindParam(:salPCP_h,$_POST['pcp_entrada']);
	if ($_POST['pcpFecha_entrada'])
	$query->bindParam(:fSalPCP_h,$_POST['pcpFecha_entrada']);
	$query->bindParam(:nOrden_h,);
	$query->bindParam(:nomResp_h,$_POST['representante_entrada']);

	$query->execute();
/*END*/
?>