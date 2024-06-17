<?php

session_start();

require_once './conexion/conexionLogin.php';
require_once './control/funciones.php';

$funciones = new funtions();

$error = array();

if (!empty($_POST)) {

    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if ($funciones->isNullLogin($usuario, $password)) {
        $error[] = 'El usurio o contraseña esta incorrecto';
    } else {
        $error[] = $funciones->login($usuario, $password);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./recursos/css/estilos.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.css">
    <link rel="stylesheet" href="./recursos/css/reset.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <div class="form-group text-center">
                    <h1>INICIAR SESION</h1>
                </div>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group mx-sm-4 pt-4">
                        <input type="text" class="form-control" placeholder="Ingresa tu usuario" name="usuario">
                    </div>
                    <div class="form-group mx-sm-4 py-4">
                        <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="password">
                    </div>
                    <div class="form-group mx-sm-4 pb-2 text-center">
                        <input type="submit" class="btn btn-black ingresar" value="INGRESAR">
                    </div>
                    <div class="form-group mx-sm-4 text-right pb-4 text-end">
                        <span class=""><a href="" class="olvide">Olvidaste tu contraseña click aqui</a></span>
                    </div>
                    <div class="form-group text-center ">
                        <span><a class="olvide1" href="./vista/crear_usuario.php">REGISTRATE</a></span>
                    </div>
                </form>
                <?php $funciones->resultBlock($error); ?>
            </div>
        </div>
    </div>

    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/popper.min.js"></script>
    <script src="../recursos/js/scripts.js"></script>
    <script src="../recursos/js/jquery.slim.min.js"></script>
    <script src="../recursos/js/bootstrap.bundle.min.js"></script>
</body>

</html>
