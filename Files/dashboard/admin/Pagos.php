<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Pagos</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
    	.page-container .sidebar-menu #main-menu li#paymnt > a {
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
									Cerrar sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h2>Pagos</h2>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr>
					<th>Numero de Socio</th>
					<th>Vencimiento de Membresía</th>
					<th>Nombre</th>
					<th>Id Membresia</th>
					<th>Telefono</th>
					<th>Correo Electronico</th>
					<th>Genero</th>
					<th>Accion</th>
				</tr>
			</thead>

				<tbody>

				<?php


					$query  = "select * from inscripciones where renovacion='yes' ORDER BY vencimiento";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					        $id_usuarioo   = $row['id_usuarioo'];
					        $id_plan=$row['id_plan'];
					        $query1  = "select * from usuarios WHERE id_usuario='$id_usuarioo'";
					        $result1 = mysqli_query($con, $query1);
					        if (mysqli_affected_rows($con) == 1) {
					            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
					                
					                 echo "<tr><td>".$sno."</td>";
					                echo "<td>" . $row['vencimiento'] . "</td>";
					                echo "<td>" . $row1['nombre_usuario'] . "</td>";
					                echo "<td>" . $row1['id_usuario'] . "</td>";
					                echo "<td>" . $row1['telefono'] . "</td>";
					                echo "<td>" . $row1['correo_electronico'] . "</td>";
					                echo "<td>" . $row1['genero'] . "</td>";
					                
					                $sno++;
					                
					                echo "<td><form action='Realizar pagos.php' method='post'><input type='hidden' name='userID' value='" . $id_usuarioo . "'/>
					                <input type='hidden' name='planID' value='" . $id_plan . "'/><input type='submit' class='a1-btn a1-blue' value='Pago Realizado ' class='btn btn-info'/></form></td></tr>";
									
					                $id_usuarioo = 0;
					            }
					        }
					    }
					}

					?>									
				</tbody>

		</table>


			<?php include('pie_pagina.php'); ?>
    	</div>

    </body>
</html>


