<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Nuevo Plan</title>
  
	<link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
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
			
					<!-- icono de colapso del logotipo-->
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

		<h3>Plan de actualización</h3>

		<hr />
		<?php
		$id=$_GET['id'];
		$sql="Select * from planes t Where t.id_plan=$id";
		$res=mysqli_query($con, $sql);
		
					 if($res){
						      	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
				
						      }
						
		?>
		
		<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Plan de actualización</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="updateplan.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">PLAN ID:</td>
           	   <td height="35">
				<input type="text" name="planid" id="planID" readonly value='<?php echo $row['id_plan'] ?>'></td>
				
				
         	   </tr>
             <tr>
               <td height="35">Nombre del Plan:</td>
               <td height="35"><input name="planname" id="planName" type="text" value='<?php echo $row['nombre_plan'] ?>'  size="40"></td>
             </tr>
             <tr>
               <td height="35">Descripcion:</td>
               <td height="35"><input type="text" name="desc" id="planDesc"  value='<?php echo $row['descripcion'] ?>' size="40"></td>
             </tr>
             <tr>
               <td height="35">Validez:</td>
               <td height="35"><input type="number" name="planval" id="planVal" value='<?php echo $row['validez'] ?>' size="40"></td>
             </tr>
             
             <tr>
               <td height="35">Monto:</td>
               <td height="35"><input type="text" name="amount" id="planAmnt" value='<?php echo $row['monto'] ?>'  size="40"></td>
             </tr>
             
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="ACTUALIZAR PLANES" >
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


