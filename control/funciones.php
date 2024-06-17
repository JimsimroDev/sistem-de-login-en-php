<?php

require_once './conexion/conexionLogin.php';

class funtions
{

    function isNullLogin($usuario, $password)
    {
        if (strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1) {
            return true;
        } else {
            return false;
        }
    }

    function login($usuario, $password)
    {
        global $mysqli;

        $query = $mysqli->prepare("SELECT id, fk_rol, password FROM user WHERE usuario = ? || correo = ? LIMIT 1");
        $query->bind_param("ss", $usuario, $usuario);
        $query->execute();
        $query->store_result();
        $rows = $query->num_rows();

        if ($rows > 0) {

            $query->bind_result($id, $fk_rol, $passwd);
            $query->fetch();

            $validaPassw = password_verify($password, $passwd);


            if ($validaPassw) {

                #lastSession($id);
                $_SESSION['id_usuario'] = $id;
                $_SESSION['fk_rol'] = $fk_rol;

                header("Location: bienvenido.php");
            } else {
                $error = 'El usurio o contraseña  esta incorrecto';
            }
        } else {
            $error = 'El usuario o contraseña';
        }
        return $error;
    }

    function lastSession($id)
    {
        global $mysqli;
        $query = $mysqli->prepare("UPDATE user  SET last_session=NOW(), token_password='', password_request=1 WHERE id = ?");
        $query->bind_param('s', $id);
        $query->execute();
        $query->close();
    }
    function resultBlock($error)
    {
        if (!empty($error)) {
            echo '<div class="alert alert-danger">';
            echo '<strong>Error:</strong><br>';
            foreach ($error as $errors) {
                echo $errors . '<br>';
            }
            echo '</div>';
        }
    }
}
