<?php
// $a = $_SERVER['HTTP_REFERER'];

// if (strpos($a, '/e-has/') !== false) {
    
// } else {
//     header("Location: ./");
// }

?>
<?php
// include 'index.php';
require '../../include/db_conn.php';
$key          = rtrim($_POST['login_key']);
$pass         = rtrim($_POST['pwfield']);
$id_usuario_autenticado = rtrim($_POST['nombre_usuario']);
$passconfirm= rtrim($_POST['confirmfield']);
if($pass==$passconfirm){
if (isset($id_usuario_autenticado) && isset($pass) && isset($key)) {
    $sql    = "SELECT * FROM administrador WHERE nombre_usuario='$id_usuario_autenticado'";
    $result = mysqli_query($con, $sql);
    $count  = mysqli_num_rows($result);
    if ($count == 1) {
        mysqli_query($con, "UPDATE administrador SET clave_acceso='$pass',clave_segura='$key' WHERE nombre_usuario='$id_usuario_autenticado'");
        echo "<html><head><script>alert('Perfil actualizado, inicie sesión nuevamente');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
    } else {
        echo "<html><head><script>alert('Cambio fallido');</script></head></html>";
        echo "error".mysqli_error($con);
        
    }
} else {
    echo "<html><head><script>alert('Cambio fallido');</script></head></html>";
    echo "error".mysqli_error($con);
 
}
}
else{
    echo "<html><head><script>alert('Confirmar contraseña no coinciden');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=change_pwd.php'>";
}
?>
<center>
<img src="loading.gif">
</center>