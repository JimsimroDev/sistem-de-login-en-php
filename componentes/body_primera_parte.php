<style>
  body {
    background: linear-gradient(#BE9FA4, #785A69);
    background-attachment: fixed;
  }
</style>

<body>

  <header>

    <header>
      <!-- Navbar nuevo-->
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="../bienvenido.php">
            <img src="../images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            CreacionK</a>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CreacionK</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active mx-lg-2" aria-current="page" href="../bienvenido.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="../vista/listar_productos.php">listar manillas</a>
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
          <a class="login-button" href="../salir.php">Salir</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

    </header>
