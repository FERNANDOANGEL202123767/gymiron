<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    // Eliminar primero los registros relacionados en la tabla inscripciones
    mysqli_query($con, "DELETE FROM inscripciones WHERE id_usuarioo ='$msgid'");
    
    // Luego, eliminar los registros relacionados en la tabla estado_salud
    mysqli_query($con, "DELETE FROM estado_salud WHERE id_usuarioo ='$msgid'");
    
    // Finalmente, eliminar el usuario de la tabla usuarios
    mysqli_query($con, "DELETE FROM usuarios WHERE id_usuario ='$msgid'");
    
    echo "<html><head><script>alert('Miembro eliminado');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=ver_miembros.php'>";
} else {
    echo "<html><head><script>alert('¡ERROR! Eliminar operación fallida');</script></head></html>";
    echo "error".mysqli_error($con);
}
?>
