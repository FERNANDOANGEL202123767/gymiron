<?php
require '../../include/db_conn.php';
page_protect();
    
    
   $id=$_POST['planid'];
   $pname=$_POST['planname'];
   $pdesc=$_POST['desc'];
   $pval=$_POST['planval'];
   $pamt=$_POST['amount'];
   
    
    $query1="update planes set nombre_plan='".$pname."',descripcion='".$pdesc."',validez='".$pval."',monto='".$pamt."' where id_plan='".$id."'";

   if(mysqli_query($con,$query1)){
     
            echo "<html><head><script>alert('PLAN Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=view_plan.php'>";  
   }
   else{
    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>
