<?php
require("conexiondb.php");
/* Ingreso */
	/* Ingreso Teléfonos rellenado*/

	/* Ingreso Teléfonos obtención */
	$query->prepare('SELECT COUNT(id_telefono) from Telefonos');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idTel = $numRows+1;
	$query->prepare('SELECT COUNT(id_estatus) from Estatus');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idEstatus = $numRows+1;

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_t,:comentarios_t,:estado_ingCel,:cEnt_t,eActual_t)');
	$query->bindParam(:idEst_t,$idEstatus);
	$query->bindParam(:comentarios_t,$_POST['comentarios_ingCel']);
	$query->bindParam(:eIngreso_t,$_POST['estado_ingCel']);
	$query->bindParam(:cEnt_t, 0);
	$query->bindParam(:eActual_t,1);

	$query->execute();

	$query->prepare('INSERT INTO Hardware VALUES(:idTel_t,:tipo_t,:marca_t,:modelo_t,:nro_t,:imei_t,:imeisim_t,:puk_t,:uAsig_t,:id_estatus_t)');

	$query->bindParam(:idTel_t,$idTel);
	$query->bindParam(:tipo_t,$_POST['tipo_ingCel']);
	if ($_POST['marca_ingCel'])
	$query->bindParam(:marca_t,$_POST['marca_ingCel']);
	if ($_POST['modelo_ingCel'])
	$query->bindParam(:modelo_t,$_POST['modelo_ingCel']);
	$query->bindParam(:nro_t,$_POST['numero_ingCel']);
	$query->bindParam(:imei_t,$_POST['imei_ingCel']);
	$query->bindParam(:imeisim_t,$_POST['imeiSim_ingCel']);
	$query->bindParam(:puk_t,$_POST['puk_ingCel']);
	$query->bindParam(:uAsig_t,$_POST['asignado_ingCel']);
	$query->bindParam(:id_estatus_t,$idEstatus);

	$query->execute();
/*END*/

?>