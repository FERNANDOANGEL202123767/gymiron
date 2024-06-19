<?php
include './include/db_conn.php';

$id_usuario_autenticado = ltrim($_POST['id_usuario_autenticado']);
$id_usuario_autenticado = rtrim($id_usuario_autenticado);

$clave_acceso = ltrim($_POST['clave_acceso']);
$clave_acceso = rtrim($_POST['clave_acceso']);

$id_usuario_autenticado = stripslashes($id_usuario_autenticado);
$clave_acceso     = stripslashes($clave_acceso);



if($clave_acceso=="" &&  $id_usuario_autenticado==""){
   echo "<head><script>alert('Nombre del usuario y contraseña pueden estar vacías');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  
}
else if($clave_acceso=="" ){
   echo "<head><script>alert('La contraseña puede estar vacía');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  
}
else if($id_usuario_autenticado=="" ){
   echo "<head><script>alert('El nombre del usuario pueder estar vacio');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  
}

else{

$id_usuario_autenticado = mysqli_real_escape_string($con, $id_usuario_autenticado);
$clave_acceso     = mysqli_real_escape_string($con, $clave_acceso);
$sql          = "SELECT * FROM administrador WHERE nombre_usuario='$id_usuario_autenticado' and clave_acceso='$clave_acceso'";
$result       = mysqli_query($con, $sql);
$count        = mysqli_num_rows($result);
if ($count == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    // store session data
    $_SESSION['id_usuario']  = $id_usuario_autenticado;
    $_SESSION['logged']     = "start";
    // $_SESSION['auth_level'] = $row['level'];
    $_SESSION['nombre_completo']  = $id_usuario_autenticado;
    $_SESSION['nombre_usuario']=$row['nombre_completo'];
    // $auth_l_x               = $_SESSION['auth_level'];
    // if ($auth_l_x == 5) {
        header("location: ./dashboard/admin/");
    // } else if ($auth_l_x == 4) {
    //     header("location: ../dashboard/cashier/");
    // } else if ($auth_l_x == 3) {
    //     header("location: ../dashboard/member/");        
    // } else {
    //     header("location: ../login/");
    // }
} else {
    include 'index.php';
    echo "<html><head><script>alert('Nombre del usuario o la Contraseña no es valida');</script></head></html>";
}
}

