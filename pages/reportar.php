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
      Su registro nos ayudara a darle seguimiento a la denuncia realizada y asi hacer llegar la sancion necesaria hacia los involucrados en el caso.
    </p>
  </div>
  <div class="form-container">
        <h2>Formulario de Reporte de Caso</h2>
        
        <form action="../config/insertar_caso.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="fechaHecho">Fecha del Hecho:</label>
        <input type="date" id="fechaHecho" name="fechaHecho" required>
    </div>
    <div>
        <label for="cargoAgresor">Cargo del Agresor:</label>
        <select id="cargoAgresor" name="cargoAgresor" required>
            <!-- Opciones dinámicas -->
            <option value="Auxiliar de educación">Auxiliar de educación</option>
            <option value="Ley de servicio civil">Ley de servicio civil</option>
            <option value="Profesor contratado">Profesor contratado</option>
            <option value="Profesor Nombrado">Profesor Nombrado</option>
            <option value="Sin regimen laboral">Sin regimen laboral</option>
            <option value="Trabajador administrativo">Trabajador administrativo</option>
            <option value="Trabajador CAS">Trabajador CAS</option>
            
            
        </select>
            
    </div>
    <div>
        <label for="tipoViolencia">Tipo de Violencia:</label>
        <select id="tipoViolencia" name="tipoViolencia" required>
            <!-- Opciones dinámicas -->
            <option value="Violación sexual">Violación sexual</option>
            <option value="Acoso sexual">Acoso sexual</option>
            <option value="Hostigamiento sexual">Hostigamiento sexual</option>
            <option value="Hostigamiento y acoso sexual">Hostigamiento y acoso sexual</option>
            <option value="Tocamientos indebidos">Tocamientos indebidos</option>
            <option value="Violencia con fines sexuales a través de medios tecnológicos">Violencia con fines sexuales a través de medios tecnológicos</option>
            
            
        </select>
    </div>
      <div>
        <label for="id_user">Usuario</label>
        <select id="id_user" name="id_user" required>
           
            <option value="10">Patrick Champe</option>
            
        </select> 
    </div> 
    <div>
        <label for="id_norma">Norma:</label>
        <select id="id_norma" name="id_norma" required>
            <!-- Opciones dinámicas -->
            <option value="10">Ley de Bases de la Carrera Administrativa y de Remuneraciones del Sector Público, Decreto Legislativo N° 276</option>
            <option value="11">Ley de Reforma Magisterial, Ley N° 29944</option>
            <option value="12">Ley del Código de Ética de la Función Pública, Ley N° 27815 modificada por la Ley N° 28496</option>
            <option value="13">Ley del Servicio Civil, Ley N° 30057</option>
            <option value="14">Sin norma aplicada</option>
            
        </select>
    </div>
    <div>
        <label for="id_tipoMedida">Tipo de Medida:</label>
        <select id="id_tipoMedida" name="id_tipoMedida" required>
            <option value="1">Suspensión Temporal</option>
            <option value="13">Cese de contrato</option>
            <option value="14">Medida cautelar</option>
            <option value="15">Retiro</option>
            <option value="16">Separación</option>
            <option value="17">Sin tipo de medida</option>
        </select>
    </div>
    <div>
        <label for="id_institucion">Institución:</label>
        <select id="id_institucion" name="id_institucion" required>
            <option value="1">SAN JOSE DEL ARENAL</option>
            <option value="2">ABRAHAM LOPEZ LUCERO</option>
            <option value="3">NIÑO JESUS DE PRAGA</option>
            <option value="4">RAQUEL ROBLES DE ROMAN</option>
            <option value="5">DIVINO NIÑO JESUS</option>
            
        </select>
    </div>
    <div>
        <label for="id_evaluacion">Evaluación:</label>
        <select id="id_evaluacion" name="id_evaluacion" required>
            <option value="3">NO, el caso aún no ha sido atendido por falta de documentos</option>
            <option value="5">Sin Sancion, se inició el proceso de análisis del caso</option>
            <option value="3">NO, atención finalizada sin inconvenientes</option>
            <option value="5">SI, caso en espera de validación final por el supervisor</option>
            <option value="3">SI, caso validado y cerrado sin observaciones</option>
            
        </select>
    </div>
    <div>
        <button type="submit">Agregar Caso</button>
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
