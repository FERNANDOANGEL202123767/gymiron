<?php
require '../../include/db_conn.php';
$month=$_GET['mm'];
$year=$_GET['yy'];

$query = "SELECT DISTINCT u.id_usuario, u.nombre_usuario, u.genero, u.telefono,
u.correo_electronico, u.fecha_ingreso, a.estado, a.ciudad,
e.fecha_pago, e.vencimiento, p.nombre_plan, p.monto, p.validez
FROM usuarios u
INNER JOIN direccion a ON u.id_usuario = a.id
INNER JOIN inscripciones e ON u.id_usuario = e.id_usuarioo
INNER JOIN planes p ON p.id_plan = e.id_plan
WHERE e.fecha_pago LIKE '".$year."-".$month."___'";


  

$res=mysqli_query($con,$query);
echo "<tbody>";

$sno    = 1;
$totalamount=0;
if (mysqli_affected_rows($con) != 0) {

	echo "<thead>
				<tr>
					<th>numero de serie</th>
					<th>ID Miembro</th>
					<th>Nombre</th>
					<th>Contacto</th>
					<th>Genero</th>
					<th>estado</th>
					<th>fecha pago</th>
					<th>vencimiento</th>
					<th>nombre del plan</th>
					<th>monto</th>
					<th>Validez</th>
				</tr>
	</thead>";

    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
      

                echo "<tr><td>".$sno."</td>";
                
                echo "<td>" . $row['id_usuario'] . "</td>";

                echo "<td>" . $row['nombre_usuario'] . "</td>";

                echo "<td>" . $row['telefono'] . "</td>";


                echo "<td>" . $row['genero'] . "</td>";

                echo "<td>" . $row['estado'] . "</td>";

                echo "<td>" . $row['fecha_pago'] . "</td>";

                echo "<td>" . $row['vencimiento'] . "</td>";

                echo "<td>" . $row['nombre_plan'] . "</td>";

                echo "<td>" . $row['monto'] . "</td>";

                echo "<td>" . $row['validez'] . "</td>";
                
                $totalamount=$totalamount+$row['monto'];
                $sno++;
            
        
    }

 	$monthName = date("F", mktime(0, 0, 0, $month, 10));

    echo "<tr><td colspan=11 align='center'><h3>Ingreso total en ".$monthName. " es $".$totalamount."</h3></td></tr>";

}
else{
		$monthName = date("F", mktime(0, 0, 0, $month, 10));
		echo "<h2>No se encontraron datos en".$monthName." ".$year."</h2";
}
echo "</tbody>";

