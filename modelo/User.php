<?php
class User
{
  private $id;
  private $nombre;
  private $usuario;
  private $password;
  private $email;

  public function __construct($id, $nombre, $usuario, $password, $email)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->usuario = $usuario;
    $this->password = $password;
    $this->email = $email;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getEmail()
  {
    return $this->email;
  }
}
