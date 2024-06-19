<?php
require '../../include/db_conn.php';
page_protect();

 $memID=$_POST['m_id'];
 $plan=$_POST['plan'];

//actualizando la renovación de sí a no desde la tabla inscripciones
$query="update inscripciones set renovacion='no' where id_usuarioo='$memID'";
    if(mysqli_query($con,$query)==1){
      //insertando nuevos datos de pago en la tabla inscripciones
      $query1="select * from planes where id_plan='$plan'";
      $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("America/Mexico_City");
          $d=strtotime("+".$value[3]." Meses");
          $cdate=date("Y-m-d"); //fecha actual
          $expiredate=date("Y-m-d",$d); //agregar recuperación de validez del plan a la fecha actual
          //insertando en la tabla inscripciones del ID de usuario correspondiente
          $query2 = "INSERT INTO inscripciones (id_plan, id_usuarioo, fecha_pago, vencimiento, renovacion) 
           VALUES ('$plan', '$memID', '$cdate', '$expiredate', 'yes')";
          if(mysqli_query($con,$query2)==1){

               echo "<head><script>alert('Pago actualizado con éxito');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=Pagos.php'>";
            }
             
            else{
               echo "<head><script>alert('Error al actualizar el pago');</script></head></html>";
              echo "error: ".mysqli_error($con);
            }
            
          }
          else{
            echo "<head><script>alert('Error al actualizar el pago');</script></head></html>";
            echo "error: ".mysqli_error($con);
          }

         
        }
        else
        {
          echo "<head><script>alert('Error al actualizar el pago');</script></head></html>";
          echo "error: ".mysqli_error($con);
        }