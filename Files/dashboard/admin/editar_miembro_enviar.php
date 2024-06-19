<?php
require '../../include/db_conn.php';
page_protect();
    
    
   $uid=$_POST['id_usuarioo'];
   $uname=$_POST['nombre_usuario'];
   $gender=$_POST['genero'];
   $mobile=$_POST['telefono'];
   $email=$_POST['correo_electronico'];
   $dob=$_POST['fecha_nacimiento'];
   $jdate=$_POST['fecha_ingreso'];
   $stname=$_POST['nombre_calle'];
   $state=$_POST['estado'];
   $city=$_POST['ciudad'];
   $zipcode=$_POST['codigo_postal'];
   $calorie=$_POST['calorias'];
   $height=$_POST['altura'];
   $weight=$_POST['peso'];
   $fat=$_POST['grasa'];
   $remarks=$_POST['observaciones'];
    
    $query1="update usuarios set nombre_usuario='".$uname."',genero='".$gender."',telefono='".$mobile."',correo_electronico='".$email."',fecha_nacimiento='".$dob."',fecha_ingreso='".$jdate."' where id_usuario='".$uid."'";

   if(mysqli_query($con,$query1)){
     $query2="update direccion set nombre_calle='".$stname."',estado='".$state."',ciudad='".$city."',codigo_postal='".$zipcode."' where id='".$uid."'";
     if(mysqli_query($con,$query2)){
        $query3="update estado_salud set calorias='".$calorie."',altura='".$height."',peso='".$weight."',grasa='".$fat."',observaciones='".$remarks."' where id_usuarioo='".$uid."'";
        if(mysqli_query($con,$query3)){
            echo "<html><head><script>alert('Actualización de miembros exitosamente');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=ver_miembros.php'>";
        }else{
             echo "<html><head><script>alert('¡ERROR! Operación de actualización fallida');</script></head></html>";
             echo "error".mysqli_error($con);
        }
     }else{
        echo "<html><head><script>alert('¡ERROR! Operación de actualización fallida');</script></head></html>";
         echo "error".mysqli_error($con);
     }
   }else{
    echo "<html><head><script>alert('¡ERROR! Operación de actualización fallida');</script></head></html>";
    echo "error".mysqli_error($con);
   }