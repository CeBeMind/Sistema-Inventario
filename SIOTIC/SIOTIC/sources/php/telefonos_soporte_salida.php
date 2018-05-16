<?php
include("conexiondb.php");
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