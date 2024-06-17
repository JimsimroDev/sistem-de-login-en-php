<?php

$mysqli = new mysqli("localhost", "root", "jiss1203", "login");

if (mysqli_connect_errno()) {
  echo 'Conexion Fallida : ', mysqli_connect_error();
  exit();
}
