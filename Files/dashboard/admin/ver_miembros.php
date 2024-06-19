<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Vista de miembros</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	
	<style>
 	#button1
	{
	width:126px;
	}

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

		<h3>Editar miembro</h3>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Numero del Socio</th>
					<th>Vencimiento de Membresia</th>
					<th>ID Membresia</th>
					<th>Nombre</th>
					<th>Contacto</th>
					<th>Correo Electronico</th>
					<th>Genero</th>
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
							        $query1  = "select * from inscripciones WHERE id_usuarioo='$uid' AND renovacion='yes'";
							        $result1 = mysqli_query($con, $query1);
							        if (mysqli_affected_rows($con) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                echo "<tr><td>".$sno."</td>";

							                echo "<td>" . $row1['vencimiento'] . "</td>";
							                
							                echo "<td>" . $row['id_usuario'] . "</td>";

							                echo "<td>" . $row['nombre_usuario'] . "</td>";

							                echo "<td>" . $row['telefono'] . "</td>";

							                echo "<td>" . $row['correo_electronico'] . "</td>";

							                echo "<td>" . $row['genero'] . "</td>";

							                echo "<td>" . $row['fecha_ingreso'] ."</td>";
							                
							                $sno++;
							       
							                echo "<td><form action='leer_miembro.php' method='post'><input type='hidden' name='name' value='" . $uid . "'/>
											<input type='submit' class='a1-btn a1-blue' id='button1' value='Ver historial ' class='btn btn-info'/>
											</form>
											<form action='editar_miembro.php' method='post'><input type='hidden'  name='name' value='" . $uid . "'/>
											<input type='submit' class='a1-btn a1-green' id='button1' value='Editar' class='btn btn-warning'/>
											</form>
											<form action='del_member.php' method='post' onsubmit='return ConfirmDelete()'>
											<input type='hidden' name='name' value='" . $uid . "'/>
											<input type='submit' value='Eliminar' width='20px' id='button1' class='a1-btn a1-orange'/>
											</form>
											</td>
											</tr>";
							                $msgid = 0;
							            }
							        }
							    }
							}
						?>									
					</tbody>
				</table>

<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("¡Está seguro! ¿Quieres eliminar este usuario?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>

			<?php include('pie_pagina.php'); ?>
    	</div>
    </body>
</html>





