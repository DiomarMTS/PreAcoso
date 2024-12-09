<?php
include '../config/datos.php';
include '../config/conexion.php';

session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>PreAcoso</title>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link href="../assets/css/responsive.css" rel="stylesheet" />
  <link href="../assets/css/report.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="sub_page">
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="../index.php">
                <span>
                  PreAcoso
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav  ">
                    <li class="nav-item active">
                      <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">Inormacion </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="service.php">Servicios </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contactenos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="mapa.php">Ver Mapa</a>
                    </li>
                    <?php if (isset($_SESSION['first'])): ?>
                      <!-- Dropdown para usuario logueado -->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo htmlspecialchars($_SESSION['first']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="profile.php">Perfil</a>
                          <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                        </div>
                      </li>
                    <?php else: ?>
                      <!-- Enlace de login si no hay usuario logueado -->
                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
  </div>
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container contact_heading">
      <h2>
        Reportar Caso
      </h2>
      <p>
        Su regsitro nos ayudara a darle seguimiento a la denuncia realizada y asi hacer llegar la sancion necesaria hacia los involucrados en el caso.
      </p>
    </div>
    <div class="form-container">
      <h2>Formulario de Reporte de Caso</h2>
      <form action="submit_case.php" method="POST" enctype="multipart/form-data">
        <!-- Colegio -->
        <div class="form-group">
          <label for="colegio">Colegio:</label>
          <input type="text" id="colegio" name="colegio" placeholder="Nombre del colegio" required>
        </div>

        <div class="form-group">
          <label for="codigo">Codigo Modular:</label>
          <input type="text" id="codigo" name="codigo" placeholder="Codigo Modular" required>
        </div>

        <!-- Tipo de Caso -->
        <div class="form-group">
          <label for="tipo_caso">Tipo de Caso:</label>
          <select id="tipo_caso" name="tipo_caso" required>
            <option value="violencia sexual">Violencia Sexual</option>
            <option value="violencia física">Violencia Física</option>
            <option value="acoso verbal">Acoso Verbal</option>
            <option value="discriminación">Discriminación</option>
          </select>
        </div>

        <!-- Cargo del Agresor -->
        <div class="form-group">
          <label for="cargo_agresor">Cargo del Agresor:</label>
          <input type="text" id="cargo_agresor" name="cargo_agresor" placeholder="Ej. Profesor, Director" required>
        </div>

        <div class="form-group">
          <label for="cargo_agresor">Nombre del Agresor:</label>
          <input type="text" id="cargo_agresor" name="cargo_agresor" placeholder="Nombres y Dni(Si tiene esa información)" required>
        </div>

        <!-- Fecha -->
        <div class="form-group">
          <label for="fecha">Fecha del Incidente:</label>
          <input type="date" id="fecha" name="fecha" required>
        </div>

        <!-- Ubicación -->
        <div class="form-group">
          <label for="departamento">Departamento:</label>
          <select id="departamento" name="departamento" required>
            <option value="">Seleccione el departamento</option>
            <option value="Amazonas">Amazonas</option>
            <option value="Áncash">Áncash</option>
            <option value="Apurímac">Apurímac</option>
            <option value="Arequipa">Arequipa</option>
            <option value="Ayacucho">Ayacucho</option>
            <option value="Cajamarca">Cajamarca</option>
            <option value="Cusco">Cusco</option>
            <option value="Huancavelica">Huancavelica</option>
            <option value="Huánuco">Huánuco</option>
            <option value="Ica">Ica</option>
            <option value="Junín">Junín</option>
            <option value="La Libertad">La Libertad</option>
            <option value="Lambayeque">Lambayeque</option>
            <option value="Lima">Lima</option>
            <option value="Loreto">Loreto</option>
            <option value="Madre de Dios">Madre de Dios</option>
            <option value="Moquegua">Moquegua</option>
            <option value="Pasco">Pasco</option>
            <option value="Piura">Piura</option>
            <option value="Puno">Puno</option>
            <option value="San Martín">San Martín</option>
            <option value="Tacna">Tacna</option>
            <option value="Tumbes">Tumbes</option>
            <option value="Ucayali">Ucayali</option>

            <!-- Agregar más departamentos según sea necesario -->
          </select>
        </div>
        <div class="form-group">
          <label for="provincia">Provincia:</label>
          <input type="text" id="provincia" name="provincia" placeholder="Provincia" required>
        </div>

        <div class="form-group">
          <label for="descripcion">Descripción del Caso:</label>
          <br>
          <textarea id="descripcion" name="descripcion" rows="5" placeholder="Describe el caso con detalle..." required></textarea>
        </div>

        <!-- Subir Evidencia Multimedia -->
        <div class="form-group">
          <label for="evidencia">Subir Evidencia (Imágenes, Videos, Audio, Texto):</label>
          <input type="file" id="evidencia" name="evidencia[]" accept="image/*,video/*,audio/*,.txt" multiple required>
        </div>


      </form>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="">Reportar Caso</button>
    </div>
    </form>

  </section>


  <!-- end contact section -->
  <div class="footer_bg">
    <section class="info_section layout_padding2-bottom">
      <div class="container">
        <h3 class="">
          Información Adicional
        </h3>
      </div>
      <div class="container info_content">

        <div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  Información de Servicio
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      Nosotros
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Nuestras Políticas
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Servicios
                    </a>
                  </li>
                </ul>

              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  Nuestros Servicios
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      Registro de
                      casos
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Seguimiento
                      del Caso
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Promover campañas de concientización
                    </a>
                  </li>


                </ul>

              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  Ayuda al Usuario
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      Centro de ayuda
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Preguntas frecuentes

                    </a>
                  </li>
                  <li>
                    <a href="">

                      Centro de seguridad
                    </a>
                  </li>


                </ul>

              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
          <div class="social-box">
            <a href="">
              <img src="images/fb.png" alt="" />
            </a>

            <a href="">
              <img src="images/twitter.png" alt="" />
            </a>
            <a href="">
              <img src="images/linkedin1.png" alt="" />
            </a>
            <a href="">
              <img src="images/instagram1.png" alt="" />
            </a>
          </div>
          <div class="form_container mt-5">
            <form action="">
              <label for="subscribeMail">
                Boletín de Casos
              </label>
              <input type="email" placeholder="Ingrese su email" id="subscribeMail" />
              <button type="submit">
                Afiliarse
              </button>
            </form>
          </div>
        </div>
      </div>

    </section>


    <?php require_once '../includes/footer.php' ?>