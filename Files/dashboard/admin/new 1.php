<?php
require '../../include/db_conn.php';
page_protect();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Iron Gym | Pagos</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">

</head>
      <body class="page-body  page-fade" onload="initializeMember()" style="background-color: #ff0000;">

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
									Cerrar Sesisón <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h2>Payments</h2>

		<hr/>
		
		
			<table border='0' align="center"  id="table-1">
						
						<tr>
<td style="color:darkgreen"><b><u>Nummero Social</u></b></td>
<TD style="color:darkgreen"><b><u>VENCIMIENTO DE LA MEMBRESÍA</u></b></TD>
<TD style="color:darkgreen"><b><u>Nombre </u></b></TD>
                            <TD style="color:darkgreen" ><b><u>ID Membresia</u></b></TD>
                            <TD style="color:darkgreen" ><b><u>Telefono</u></b></TD>
                            <TD style="color:darkgreen" ><b><u>Correo Electronico</u></b></TD>
                            
                            <TD style="color:darkgreen" ><b><u>Genero</u></b></TD>
                            
<TD style="color:darkgreen" ><b><u>Accion</u></b></TD>
<TD style="color:darkgreen" ><b><u>MEMO</u></b></TD>


								
						</tr>
						<?php


					$query = "SELECT * FROM inscripciones WHERE renovacion='yes' OR renovacion='si' ORDER BY vencimiento";

					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					        $uid   = $row['id_usuarioo'];
					        $planid=$row['id_plan'];
					        $query1  = "select * from usuarios WHERE id_usuario='$uid'";
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
									
									echo "<td><form action='Realizar pagos.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
					                <input type='hidden' name='planID' value='" . $planid . "'/><input type='submit' value='Add Payment ' class='btn btn-info'/></form></td>";
					                
					                $sno++;
					                
					                echo '<td><a href="memo.php?id='.$row['et_id'].'"><input type="button" class="a1-btn a1-green" value="Memo" ></a></td></tr>';
									
					                $uid = 0;
									
					            }
					        }
					    }
					}

					?>			

					</TABLE>


			<?php include('pie_pagina.php'); ?>
    	</div>

    </body>
</html>


