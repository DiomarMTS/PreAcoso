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
                                            <a class="nav-link" href="maps.php">Ver Mapa</a>
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