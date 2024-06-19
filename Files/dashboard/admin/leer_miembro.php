		

<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Historial de miembros</title>
   	<link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
<link href="a1style.css" rel="stylesheet" type="text/css">     
    <style>
    	.page-container .sidebar-menu #main-menu li#hassubopen > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>


</head>
   <body class="page-body  page-fade" onload="collapseSidebar()" style="background-color: #ff0000;">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="main.php">
					<img src="../../images/iron.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<!-- icono de colapso del logotipo -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation">
					<!-- agregue la clase "con animación" si desea que la barra lateral 
					tenga animación durante la transición de expandir/contraer -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>


    		<div class="main-content">
		
				<div class="row">
					
					<!-- Información de perfil y notificaciones -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Enlaces sin procesar -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Bienvenido <?php echo $_SESSION['nombre_usuario']; ?> 
							</li>							
						
							<li>
								<a href="cerrar sesión.php">
									Cerrar Sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Historial de miembros</h3>

		Detalles de : - <?php
			$id     = $_POST['name'];
			$query  = "select * from usuarios WHERE id_usuario='$id'";
			//echo $query;
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $name = $row['nombre_usuario'];
			        $memid=$row['id_usuario'];
			        $gender=$row['genero'];
			        $mobile=$row['telefono'];
			        $email=$row['correo_electronico'];
			        $joinon=$row['fecha_ingreso'];
			        echo $name;
			    }
			}
			?>

		<hr />


		
		<table border=1>
			<thead>
				<tr>
					<th>ID Membresia</th>
					<th>Nombre</th>
					<th>Genero</th>
				    <th>Telefono</th>
				    <th>Correo Electronico</th>
					<th>Fecha de Ingreso</th>
				</tr>
			</thead>
				<tbody>
					<?php
					
					        
					     echo "<tr><td>" . $memid . "</td>";
					     
					     echo "<td>" . $name . "</td>";
			     	     
			     	     echo "<td>" . $gender . "</td>";
			
		      	         echo "<td>" . $mobile . "</td>";

		      	         echo "<td>" . $email . "</td>";

					     echo "<td>" . $joinon . "</td></tr>";
					    
					?>								
				</tbody>
		</table>
				<br>
				<br>

				<h3>historial de pagos de : - <?php echo $name;?></h3>

		<table border=1>
			<thead>
				<tr>
					<th>Numero del Socio</th>
					<th>Nombre del Plan</th>
					<th>Descripción del plan</th>
					<th>Validacion</th>
					<th>Monto</th>
					<th>Fecha de pago</th>
					<th>Fecha de vencimiento</th>
					<th>Accion</th>
				</tr>
			</thead>
				<tbody>
					<?php
						
						$query1  = "select * from inscripciones WHERE id_usuarioo='$memid'";
						//echo $query;
						$result = mysqli_query($con, $query1);
						$sno    = 1;

						if (mysqli_affected_rows($con) != 0) {
						    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						      $pid=$row['id_plan'];
						      $query2="select * from planes where id_plan='$pid'";
						      $result2=mysqli_query($con,$query2);
						      if($result2){
						      	$row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);

						        echo "<td>" . $sno . "</td>";

						        echo "<td>" . $row1['nombre_plan'] . "</td>";

						        echo "<td width='380'>" . $row1['descripcion'] . "</td>";

						        echo "<td>" . $row1['validez'] . "</td>";

						        echo "<td>" . $row1['monto'] . "</td>";

						        echo "<td>" . $row['fecha_pago'] . "</td>";

						        echo "<td>" . $row['vencimiento'] . "</td>";
						        
						        $sno++;
						    }
						        
						        echo '<td>
								<a href="generar_factura.php?id_usuarioo='.$row['id_usuarioo'].'&id_plan='.$row['id_plan'].
								'&id_inscripcion='.$row['id_inscripcion'].'">
								<input type="button" class="a1-btn a1-blue" value="Nota" >
								</a>
								</td>
								</tr>';
						        $memid = 0;
						    }
						    
						}

					?>							
				</tbody>
		</table>


			<?php include('pie_pagina.php'); ?>
    	</div>
    </body>
</html>

