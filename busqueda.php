<?php 
	
	$mysql_server = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "inventario";
	$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
	if ($mysqli->connect_errno) {
		printf("Connection failed: %s \n", $mysqli->connect_error);
		exit();
	}

	$salida = "";
	$query = "SELECT * FROM registro ORDER By id";

	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query = "SELECT Tipo, marca, modelo, bienes, asignado, sede, municipio, fecha_entrega, entrega_personal, descripcion_entrega, reporte, fecha_salidaotic, salida_personal salida_pcp, personal_pcp, duracion  FROM registro WHERE Tipo LIKE '%".$q."%' OR marca LIKE '%".$q."%' OR modelo LIKE '%".$q."%' OR bienes LIKE '%".$q."%' OR asignado LIKE '%".$q."%' OR sede LIKE '%".$q."%' OR municipio LIKE '%".$q."%' OR fecha_entrega LIKE '%".$q."%' OR entrega_personal LIKE '%".$q."%' OR descripcion_entrega LIKE '%".$q."%' OR reporte LIKE '%".$q."%' OR fecha_salidaotic LIKE '%".$q."%' OR salida_personal LIKE '%".$q."%' OR salida_pcp LIKE '%".$q."%' OR personal_pcp LIKE '%".$q."%' OR duracion LIKE '%".$q."%'";
		};

		$resultado = $mysqli->query($query);

		if($resultado->num_rows > 0){

			$salida.= "<table class='table table-hover table-sm border opcion table-sm table-bordered' id='td'>
                        <thead>
                            <tr>
                                <th scope='col'>Nº Orden</th>
                                <th scope='col'>Tipo</th>
                                <th scope='col'>Marca</th>
                                <th scope='col'>Modelo</th>
                                <th scope='col'>Nª Bienes</th>
                                <th scope='col'>Asignado</th>
                                <th scope='col'>Sede</th>
                                <th scope='col'>Municipio</th>
                                <th scope='col'>Fecha de Recepcion</th>
                                <th scope='col'>Recibido por:</th>
                                <th scope='col'>Descripcion de fallas</th>
                                <th scope='col'>Reporte</th>
                                <th scope='col'>salida OTIC</th>
                                <th scope='col'>Entregado por:</th>
                                <th scope='col'>Descripcion de fallas</th>
                                <th scope='col'>Reporte</th>
                            </tr>
                        </thead>
                        <tbody>

			";

			while($fila = $resultado->fetch_assoc()) {
				$salida.= "<tr>
									<td id='td'>".$fila['Tipo']."</td>
				                    <td id='td'>".$fila['marca']."</td>
				                    <td id='td'>".$fila['modelo']."</td>
				                    <td id='td'>".$fila['bienes']."</td>
				                    <td id='td'>".$fila['asignado']."</td>
				                    <td id='td'>".$fila['sede']."</td>
				                    <td id='td'>".$fila['municipio']."</td>
				                    <td id='td'>".$fila['fecha_entrega']."</td>
				                    <td id='td'>".$fila['entrega_personal']."</td>
				                    <td id='td'>".$fila['descripcion_entrega']."</td>
				                    <td id='td'>".$fila['reporte']."</td>
				                    <td id='td'>".$fila['fecha_salidaotic']."</td>
				                    <td id='td'>".$fila['salida_personal']."</td>
				                    <td id='td'>".$fila['salida_pcp']."</td>
				                    <td id='td'>".$fila['personal_pcp']."</td>
				                    <td id='td'>".$fila['duracion']."</td>
				                    
				                </tr>
			                ";
				
			}
				
				$salida.="</tbody> </table>";

		}else{
			$salida.="No Hay Datos...";
		};

		echo $salida;

		$mysqli->close();

		



 ?>