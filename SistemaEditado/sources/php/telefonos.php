<?php
/* TELÉFONOS */
require("conexiondb.php");
/* Ingreso */
	/* Ingreso Teléfonos rellenado*/

	$a = 1;

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
	$query->bindParam(:marca_t,$_POST['marca_ingCel']);
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
		$query->prepare('UPDATE')
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

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_t,:comentarios_t,:cEnt_t,eActual_t)');
	$query->bindParam(:idEst_t,$idEstatus);
	$query->bindParam(:comentarios_t,$_POST['comentarios_entCel']);
	$query->bindParam(:cEnt_t, 0);
	$query->bindParam(:eActual_t,1);

	$query->execute();

	$query->prepare('INSERT INTO Telefonos VALUES(:idTel_t,:tipo_t,:marca_t,:modelo_t,:nro_t,:imei_t,:imeisim_t,:puk_t,:uAsig_t,:id_estatus_t)');

	$query->bindParam(:idTel_t,$idTel);
	$query->bindParam(:tipo_t,$_POST['tipo_entCel']);
	$query->bindParam(:marca_t,$_POST['marca_entCel']);
	$query->bindParam(:modelo_t,$_POST['modelo_entCel']);
	$query->bindParam(:nro_t,$_POST['numero_entCel']);
	$query->bindParam(:imei_t,$_POST['imei_entCel']);
	$query->bindParam(:imeisim_t,$_POST['imeiSim_entCel']);
	$query->bindParam(:puk_t,$_POST['puk_entCel']);
	$query->bindParam(:uAsig_t,$_POST['asignado_entCel']);
	$query->bindParam(:id_estatus_t,$idEstatus);

	$query->prepare('INSERT INTO Entradas VALUES(:idE_t,:fEntrada_t,:id_nula,:idUnidad_t,:salPCP_t,:fSalPCP_t,:nOrden_t,:nomResp_t)');
	$query->bindParam(:idE_t,);
	$query->bindParam(:fEntrada_t,);
	$query->bindParam(:idUnidad_t,$idTel);
	$query->bindParam(:idEncargado_t,$_POST['']);
	$query->bindParam(:salPCP_t,$_POST['pcp_entCel']);
	$query->bindParam(:fSalPCP_t,$_POST['pcpFecha_entCel']);
	$query->bindParam(:nOrden_t,);
	$query->bindParam(:nomResp_t,$_POST['']);

	$query->execute();
/*END*/

/* Salida */
	/* Salida Teléfonos rellenado */

	/* Salida Teléfonos obtención */
	$query->prepare('SELECT COUNT(id_salida) from Salidas');
	$query->execute();
	$numRows = $query->fetchAll(); $idSal = $numRows + 1;

	$query->prepare('INSERT INTO Salidas VALUES(:idS_t,:idE_t,:fSal_t,:nomResp_t,:pcp_t,:fpcp_t,:reporte_t,:receptor_t)');
	$query->bindParam(:idS_t,$idSal);
	$query->bindParam(:idE_t,);
	$query->bindParam(:fSal_t,);
	$query->bindParam(:nomResp_t,);
	$query->bindParam(:pcp_t,$_POST['pcp_salCel']);
	$query->bindParam(:fpcp_t,$_POST['pcpFecha_salCel']);
	$query->bindParam(:reporte_t,$_POST['comentarios_salCel']);
	$query->bindParam(:receptor_t:$_POST['receptor_salCel']);

	$query->execute();
/*END*/
?>