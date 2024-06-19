<?php
require '../../include/db_conn.php';
$month=$_GET['mm'];
$year=$_GET['yy'];
$flag=$_GET['flag'];

$query="";

if($flag==0)
	$query="select * from usuarios u INNER JOIN direccion a on u.id_usuario=a.id where u.fecha_ingreso like '".$year."-".$month."___'";
else if($flag==1)
	$query="select * from usuarios u INNER JOIN direccion a on u.id_usuario=a.id where u.fecha_ingreso like '".$year."______'";
  

$res=mysqli_query($con,$query);
echo "<tbody border=1>";

$sno    = 1;

if (mysqli_affected_rows($con) != 0) {

	echo "<thead>
				<tr>
					<th>Numero de Socio</th>
					<th>ID Membresia</th>
					<th>Nombre</th>
					<th>Contacto</th>
					<th>Genero</th>
					<th>Estado</th>
					<th>Ciudad</th>
					<th>Fecha de Nacimiento</th>
					<th>Fecha de Ingreso</th>
				</tr>
	</thead>";

    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
      

                echo "<tr><td>".$sno."</td>";
                
                echo "<td>" . $row['id_usuario'] . "</td>";

                echo "<td width='25%'>" . $row['nombre_usuario'] . "</td>";

                echo "<td>" . $row['telefono'] . "</td>";


                echo "<td>" . $row['genero'] . "</td>";

                echo "<td>" . $row['estado'] . "</td>";

                echo "<td>" . $row['ciudad'] . "</td>";

                echo "<td>" . $row['fecha_nacimiento'] . "</td>";

                echo "<td>" . $row['fecha_ingreso'] ."</td></tr>";
                
                $sno++;
            
        
    }

}
else{
	if($flag==0){
		$monthName = date("F", mktime(0, 0, 0, $month, 10));
		echo "<h2>No se encontraron datos en ".$monthName." ".$year."</h2>";
	}
	else if($flag==1)
		echo "<h2>No se encontraron datos en ".$year."</h2";
}
echo "</tbody>";


?>
