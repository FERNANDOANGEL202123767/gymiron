<?php
$host     = "localhost"; // nombre de host 
$username = "root"; // nombre del usuario de mysql
$password = "2002"; // contraseña de mysql
$db_name  = "gymhuella"; // nombre de la base de datos 

// Conéctese al servidor y seleccione la base de datos.
$con = mysqli_connect($host, $username, $password, $db_name);

// checando la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<?php
function page_protect()
{
    session_start();
    
    global $db;
    
    /* Protéjase contra el secuestro de sesión comprobando el agente de usuario */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            echo "<meta http-equiv='refresh' content='0; url=../login/'>";
            exit();
        }
    }
    
    /*Antes de permitir sesiones, debemos verificar la clave de autenticación: 
        key y time almacenados en la base de datos.*/
    if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../login/'>";
        exit();
    } 
}
?>