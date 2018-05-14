<?php
/* HARDWARE */
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

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_h,:comentarios_h,:cEnt_h,eActual_h)');
	$query->bindParam(:idEst_h,$idEstatus);
	$query->bindParam(:comentarios_h,'Nada, por el momento.');
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
	$query->bindParam(:usuario_h,$_POST['h_asignado_ingreso']);
	$query->bindParam(:fIngreso_h,$_POST['h_fechaEnt_ingreso']);
	$query->bindParam(:id_estatus_h,$idEstatus);

	$query->execute();
/*END*/

/* Asginación */
	/* Asignación Hardware rellenado */

	/* Asignación Hardware obtención */
	$query->prepare('SELECT COUNT(id_usuario) from Usuarios');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idUser = $numRows+1;

	$query->prepare('INSERT INTO Usuarios VALUES(:idU_h,:nomU_h,:apeU_h,:ciU_h)');
	$query->bindParam(:idU_h,$idUser);
	$query->bindParam(:nomU_h,$_POST['nombre_asig_h']);
	$query->bindParam(:apeU_h,$_POST['apellido_asig_h']);
	$query->bindParam(:ciU_h,$_POST['ci_asig_h']);

	$query->execute();
/*END*/

/* Entrada */
	/* Entrada Hardware rellenado */

	/* Entrada Hardware obtención */
	$query->prepare('SELECT COUNT(id_hardware) from Hardware');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idHard = $numRows+1;
	$query->prepare('SELECT COUNT(id_estatus) from Estatus');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idEstatus = $numRows+1;

	$query->prepare('INSERT INTO Estatus VALUES(:idEst_h,:comentarios_h,:cEnt_h,eActual_h)');
	$query->bindParam(:idEst_h,$idEstatus);
	$query->bindParam(:comentarios_h,$_POST['h_comentarios_salida']);
	$query->bindParam(:cEnt_h, 0);
	$query->bindParam(:eActual_h,1);

	$query->execute();

	$query->prepare('INSERT INTO Hardware VALUES(:idHard_h,:tipo_h,:marca_h,:modelo_h,:bienes_h,:usuario_h,:fIngreso_h,:id_estatus_h)');
	$query->bindParam(:idHard_h,$idHard);
	$query->bindParam(:tipo_h,$_POST['tipo_entrada']);
	if ($_POST['marca_entrada'])
	$query->bindParam(:marca_h,$_POST['marca_entrada']);
	if ($_POST['modelo_entrada'])
	$query->bindParam(:modelo_h,$_POST['modelo_entrada']);
	$query->bindParam(:bienes_h,$_POST['bienes_entrada']);
	$query->bindParam(:usuario_h,$_POST['encargado_entrada']);
	$query->bindParam(:fIngreso_h,$fIngreso);
	$query->bindParam(:id_estatus_h,$idEstatus);

	$query->prepare('INSERT INTO Entradas VALUES(:idE_h,:fEntrada_h,:idUnidad_h,:id_nula,:salPCP_h,:fSalPCP_h,:nOrden_h,:nomResp_h)');
	$query->bindParam(:idE_h,);
	$query->bindParam(:fEntrada_h,);
	$query->bindParam(:idUnidad_h,$idHard);
	$query->bindParam(:idEncargado_h,$_POST['']);
	$query->bindParam(:salPCP_h,$_POST['']);
	$query->bindParam(:fSalPCP_h,$_POST['']);
	$query->bindParam(:nOrden_h,);
	$query->bindParam(:nomResp_h,$_POST['']);

	$query->execute();
/*END*/

/* Salida */
	/* Salida Hardware rellenado */

	/* Salida Hardware obtención */
	$query->prepare('SELECT COUNT(id_salida) from Salidas');
	$query->execute();
	$numRows = $query->fetchAll(); $idSal = $numRows + 1;

	$query->prepare('INSERT INTO Salidas VALUES(:idS_h,:idE_h,:fSal_h,:nomResp_h,:pcp_h,:fpcp_h,:reporte_h,:receptor_h)');
	$query->bindParam(:idS_h,$idSal);
	$query->bindParam(:IdE_h,);
	$query->bindParam(:fSal_h,);
	$query->bindParam(:nomResp_h,);
	$query->bindParam(:pcp_h,$_POST['h_pcp_salida']);
	$query->bindParam(:fpcp_h,$_POST['h_pcpFecha_salida']);
	$query->bindParam(:reporte_h,$_POST['h_comentarios_salida']);
	$query->bindParam(:receptor_h:$_POST['h_receptor_salida']);

	$query->execute();
?>