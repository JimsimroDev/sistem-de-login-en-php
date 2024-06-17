<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once '../conexion/conexionLogin.php';
require_once '../vendor/autoload.php';



class UserController
{
  public function issNull($nombre, $usuario, $password,  $confirmarPassword, $correo)
  {
    if (
      strlen(trim($nombre)) < 1 || strlen(trim($usuario)) < 1 || strlen(trim($password))
      < 1 || strlen(trim($confirmarPassword)) < 1 || strlen(trim($correo)) < 1
    ) {
      return true;
    } else {
      return false;
    }
  }

  public function validarPassword($var1, $var2)
  {
    if (strcmp($var1, $var2) !== 0) {
      return false;
    } else {
      return true;
    }
  }

  public function usuarioExiste($usuario)
  {

    global $mysqli;

    $query = $mysqli->prepare("SELECT id  FROM user WHERE usuario = ? LIMIT 1");
    $query->bind_param("s", $usuario);
    $query->execute();
    $query->store_result();
    $num = $query->num_rows;
    $query->close();

    if ($num > 0) {
      return  true;
    } else {
      return false;
    }
  }

  public function emailExiste($correo)
  {

    global $mysqli;

    $query = $mysqli->prepare("SELECT id FROM user WHERE correo = ? LIMIT 1");
    $query->bind_param("s", $correo);
    $query->execute();
    $query->store_result();
    $num = $query->num_rows;
    $query->close();

    if ($num > 0) {
      return  true;
    } else {
      return false;
    }
  }

  public function createUser($usuario, $passs_hash, $nombre, $email, $activo, $token, $tipo_usuario)
  {
    global $mysqli;
    $query = $mysqli->prepare("INSERT INTO user (usuario, password, nombre, correo, activacion, token, fk_rol) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param('ssssisi', $usuario, $passs_hash, $nombre, $email, $activo, $token, $tipo_usuario);

    if ($query->execute()) {
      return $mysqli->insert_id;
    } else {
      return 0;
    }
  }

  function enviarEmail($email, $nombre, $asunto, $cuerpo)
  {

    $mail = new PHPMailer();

    // Configuración del servidor SMTP
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Activa el debug del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;

    $mail->Username = 'jhoangd.jgd@gmail.com'; // Cambia esto por tu correo de Gmail
    $mail->Password = 'Bakend2024+'; // Cambia esto por tu contraseña de Gmail o una contraseña de aplicación

    $mail->isHTML(true);
    // Remitente y destinatario
    $mail->setFrom('jhoangd.jgd@gmail.com', 'CreaconesK');
    $mail->addAddress($email, $nombre);

    // Contenido del correo

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;
    $mail->isHTML(true);

    if ($mail->send())
      return true;
    else
      return false;
  }


  public function generarToken()
  {
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
  }

  public function tieneContraseña($password)
  {
    $tiene = password_hash($password, PASSWORD_DEFAULT);
    return $tiene;
  }
}
