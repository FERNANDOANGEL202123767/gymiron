<?php
require '../../include/db_conn.php';
page_protect();

	  $id_plan =$_POST['id_plan'];
    $nombre = $_POST['nombre_plan'];
    $desc = $_POST['descripcion'];
    $validez = $_POST['validez'];
    $monto = $_POST['monto'];
    
   //Insertar datos en la tabla del plan
    $query="insert into planes(id_plan,nombre_plan,descripcion,validez,monto,activo) values('$id_plan','$nombre','$desc','$validez','$monto','si')";
   
   

	 if(mysqli_query($con,$query)==1){
        
        echo "<head><script>alert('PLAN añadido');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=Nuevo_Plan.php'>";
       
      }

    else{
        echo "<head><script>alert('Sin éxito, verifique nuevamente.');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>