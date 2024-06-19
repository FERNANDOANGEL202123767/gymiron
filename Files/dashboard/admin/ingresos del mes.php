
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Ingresos por mes</title>
     <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
     <style>
    	.page-container .sidebar-menu #main-menu li#overviewhassubopen > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>

</head>
    <body class="page-body  page-fade" onload="collapseSidebar();showMember();" style="background-color: #ff0000;">

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

		<h3>Ingresos por mes</h3>

		<hr />

		<form>
	<?php
	// establecer el rango de años de inicio y fin
	$año_matriz = range(2000, date('Y'));
	?>
	<!-- mostrando la lista desplegable -->
	

	<?php
	// establecer la matriz de meses
	$Matriz_meses_formateada = array(
	                    "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril",
	                    "05" => "Mayo", "06" => "Junio", "07" => "Julio", "08" => "Agosto",
	                    "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre",
	                );

	?>
	<!-- mostrando la lista desplegable -->
	<select name="month" id="smonth">
	    <option value="0">Selecciona el mes</option>
	    <?php

	    foreach ($Matriz_meses_formateada as $month) {
	        // si desea seleccionar un mes en particular
	        $mm=implode(array_keys($Matriz_meses_formateada,$month));
	        $selected = ($mm == date('m')) ? 'selected' : '';
	        // si desea agregar 0 adicional antes del mes, descomente la línea a continuación
	        //$month = str_pad($month, 2, "0", STR_PAD_LEFT);
	        echo '<option '.$selected.' value="'.$mm.'">'.$month.'</option>';
	    }
	    ?>
	</select>

	<input type="button" class="a1-btn a1-blue" style="margin-bottom:5px;" name="search" onclick="showMember();" value="Buscar">

</form>

<table id="memmonth"border=2 style="font-size:15px;">
	
</table>


<script>

function showMember() {
    var año = document.getElementById("syear");
    var mes = document.getElementById("smonth");
    var iaño = año.selectedIndex;
    var imes = mes.selectedIndex;
    var mnumero = mes.options[imes].value;
    var ynumero = año.options[iaño].value;
    if (mnumero == "0" || ynumero == "0") {
        document.getElementById("memmonth").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("memmonth").innerHTML = this.responseText;
            }
        };
        // Corrección: Cambiar mnumber a mnumero
    xmlhttp.open("GET", "income_month.php?mm=" + mnumero + "&yy=" + ynumero + "&flag=0", true);
        xmlhttp.send();
    }
}


</script>

		<?php include('pie_pagina.php'); ?>
    	
    	</div>

    </body>
</html>
