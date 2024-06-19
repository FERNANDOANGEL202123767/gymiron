<?php
require '../../include/db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Editar miembro</title>
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
					
					<!--  Información de perfil y notificaciones-->
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
			<hr/>
			<?php
	    
				    $query  = "SELECT * FROM usuarios u 
				    		   INNER JOIN direccion a ON u.id_usuario=a.id
				    		   INNER JOIN  estado_salud h ON u.id_usuario=h.id_usuarioo
				    		   WHERE id_usuario='$memid'";
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
        	<h6>EDITAR PERFIL DEL USUARIO</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="editar_miembro_enviar.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">ID Usuario:</td>
           	   <td height="35"><input id="boxxe" type="text" name="id_usuarioo" readonly required value=<?php echo $memid?>></td>
         	   </tr>
             <tr>
               <td height="35">Nombre:</td>
               <td height="35"><input id="boxxe" type="text" name="nombre_usuario" value='<?php echo $name?>'></td>
             </tr>
             <tr>
               <td height="35">Genero:</td>
               <td height="35"><select id="boxxe" name="genero" id="gender" required>

						<option <?php if($gender == 'Male'){echo("selected");}?> value="Masculino">Masculino</option>
						<option <?php if($gender == 'Female'){echo("selected");}?> value="Femenina">Femenina</option>
						</select></td><br>
             </tr>
			  <tr>
               <td height="35">Telefono:</td>
               <td height="35"><input id="boxxe" type="number" name="telefono" maxlength="10" value=<?php echo $mobile?>></td>
             </tr>
             <tr>
               <td height="35">Correo Electronico:</td>
               <td height="35"><input id="boxxe" type="email" name="correo_electronico" required value=<?php echo $email?>></td>
             </tr>
			 <tr>
               <td height="35">Fecha de Nacimiento:</td>
               <td height="35"><input type="date" id="boxxe" name="fecha_nacimiento" value=<?php echo $dob?>></td>
             </tr>
			 <tr>
               <td height="35">Fecha e Ingreso:</td>
               <td height="35"><input type="date" id="boxxe" name="fecha_ingreso" value=<?php echo $jdate?>></td>
             </tr>

			<tr>
               <td height="35">Nombre de la Calle:</td>
               <td height="35"><input type="text" id="boxxe" name="nombre_calle" value='<?php echo $streetname?>'></td>
             </tr>

			 <tr>
               <td height="35">Estado:</td>
               <td height="35"><input type="text" id="boxxe" name="estado" value='<?php echo $state?>'></td>
             </tr>
			 <tr>
               <td height="35">Ciudad:</td>
               <td height="35"><input type="text" id="boxxe" name="ciudad" value='<?php echo $city?>'></td>
             </tr>
             <tr>
               <td height="35">Codigo Postal:</td>
               <td height="35"><input type="text" id="boxxe" name="codigo_postal" value='<?php echo $zipcode?>'></td>
             </tr>
			 <tr>
               <td height="35">Calorias:</td>
               <td height="35"><input type="text" id="boxxe" name="calorias" value=<?php echo $calorie?>></td>
             </tr>
			 <tr>
               <td height="35">Altura:</td>
               <td height="35"><input type="text" id="boxxe" name="altura" value=<?php echo $height?>></td>
             </tr>
			 <tr>
               <td height="35">Peso:</td>
               <td height="35"><input type="text" id="boxxe" name="peso" value=<?php echo $weight?>></td>
             </tr>
			 <tr>
               <td height="35">Grasa:</td>
               <td height="35"><input type="text" id="boxxe" name="grasa" value=<?php echo $fat?>></td>
             </tr>
			 <tr>
               <td height="35">Observaciones:</td>
               <td height="35"><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;" name="observaciones" id="boxxe" ><?php echo $remarks?></textarea></td>
             </tr>
			 
			 
			 
             <br>
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Actualizar" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reiniciar"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
			
			
			
			
					

			<?php include('pie_pagina.php'); ?>
    	</div>

  
</body>
</html>	

<?php
} 
