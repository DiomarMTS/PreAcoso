<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>
    <link rel="icon" href="../../assets/images/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="height: 94vh;
                background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376));
                background: linear-gradient(to right, #864ddf, #203376);"">

            <!-- Sidebar - Brand -->
            <a class=" sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
            <div class="sidebar-brand-icon">
                <i class="bi bi-chevron-compact-up" style="color: #cd0c17;"></i><img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg ">
            </div>
            <div class="sidebar-brand-text mx-3" style="height: 5px;">
                Bienvenido
                <?php echo htmlspecialchars($_SESSION['first']); ?>

            </div>
            </a>
            <br><br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="bi bi-house"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tablas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-person-circle"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">vistas</h6>
                        <a class="collapse-item" href="../pages/clientes.php">Usuarios</a>
                        <a class="collapse-item" href="../pages/empleados.php">Empleados</a>
                        <a class="collapse-item" href="../pages/roles.php">Roles</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Control de Stock</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">gestión personalizada:</h6>
                        <a class="collapse-item" href="../pages/proveedores.php">Proveedores</a>
                        <a class="collapse-item" href="../pages/categorias.php">Categotias</a>
                        <a class="collapse-item" href="../pages/productos.php">Productos</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ventas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-cart4"></i>
                    <span>vistas</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion de ventas</h6>
                        <a class="collapse-item" href="../pages/ventas.php">ventas</a>
                        <a class="collapse-item" href="#">semanal</a>
                        <a class="collapse-item" href="#">mensual</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../pages/reporte.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reportes</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-1 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <! -----------------contenido -----------------!>

                    <!-- ********************************** *********************************** -->
                    <!--                                 Producto                               -->
                    <!-- ********************************** *********************************** -->
                    <section style="padding: 10px 15px 10px 15px;">

                        <h1 class="text-center">Productos</h1>
                        <div class="row">

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/ProductoPDF.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        cantidd de productos</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">costo total</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-card-checklist fs-3 text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/ProductoStock.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        productos Stock </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Minimo</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-list-columns fs-3 text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/ProductoStock.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Productos Stock</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Critico</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-exclamation-octagon-fill fs-3 text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </section>
                    <!-- ********************************** *********************************** -->
                    <!--                                 Proveedor                              -->
                    <!-- ********************************** *********************************** -->
                    <section style="padding: 10px 15px 10px 15px;">

                        <h1 class="text-center">Proveedores</h1>
                        <div class="row">

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/Proveedor.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Proveedores</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">General</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-card-checklist fs-3 text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/ProveedorActivos.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Proveedores</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Activos</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-person-check-fill fs-3 text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/ProveedorInactivos.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Proveedores </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Inactivos</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-person-dash-fill fs-3 text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </section>
                    <!-- ********************************** *********************************** -->
                    <!--                                 Empleado                               -->
                    <!-- ********************************** *********************************** -->
                    <section style="padding: 10px 15px 10px 15px;">

                        <h1 class="text-center">Empleados</h1>
                        <div class="row">

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/Empleado.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Empleados</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">General</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-card-checklist fs-3 text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/EmpledoPuestos.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Empleados</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Puestos</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-person-vcard-fill fs-3 text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <a href="../fpdf/EmpleadoSalario.php" target="_blank" style="text-decoration: none;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Empleados</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Salario</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    </section>

                    <!-- ********************************** *********************************** -->
                    <!--                                 Correo                               -->
                    <!-- ********************************** *********************************** -->

                    <section style="padding: 10px 15px 10px 15px;">
                        <h1 class="text-center">Realizar pedido</h1><br><br><br>
                        <div class="row">
                            <div class="col-xl-2 col-md-6 mb-4"></div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="info-contacto" style="flex: 1; display: flex; margin: 0; ">
                                    <img src="https://imgs.search.brave.com/HILJJ7PnerogtD_lIKOnuPePbvxVflMQ803gzEbuGQs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zMzY0/OTYucGNkbi5jby93/cC1jb250ZW50L3Vw/bG9hZHMvMjAxOC8w/OC9lamVtcGxvcy1z/YWxhcmlvLWVtb2Np/b25hbC5qcGc" style="width: 100%; height: auto;display: block; " alt="img">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4" style="background-color: rgb(231, 232, 235); border-radius: 10px;">

                                <form action="https://formspree.io/f/mdoqrkez" method="POST" class="formulario" onsubmit="mostrarMensaje()">
                                    <label class="label-contacto" for="nombres">para: </label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" pattern="[A-Za-z\s]+" title="El nombre no puede contener números ni caracteres especiales" required>
                                    <label class="label-contacto" for="email">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label class="label-contacto" for="mensaje">Mensaje</label>
                                    <textarea id="mensaje" class="form-control" name="mensaje" rows="4" placeholder="¿Que pedido necesitas hacer?" required></textarea><br>
                                    <input type="file" class="form-control" name="archivo"><br>
                                    <input type="submit" value="Enviar" class="boton-enviar btn btn-danger">
                                    <input type="hidden" name="_next" value="http://localhost:8080/webInformativaFinal/">
                                    <input type="hidden" name="_captcha" value="false">
                                </form>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4"></div>
                        </div>
                    </section>

                    <! ----------------- fin contenido -----------------!>

                        <?php require_once "../includes/footer.php" ?>