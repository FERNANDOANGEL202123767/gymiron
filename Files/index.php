<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Gym | Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" type="text/css" href="./css/entypo.css">
    <style>
        /* Estilos específicos para mejorar la responsividad */
        body {
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #444;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
        }
        .login-content {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-content img {
            width: 200px;
            margin-bottom: 20px;
        }
        .login-progressbar-indicator {
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group .input-group-addon {
            background-color: #555;
            border: none;
            color: #fff;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #777;
            font-size: 16px;
            background-color: #333;
            color: #fff;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .login-bottom-links {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-content">
        <a href="#" class="logo">
            <img src="./images/iron.png" alt="Iron Gym" />
        </a>
        <p class="description">Estimado usuario, inicie sesión para acceder al área de administración.</p>
        
    </div>
    <div class="login-form">
        <div class="login-content">
            <form action="inicio de sesión seguro.php" method='post' id="bb">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="text" placeholder="ID Usuario" class="form-control" name="id_usuario_autenticado" id="textfield" data-rule-minlength="6" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" name="clave_acceso" id="pwfield" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="btnLogin" class="btn btn-primary">
                        Iniciar sesión en
                        <i class="entypo-login"></i>
                    </button>
                </div>
            </form>
			<div class="login-bottom-links">
    <a href="Has olvidado tu contraseña.php" class="link" style="color: white;">¿Olvidaste tu contraseña?</a>
</div>
        </div>
    </div>
</div>

</body>
</html>
