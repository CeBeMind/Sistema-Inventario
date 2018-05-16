<?php
require("conexiondb.php");

/* Salida */
	/* Salida Hardware rellenado */

	/* Salida Hardware obtención */
	$query->prepare('SELECT nom_responsable from Entradas WHERE id_entrada=:idEntrada'); //Falta hacer que tome la id de entrada
	$query->execute();
	$nomResponsable = $query->fetchColumn(0);

	$query->prepare('SELECT COUNT(id_salida) from Salidas');
	$query->execute();
	$numRows = $query->fetchAll(); $idSal = $numRows + 1;

	$query->prepare('INSERT INTO Salidas VALUES(:idS_h,:idE_h,:fSal_h,:nomResp_h,:pcp_h,:fpcp_h,:reporte_h,:receptor_h)');
	$query->bindParam(:idS_h,$idSal);
	$query->bindParam(:IdE_h,$idEntrada);
	$query->bindParam(:fSal_h,);
	$query->bindParam(:nomResp_h,$nomResponsable);
	if ($_POST['h_pcp_salida'])
	$query->bindParam(:pcp_h,$_POST['h_pcp_salida']);
	if ($_POST['h_pcpFecha_salida'])
	$query->bindParam(:fpcp_h,$_POST['h_pcpFecha_salida']);
	if ($_POST['h_comentarios_salida'])
	$query->bindParam(:reporte_h,$_POST['h_comentarios_salida']);
	$query->bindParam(:receptor_h:$_POST['h_receptor_salida']);

	$query->execute();
/*END*/
?>