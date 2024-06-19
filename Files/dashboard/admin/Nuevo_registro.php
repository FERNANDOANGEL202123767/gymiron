<?php
require '../../include/db_conn.php';
page_protect();

// Verifica si se ha enviado un ID de huella
if(isset($_GET['idHuella'])) {
    // Obtiene el ID de la huella enviado desde el cliente
    $idHuella = $_GET['idHuella'];
    
    // Asigna el ID de la huella al campo correspondiente en el formulario
    echo "<script>document.getElementById('idHuella').value = '$idHuella';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Iron Gym | Nuevo Usuario</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
        .page-container .sidebar-menu #main-menu li#regis > a {
            background-color: #2b303a;
            color: #ffffff;
        }
       #boxx
    {
        width:220px;
    }</style>

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
                    
                    
                    <!-- {Enlaces sin procesar} -->
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

        
            <h3>Nuevo Registro</h3>

        <hr />
        
        <div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
        <div class="a1-container a1-dark-gray a1-center">
            <h6>NUEVA ENTRADA</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="nuevo_enviar.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
             <tr>
               <td>Número de Socio:</td>
               <td ><input type="text" id="boxx" name="numero_socio" value="<?php echo time(); ?>" readonly required/></td>
             </tr>
             
             <!-- Agrega campo para el nombre -->
             <tr>
               <td>Nombre:</td>
               <td><input name="nombre" id="boxx" required/></td>
             </tr>

             <!-- Agrega campo para la dirección -->
             <tr>
               <td>Nombre de la calle:</td>
               <td><input  name="nombre_calle" id="boxx"   required/></td>
             </tr>

             <!-- Agrega campo para la ciudad -->
             <tr>
               <td>Ciudad:</td>
               <td><input type="text" name="ciudad" id="boxx" required/></td>
             </tr>

             <!-- Agrega campo para el código postal -->
             <tr>
               <td>Código Postal:</td>
               <td><input type="number" name="codigo_postal" id="boxx" maxlength="6" required / ></td>
             </tr>

             <!-- Agrega campo para el estado -->
            <tr>
               <td>Estado:</td>
               <td><input type="text" name="estado" id="boxx" required/ size="30"></td>
             </tr>

            <!-- Agrega campo para el género -->
            <tr>
               <td>Género:</td>
               <td><select name="genero" id="boxx" required>

                    <option value="">--Por favor seleccione--</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenina">Femenina</
                    </select></td>
             </tr>

            <!-- Agrega campo para la fecha de nacimiento -->
            <tr>
               <td>Día de tu Cumpleaños</td>
               <td><input type="date" name="fecha_nacimiento" id="boxx" required/ size="30"></td>
             </tr>

            <!-- Agrega campo para el número de teléfono -->
             <tr>
               <td>Número de Teléfono</td>
               <td><input type="number" name="telefono" id="boxx" maxlength="10" required/ size="30"></td>
             </tr>

            <!-- Agrega campo para el correo electrónico -->
             <tr>
               <td>Correo Electrónico</td>
               <td><input type="email" name="correo_electronico" id="boxx" required/ size="30"></td>
             </tr>

            <!-- Agrega campo para la fecha de ingreso -->
             <tr>
               <td>Fecha de Ingreso</td>
               <td><input type="date" name="fecha_ingreso" id="boxx" required size="30"></td>
             </tr>

            <!-- Agrega campo para el plan -->
             <tr>
               <td>Plan:</td>
               <td><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
                    <option value="">--Por favor seleccione--</option>
                    <?php
                        $query="select * from planes where activo='si'";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select></td>
             </tr>
            
            <!-- Agrega espacio para mostrar detalles del plan -->
            <tbody id="plandetls">
                 
            </tbody>


             <tr>
             <tr>
    <td>ID Huella:</td>
    <td><input type="text" id="idHuella" name="idHuella" readonly></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><button onclick="registrarHuella()">Agregar Huella</button></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Registrar">
        <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reiniciar"></td>
</tr>

           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
        
        <script>
            function myplandetail(str){

                if(str==""){
                    document.getElementById("plandetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                     // código para IE7+, Firefox, Chrome, Opera, Safari
                         xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                         document.getElementById("plandetls").innerHTML=this.responseText;
                        
                        }
                    };
                    
                     xmlhttp.open("GET","infoplan.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>
        
       <script>
        function registrarHuella() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Muestra el ID de la huella en el campo de texto
            document.getElementById("idHuella").value = this.responseText;
        }
    };
    xhttp.open("GET", "registrar_huella.php", true);
    xhttp.send();
}

       </script>
        
        <?php 
            include('pie_pagina.php'); 
        ?>
    </div>

    </body>
</html>
