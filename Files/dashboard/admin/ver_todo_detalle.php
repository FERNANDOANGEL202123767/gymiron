<?php
require '../../include/db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Editar Miembros</title>
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
	#boxxe
	{
		width:230px;
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

		<h3>Editar detalles de miembro</h3>

		<hr />

			<?php
	    
				    $query  = "SELECT * FROM usuarios u 
				    		   INNER JOIN direccion a ON u.id_usuario=a.id
				    		   INNER JOIN  estado_salud h ON u.id_usuario=h.id_usuarioo
				    		   INNER JOIN inscripciones e on u.id_usuario=e.id_usuarioo
				    		   INNER JOIN planes p on e.id_plan=p.id_plan
							   WHERE id_usuario='$memid' AND (e.renovacion='yes' OR e.renovacion='si')";
				    //echo $query;
				    $result = mysqli_query($con, $query);
				    $sno    = 1;
				    
				    $name="";
				    $gender="";

				    if (mysqli_affected_rows($con) == 1) {
				        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				    
				            $name    = $row['nombre_usuario'];
				            $gender =$row['genero'];
				            $mobile = $row['telefono'];
				            $email   = $row['correo_electronico'];
				            $dob	 = $row['fecha_nacimiento'];         
				            $jdate    = $row['fecha_ingreso'];
				          	$streetname=$row['nombre_calle'];
				          	$state=$row['estado'];
				          	$city=$row['ciudad'];  
				          	$zipcode=$row['codigo_postal'];
				            $calorie=$row['calorias'];
				            $height=$row['altura'];
				            $weight=$row['peso'];
				            $fat=$row['grasa'];
				            $planname=$row['nombre_plan'];
				            $pamount=$row['monto'];
				            $pvalidity=$row['validez'];
				            $pdescription=$row['descripcion'];
				            $paiddate=$row['fecha_pago'];
				            $expire=$row['vencimiento'];
				            $remarks=$row['observaciones'];

				        }
				    }
				    else{
				    	 echo "<html><head><script>alert('Cambio fallido');</script></head></html>";
				    	 echo mysqli_error($con);
				    }


				?>
			
			
			
			
			<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Editar detalles de miembro</h3>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="editar_miembro.php">
         <table width="100%" border="0" align="center">
         <tbody><tr>
           <td height="35">
           	 </td></tr><tr>
           	   <td height="35">ID Usuario:</td>
           	   <td height="35"><input type="text" name="name" id="boxxe" readonly="" required="" value='<?php echo $memid?>'></td>
         	   </tr>
             <tr>
               <td height="35">Nombre:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $name?>'></td>
             </tr>
             <tr>
               <td height="35">Genero:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $gender?>'></td>
             </tr>
			 <tr>
               <td height="35">Telefono:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" maxlength="10" value='<?php echo $mobile ?>'></td>
             </tr>
			 <tr>
               <td height="35">Correo Electronico:</td>
               <td height="35"><input type="email" id="boxxe" readonly="" required="" value='<?php echo $email?>'></td>
             </tr>
			 <tr>
               <td height="35">Fecha de Nacimiento</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $dob?>'></td>
             </tr>
			 <tr>
               <td height="35">Fecha de Ingreso:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $jdate?>'></td>
             </tr>
			 <tr>
               <td height="35">Nombre de la Calle:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $streetname?>'></td>
             </tr>
			 <tr>
               <td height="35">Estado:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" name="state" value='<?php echo $state?>'></td>
             </tr>
			 <tr>
               <td height="35">Ciudad:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $city?>'></td>
             </tr>
              <tr>
               <td height="35">Codigo Postal:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $zipcode?>'></td>
             </tr>
			 <tr>
               <td height="35">Calorias:</td>
               <td height="35"><input type="text" id="boxxe" readonly="" value='<?php echo $calorie?>'></td>
             </tr>
			 <tr>
               <td height="35">Altura:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $height?>'></td>
             </tr>
			 <tr>
               <td height="35">Peso:</td>
               <td height="35"><input type="text" readonly="" value='<?php echo $weight?>' id="boxxe"></td>
             </tr>
			 <tr>
               <td height="35">Grasa:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $weight?>'></td>
             </tr>
			 <tr>
               <td height="35">Nombre de Plan:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $planname?>'></td>
             </tr>
			 <tr>
               <td height="35">Monto:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $pamount?>'></td>
             </tr>
			  <tr>
               <td height="35">Validez:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $pvalidity.' Month'?>'></td>
             </tr>
			  <tr>
               <td height="35">Descripcion:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $pdescription?>'></td>
             </tr>
			  <tr>
               <td height="35">Fecha Pago:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $paiddate?>'></td>
             </tr>
			 <tr>
               <td height="35">Vencimiento:</td>
               <td height="35"><input type="text" readonly="" id="boxxe" value='<?php echo $expire?>'></td>
             </tr>
			 <tr>
               <td height="35">Observaciones:</td>
               <td height="35"><textarea readonly style="resize:none; margin: 0px; width: 230px; height: 53px;"  ><?php echo $remarks?></textarea></td>
             </tr>
            
             
            
             <tr>
             </tr><tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Editar">
                 <a href="ver_tabla.php"><input class="a1-btn a1-blue" id="" value="Atras"></a></td>
             </tr>
           
         
         </tbody></table>
       
    </div>
    </div>   
			
			
					

			<?php include('pie_pagina.php'); ?>
    	</div>

  
</body>
</html>	

<?php
} 
