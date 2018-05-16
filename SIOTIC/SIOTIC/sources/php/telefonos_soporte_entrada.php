<?php
require("conexiondb.php");
/* Entrada */
	/* Entrada de Teléfonos rellenado */

	/* Entrada de Teléfonos obtención */

	$query->prepare('SELECT COUNT(id_telefono) from Telefonos');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idTel = $numRows+1;
	$query->prepare('SELECT COUNT(id_estatus) from Estatus');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idEstatus = $numRows+1;
	$query->prepare('SELECT COUNT(id_entrada) from Entradas');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idE_t = $numRows+1; 

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_t,:comentarios_t,:cEnt_t,eActual_t)');
	$query->bindParam(:idEst_t,$idEstatus);
	$query->bindParam(:comentarios_t,$_POST['comentarios_entCel']);
	$query->bindParam(:cEnt_t, 0);
	$query->bindParam(:eActual_t,1);

	$query->execute();

	$query->prepare('INSERT INTO Telefonos VALUES(:idTel_t,:tipo_t,:marca_t,:modelo_t,:nro_t,:imei_t,:imeisim_t,:puk_t,:uAsig_t,:id_estatus_t)');

	$query->bindParam(:idTel_t,$idTel);
	$query->bindParam(:tipo_t,$_POST['tipo_entCel']);
	if ($_POST['marca_entCel'])
	$query->bindParam(:marca_t,$_POST['marca_entCel']);
	if ($_POST['modelo_entCel'])
	$query->bindParam(:modelo_t,$_POST['modelo_entCel']);
	if ($_POST['numero_entCel'])
	$query->bindParam(:nro_t,$_POST['numero_entCel']);
	if ($_POST['imei_entCel'])
	$query->bindParam(:imei_t,$_POST['imei_entCel']);
	if ($_POST['imeiSim_entCel'])
	$query->bindParam(:imeisim_t,$_POST['imeiSim_entCel']);
	if ($_POST['puk_entCel'])
	$query->bindParam(:puk_t,$_POST['puk_entCel']);
	$query->bindParam(:uAsig_t,$_POST['asignado_entCel']);
	$query->bindParam(:id_estatus_t,$idEstatus);

	$query->prepare('INSERT INTO Entradas id_entrada=:idE_t,fecha_entrada=:fEntrada_t,id_unidad_hardware=:idUnidad_t,salida_pcp=:salPCP_t,fecha_salida_pcp=:fSalPCP_t,numero_orden=:nOrden_t,nom_responsable=:nomResp_t)');
	$query->bindParam(:idE_t,$idE_t);
	$query->bindParam(:fEntrada_t,);
	$query->bindParam(:idUnidad_t,$idTel);
	$query->bindParam(:idEncargado_t,'OTIC');
	if ($_POST['pcp_entCel'])
	$query->bindParam(:salPCP_t,$_POST['pcp_entCel']);
	if ($_POST['pcpFecha_entCel'])
	$query->bindParam(:fSalPCP_t,$_POST['pcpFecha_entCel']);
	$query->bindParam(:nOrden_t,);
	$query->bindParam(:nomResp_t,'OTIC');

	$query->execute();
/*END*/
?>