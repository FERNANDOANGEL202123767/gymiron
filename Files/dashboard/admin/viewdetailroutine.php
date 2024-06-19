<?php
require '../../include/db_conn.php';
page_protect();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Iron Gym | Rutina de detalle</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
    	.page-container .sidebar-menu #main-menu li#routinehassubopen > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>
	<script>
	function myFunction()
	{
		var prt=document.getElementById("print");
		var WinPrint=window.open('','','left=0,top=0,width=800,height=900,tollbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prt.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
		setPageHeight("297mm");
		setPageWidth("210mm");
		setHtmlZoom(100);
		//window.location.replace("index.php?query=");
	}
	</script>

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
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
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
				<h2>Detalle de rutina</h2>
				<hr/>

		<?php
		$id=$_GET['id'];
		$sql="Select * from horario t Where t.id_horario=$id";
		$res=mysqli_query($con, $sql);
					 if($res){
						      	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
				
						      }
						
		?>

		<div id=print>
		<table width="619" height="673" border="1" align="center">
  <tr>
    <td height="87" colspan="2">Nombre de la rutina:<?php echo $row['nombre_horario'] ?> &ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;<span align="right"> <img src="iron.png" width="121" height="114"  alt=""/></span></td>
    </tr>
  <tr>
    <td width="186" height="103">Lunes:</td>
    <td width="417"><?php echo $row['dia1'] ?></td>
  </tr>
  <tr>
    <td height="96">Martes:</td>
    <td><?php echo $row['dia2'] ?></td>
  </tr>
  <tr>
    <td height="87">Miercoles:</td>
    <td><?php echo $row['dia3'] ?></td>
  </tr>
  <tr>
    <td height="92">Jueves:</td>
    <td><?php echo $row['dia4'] ?></td>
  </tr>
  <tr>
    <td height="84">Viernes:</td>
    <td><?php echo $row['dia5'] ?></td>
  </tr>
  <tr>
    <td height="75">Sabado:</td>
    <td><?php echo $row['dia6'] ?></td>
  </tr>
        </table></div>

				<input type="button" class="a1-btn a1-blue" value="RUTINA DE IMPRESIÓN" onclick="myFunction()">
		
		
		
		
		
		
		

			

    	</div>

    </body>
	<?php include('pie_pagina.php'); ?>
</html>


										
