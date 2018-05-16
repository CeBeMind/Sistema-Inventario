<?php
require("conexiondb.php");
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
?>