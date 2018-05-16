<?php
require("conexiondb.php");
/* Asginación */
	/* Asignación Hardware rellenado */

	/* Asignación Hardware obtención */
	$query->prepare('SELECT COUNT(id_usuario) from Usuarios');
	$query->execute();
	$numRows = $query->fetchColumn(0); $idUser = $numRows+1;

	if (isset($_POST['inop_asigHard'])) {
		$query->prepare('UPDATE Estatus SET estado_actual_unidad=2 WHERE id_estatus=:id_estatus'); //Falta tomar la id_estatus
		$query->execute();
	}

	$query->prepare('INSERT INTO Usuarios VALUES(:idU_h,:nomU_h,:apeU_h,:ciU_h)');
	$query->bindParam(:idU_h,$idUser);
	$query->bindParam(:nomU_h,$_POST['nombre_asig_h']);
	$query->bindParam(:apeU_h,$_POST['apellido_asig_h']);
	$query->bindParam(:ciU_h,$_POST['ci_asig_h']);

	$query->execute();
/*END*/

?>