<?php
require '../../include/db_conn.php';
page_protect();

 $memID=$_POST['numero_socio'];
 $uname=$_POST['nombre'];
 $stname=$_POST['nombre_calle'];
 $ciudad=$_POST['ciudad'];
 $codigo_postal=$_POST['codigo_postal'];
 $estado=$_POST['estado'];
 $genero=$_POST['genero'];
 $fecha_nacimiento=$_POST['fecha_nacimiento'];
 $phn=$_POST['telefono'];
 $correo_electronico=$_POST['correo_electronico'];
 $fecha_ingreso=$_POST['fecha_ingreso'];
 $plan=$_POST['plan'];

//insertando en la tabla de usuarios
$query="insert into usuarios(
  nombre_usuario,genero,telefono,correo_electronico,fecha_nacimiento,fecha_ingreso,id_usuario)
 values('$uname','$genero','$phn','$correo_electronico','$fecha_nacimiento','$fecha_ingreso','$memID')";
    if(mysqli_query($con,$query)==1){
      //recuperar información del plan seleccionado por el usuario
      $query1="select * from planes where id_plan='$plan'";
      $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("America/Mexico_City");
          $d=strtotime("+".$value[3]." Meses");
          $cdate=date("Y-m-d"); //fecha actual
          $expiredate=date("Y-m-d",$d); //agregar recuperación de validez del plan a la fecha actual
          //insertando en la tabla inscripciones del ID de usuario correspondiente
          $query2="insert into inscripciones(
            id_plan,id_usuarioo,fecha_pago,vencimiento,renovacion)
             values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

            $query4="insert into estado_salud(id_usuarioo) values('$memID')";
            if(mysqli_query($con,$query4)==1){

              $query5="insert into direccion(id,nombre_calle,estado,ciudad,codigo_postal) values('$memID','$stname','$estado','$ciudad','$codigo_postal')";
              if(mysqli_query($con,$query5)==1){
               echo "<head><script>alert('Miembro agregado ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=Nuevo_registro.php'>";
              }
              else{
                  echo "<head><script>alert('Miembro agregado fallido');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Eliminar el registro de usuarios si no se pudo ejecutar la inserción en la tabla inscripciones
                 $query3 = "DELETE FROM usuarios WHERE id_usuario='$memID'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Miembro agregado fallido');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Eliminar el registro de usuarios si no se pudo ejecutar la inserción en la tabla inscripciones
                $query3 = "DELETE FROM usuarios WHERE id_usuario='$memID'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Miembro agregado fallido');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Eliminar el registro de usuarios si no se pudo ejecutar la inserción en la tabla inscripciones
             $query3 = "DELETE FROM usuarios WHERE id_usuario='$memID'";
             mysqli_query($con,$query3);
          }

         
        }
        else
        {
          echo "<head><script>alert('Miembro agregado fallido');</script></head></html>";
          echo "error: ".mysqli_error($con);
           //Eliminar el registro de usuarios si falla la recuperación de la información del plan
          $query3 = "DELETE FROM usuarios WHERE id_usuario='$memID'";
          mysqli_query($con,$query3);
        }

    }
    else{
        echo "<head><script>alert('Miembro agregado fallido');</script></head></html>";
        echo "error: ".mysqli_error($con);
      }
