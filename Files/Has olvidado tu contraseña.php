<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    
    <title>IRON GYM | Iniciar Sesion</title>
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
<body class="page-body login-page login-form-fall">

<div class="login-container">
    <div class="login-content">
        <a href="#" class="logo">
            <img src="./images/iron.png" alt="Iron Gym" />
        </a>
        <p class="description">Estimado usuario, inicie sesión para acceder al área de administración.</p>
        <!-- indicador de barra de progreso -->
        <div class="login-progressbar-indicator">
            <h3>43%</h3>
            <span>Iniciando sesión...</span>
        </div>
    </div>
    <div class="login-form">
        <div class="login-content">
            <form action="cambiar contraseña.php" method="POST" id="bb">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="text" placeholder="Su ID de inicio de sesión" class="form-control" name="ingresar_identificación" data-rule-required="true" data-rule-minlength="6">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="text" name="clave_inicio_sesión" class="form-control" placeholder="Tu clave secreta" data-rule-required="true" data-rule-minlength="6">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" name="pwfield" id="pwfield" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Tu nueva contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" name="confirmfield" id="confirmfield" class="form-control" data-rule-equalto="#pwfield" data-rule-required="true" data-rule-minlength="6" placeholder="Confirma tu nueva contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="btnLogin" class="btn btn-primary">
                        Iniciar sesión en 
                        <i class="entypo-login"></i>
                    </button>
                    <a href="./index.php"><button type="button" class="btn btn-primary">Cancelar</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
