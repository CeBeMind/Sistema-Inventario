<?php 

	require("conexiondb.php"); 
	/** conectamos con la Base de Datos**/

	$salida = "";
	$query->prepare('Select * from Entradas');
	$inner = $query->execute();
	$entradas = $inner->fetchAll();
	foreach ($entradas as $ent) {
		echo "<td>{$ent['numero_orden']}</td>";
		echo "<td>{$ent['fecha_entrada']}</td>";
			$idHardware = $ent['id_hardware'];
			$query->prepare('Select * from Hardware where id_hardware=:id_hardware');
			$query->bindParam(:id_hardware,$idHardware);
			$inner = $query->execute();
			$hardware = $inner->fetchAll();
			foreach ($hardware as $hw) {
				echo "<td>{$hw['tipo_hardware']}</td>";
				echo "<td>{$hw['marca_hardware']}</td>";
				echo "<td>{$hw['modelo_hardware']}</td>";
				echo "<td>{$hw['bienes_hardware']}</td>";
			}
	}
	
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