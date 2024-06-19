<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "update planes set activo ='no' WHERE id_plan='$msgid'");
    echo "<html><head><script>alert('Membresia Eliminada');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_plan.php'>";
} else {
    echo "<html><head><script>alert('ERROR! a Eliminar');</script></head></html>";
   echo "error".mysqli_error($con);
}
