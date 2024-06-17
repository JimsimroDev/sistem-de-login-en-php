<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../componentes/head.php';
require_once '../control/userController.php';
require '../conexion/conexionLogin.php';

$usuarioController = new UserController();
$error = array();

if (!empty($_POST)) {
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $confirmarPassword = $mysqli->real_escape_string($_POST['confirmarPassword']);
    $email = $mysqli->real_escape_string($_POST['email']);

    $activo = 0;
    $tipo_usuario = 2;
    $secret = '';

    if ($usuarioController->issNull($nombre, $usuario, $password, $confirmarPassword, $email)) {
        $error[] = 'Debe llenar todos los campos';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Ingresa un email válido';
    }

    if (!$usuarioController->validarPassword($password, $confirmarPassword)) {
        $error[] = 'las contriasenas no coindicen';
    }

    if ($usuarioController->emailExiste($email)) {
        $error[] = 'Este Email ya existe';
    }


    if ($usuarioController->usuarioExiste($usuario)) {
        $error[] = 'El usuario ya existe';
    }

    if (count($error) == 0) {
        $passs_hash = $usuarioController->tieneContraseña($password);
        $token = $usuarioController->generarToken();
        $registro = $usuarioController->createUser($usuario, $passs_hash, $nombre, $email, $activo, $token, $tipo_usuario);

        if ($registro > 0) {
            $url = 'http//' . $_SERVER["SERVER_NAME"] .
                '/login/activar.php?id=' . $registro . '&val=' . $token;
            $asunto = 'Active cuenta';
            $cuerpo = "Hola $nombre: <br/><bt/> Para continuar con el proceso de registro,
             debes dar click aqui<a href='$url'>Activar Cuenta</a>";

            if ($usuarioController->enviarEmail($email, $nombre, $asunto, $cuerpo)) {
                echo " Para terminar el proceso de registro siga los pasos
                enviados a su correo electronico: $email";

                echo "<br><a href='login.php'> Inicia sesion</a>";
                exit;
            } else {
                $error[] = " Error al enviar el corro";
            }
        } else {
            $error[] = "Error al registrar";
        }
    }
}
?>

<style>
    body {
        background: linear-gradient(#BE9FA4, #785A69);
        background-attachment: fixed;
    }
</style>

<div class="container py-3 text-center">
    <header class="mb-4 border-bottom">
        <h3 class="fs-4">Registro de usuarios</h3>
    </header>

    <?php
    if (isset($error) && count($error) > 0) {
        echo '<div class="row justify-content-md-center">';
        echo '<div class="col-lg-6 col-md-12">';
        echo '<div class="alert alert-danger alert-dismissible" role="alert">';
        foreach ($error as $err) {
            echo $err . '<br>';
        }
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '</div></div></div>';
    }
    ?>

    <div class="row justify-content-md-center">
        <div class="col-lg-6 col-md-12 text-center">
            <form class="form-horizontal" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="nombre" type="text" placeholder="" required />
                    <label for="inputLastName">Nombre</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="usuario" type="text" placeholder="" required />
                    <label for="inputFirstName">usuario</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="password" type="password" placeholder="" required />
                    <label for="inputFirstName">Password</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="confirmarPassword" type="password" placeholder="" required />
                    <label for="inputFirstName">Confirmar Password</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="email" type="text" placeholder="" required />
                    <label for="inputFirstName">Email</label>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-center py-5">
                    <a class="btn btn-outline-primary btn-lg" href="../index.php">Regresar</a>
                    <button onclick="return confirm('¿Estás seguro de guardar este dato?')" name="btn_crear" type="submit" value="Guardar" class="btn btn-secondary btn-lg">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($response)) {
        echo '<div class="row justify-content-md-center">';
        echo '<div class="col-lg-6 col-md-12">';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $response;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '</div></div></div>';
    }
    ?>

</div>

<?php
include '../componentes/body_final.php';
?>
