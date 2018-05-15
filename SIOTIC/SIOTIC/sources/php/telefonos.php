<?php
/* TELÉFONOS */
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

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_t,:comentarios_t,:cEnt_t,eActual_t)');
	$query->bindParam(:idEst_t,$idEstatus);
	$query->bindParam(:comentarios_t,$_POST['comentarios_ingCel']);
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

/* Asginación */
	/* Asignación Telefonos rellenado */
	
	/* Asignación Telefonos obtención */
	$query->prepare('SELECT COUNT(id_usuario) from Usuarios');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idUser = $numRows+1;

	if(isset($_POST['inop_asigCel'])) {
		$query->prepare('UPDATE Estatus SET estado_actual_unidad=2 WHERE id_estatus=:idEstatus');
		$query->execute();
	}
	else
	{
	$query->prepare('INSERT INTO Usuarios VALUES(:idU_t,:nomU_t,:apeU_t,:ciU_t)');
	$query->bindParam(:idU_t,$idUser);
	$query->bindParam(:nomU_t,$_POST['nom_asigCel']);
	$query->bindParam(:apeU_t,$_POST['apellido_asigCel']);
	$query->bindParam(:ciU_t,$_POST['ci_asigCel']);
	$query->execute();
	}
/*END*/

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

/* Salida */
	/* Salida Teléfonos rellenado */

	/* Salida Teléfonos obtención */
	$query->prepare('SELECT nom_responsable from Entradas WHERE id_entrada=:idEntrada'); //Falta hacer que tome la id de entrada
	$query->execute();
	$nomResponsable = $query->fetchColumn(0);

	$query->prepare('SELECT COUNT(id_salida) from Salidas');
	$query->execute();
	$numRows = $query->fetchAll(); $idSal = $numRows + 1;

	$query->prepare('INSERT INTO Salidas VALUES(:idS_t,:idE_t,:fSal_t,:nomResp_t,:pcp_t,:fpcp_t,:reporte_t,:receptor_t)');
	$query->bindParam(:idS_t,$idSal);
	$query->bindParam(:idE_t,$idEntrada);
	$query->bindParam(:fSal_t,);
	$query->bindParam(:nomResp_t,$nomResponsable);
	if ($_POST['pcp_salCel'])
	$query->bindParam(:pcp_t,$_POST['pcp_salCel']);
	if ($_POST['pcpFecha_salCel'])
	$query->bindParam(:fpcp_t,$_POST['pcpFecha_salCel']);
	if ($_POST['comentarios_salCel'])
	$query->bindParam(:reporte_t,$_POST['comentarios_salCel']);
	$query->bindParam(:receptor_t:$_POST['receptor_salCel']);

	$query->execute();
/*END*/
?>