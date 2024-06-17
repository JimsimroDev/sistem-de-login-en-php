<?php

session_start();

require './conexion/conexionLogin.php';
require './control/funciones.php';

if (!isset($_SESSION["id_usuario"])) {
  header("Location: index.php");
}

$idUsuario = $_SESSION['id_usuario'];

$query = "SELECT id, nombre FROM user WHERE id = '$idUsuario'";
$resultado = $mysqli->query($query);

$row = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./recursos/css/style.css">
  <link rel="stylesheet" href="./recursos/css/">
  <link rel="stylesheet" href="./recursos/css/bootstrap.css">
  <title>creaciones</title>
</head>

<body>

  <header>
    <!-- Navbar nuevo-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand me-auto" href="./bienvenido.php">
          <img src="./images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          CreacionK</a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CreacionK</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active mx-lg-2" aria-current="page" href="bienvenido.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="./vista/listar_productos.php">listar manillas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Ver usarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">sobre</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
      <div>
        <a class="login-button" href="./salir.php">Salir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Navbar viejo
    <nav class="navbar  fixed-top">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">
          <img src="./images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          APP CreacionK
        </a>

        <ul class="nav nav-underline">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Productos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./vista/listar_productos.php">Ver productos</a></li>
              <li><a class="dropdown-item" href="./vista/crear_producto.php">Agregar producto</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Productos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./vista/listar_usuarios.php">Ver productos</a></li>
              <li><a class="dropdown-item" href="#">Agregar producto</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

        <button type="button" class="btn btn-light">Salir</button>

      </div>
    </nav>
-->
  </header>

  <section class="hero-section">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./images/carrusel.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



  <footer class="container-fluid">
    <p class="Copyright">&copy JimsimroDev - 2024</p>
  </footer>
  </section>


  <!--- conte del foterpnavbaro 
--------------------------------------->

  <script src="./recursos/js/bootstrap.min.js"></script>
  <script src="./recursos/js/popper.min.js"></script>
  <script src="./recursos/js/jquery.slim.min.js"></script>
  <script src="./recursos/js/bootstrap.bundle.min.js"></script>

</body>

</html>
