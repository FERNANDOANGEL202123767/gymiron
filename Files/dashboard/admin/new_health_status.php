<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>

	<title>Iron Gym | Estado de salud</title>
  <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	 <style>
    	.page-container .sidebar-menu #main-menu li#health_status > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>
	
	<style>
 	#button1
	{
	width:126px;
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

		<h2>Esatdo de Salud</h2>

		<hr />

		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Numero del Socio</th>
					<th>ID Membresia</th>
					<th>Nombre</th>
					<th>Contacto</th>
					<th>Correo Electronico</th>
					<th>Genero</th>
					<th>Fecha de Nacimiento</th>
					<th>Fecha de Ingreso</th>
					<th>Accion</th></h2>
				</tr>
			</thead>
				<tbody>

						<?php
							$query  = "select * from usuarios ORDER BY fecha_ingreso";
							//echo $query;
							$result = mysqli_query($con, $query);
							$sno    = 1;

							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        $uid   = $row['id_usuario'];
							        $uname;
							        $udob;
							        $ujoing;
							        $ugender;
							        $query1  = "select * from inscripciones WHERE id_usuarioo='$uid' AND renovacion='yes'";
							        $result1 = mysqli_query($con, $query1);
							        if (mysqli_affected_rows($con) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                echo "<tr><td>".$sno."</td>";
							                
							                echo "<td>" . $row['id_usuario'] . "</td>";

							                echo "<td>" . $row['nombre_usuario'] . "</td>";

							                echo "<td>" . $row['telefono'] . "</td>";

							                echo "<td>" . $row['correo_electronico'] . "</td>";

							                echo "<td>" . $row['genero'] . "</td>";

							                echo "<td>" . $row['fecha_nacimiento'] . "</td>";

							                echo "<td>" . $row['fecha_ingreso'] ."</td>";
							                
							                $uname=$row['nombre_usuario'];
							       			$udob=$row['fecha_nacimiento'];
							        		$ujoing=$row['fecha_ingreso'];
							        		$ugender=$row['genero'];

							                $sno++;
							       
							                echo "<td><form action='health_status_entry.php' method='post'><input type='hidden' name='uid' value='" . $uid . "'/>
							                <input type='hidden' name='uname' value='" . $uname . "'/>
							                <input type='hidden' name='udob' value='" . $udob . "'/>
											
							                <input type='hidden' name='ujoin' value='" . $ujoing . "'/>
							                <input type='hidden' name='ugender' value='" . $ugender . "'/><input type='submit' class='a1-btn a1-blue' id='button1' value='Estado_salud' class='btn btn-info'/></form></td></tr>";
							                $msgid = 0;
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

