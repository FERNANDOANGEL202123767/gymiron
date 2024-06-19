
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym| Ver Plan</title>
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
		.page-container .sidebar-menu #main-menu li#planhassubopen > a {
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
								<a href="cerrar sessión.php">
									Cerrar sesión <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Gestionar plan</h3>

		<hr />

		<table class="table table-bordered datatable" id="table-1" border=1>

			<thead>
				<tr>
					<th>Numero del Socio</th>
					<th>Id Plan</th>
					<th>Nombre del Plan</th>
					<th>Detalle del Plan</th>
					<th>Meses</th>
					<th>Tasa</th>
					<th>Acción</th>
				</tr>
			</thead>		
				<tbody>
					<?php


					$query  = "select * from planes where activo='si' ORDER BY monto DESC";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					        $msgid = $row['id_plan'];
					        
					        
					        echo "<tr><td>" . $sno . "</td>";
					        echo "<td>" . $row['id_plan'] . "</td>";
					        echo "<td>" . $row['nombre_plan'] . "</td>";
					        echo "<td width='380'>" . $row['descripcion'] . "</td>";
					        echo "<td>" . $row['validez'] . "</td>";
					        echo "<td>$" . $row['monto'] . "</td>";
					        
					        $sno++;
					        
					        echo '<td><a href=edit_plan.php?id="'.$row['id_plan'].'">
							<input type="button" class="a1-btn a1-blue" id="boxxe" style="width:100%" value="Editar Plan" >
							</a>
							<form action="del_plan.php" method="post" onSubmit="return ConfirmDelete();">
							<input type="hidden" name="name" value="' . $msgid .'"/>
							<input type="submit" id="button1" value="Eliminar Plan" class="a1-btn a1-orange"/>
							</form>
							</td></tr>';
					        
							$msgid = 0;
					    }
					    
					}

					?>																
				</tbody>
		</table>


<?php include('pie_pagina.php'); ?>
    	</div>

    </body>
</html>



				
