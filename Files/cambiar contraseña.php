<?php

?>
<?php
// include 'index.php';
include './include/db_conn.php';
$key          = rtrim($_POST['clave_inicio_sesión']);
$pass         = rtrim($_POST['pwfield']);
$id_usuario_autenticado = rtrim($_POST['ingresar_identificación']);
$passconfirm= rtrim($_POST['confirmfield']);
if($pass==$passconfirm){
if (isset($id_usuario_autenticado) && isset($pass) && isset($key)) {
    $sql    = "SELECT * FROM administrador WHERE nombre_usuario='$id_usuario_autenticado' and clave_segura='$key'";
    $result = mysqli_query($con, $sql);
    $count  = mysqli_num_rows($result);
    if ($count == 1) {
        mysqli_query($con, "UPDATE administrador SET clave_acceso='$pass' WHERE nombre_usuario='$id_usuario_autenticado'");
        echo "<html><head><script>alert('Contraseña actualizada, inicie sesión nuevamente');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<html><head><script>alert('Cambio fallido');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
} else {
    echo "<html><head><script>alert('Cambio fallido');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
}
else{
    echo "<html><head><script>alert('Confirmar contraseña no coincide');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=Has olvidado tu contraseña.php'>";
}
?>
<center>

<img src="loading.gif">

</center>
