<?php
//include 'config/datos.php';
include 'config/datos.php';
include 'config/conexion.php';

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

  <title>Prototipo</title>
  <link rel="icon" href="assets/images/logo.png">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap"
    rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets">
  <style>
    #chartdiv {
      width: 50%;
      height: 200px
    }
  </style>

</head>

<body>
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/geodata/peruLow.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

  <!-- Chart code -->
  <script>
    am5.ready(function() {

      // Create root element
      var root = am5.Root.new("chartdiv");

      // Set themes
      root.setThemes([
        am5themes_Animated.new(root)
      ]);

      // Create the map chart
      var chart = root.container.children.push(am5map.MapChart.new(root, {
        panX: "translateX",
        panY: "translateY",
        projection: am5map.geoMercator()
      }));

      // Create main polygon series for Peru
      var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_peruLow // Cambia a `peruLow` para mostrar solo Perú
      }));

      polygonSeries.mapPolygons.template.setAll({
        tooltipText: "{name}",
        toggleKey: "active",
        interactive: true
      });

      polygonSeries.mapPolygons.template.states.create("hover", {
        fill: root.interfaceColors.get("primaryButtonHover")
      });

      polygonSeries.mapPolygons.template.states.create("active", {
        fill: root.interfaceColors.get("primaryButtonHover")
      });

      var previousPolygon;

      polygonSeries.mapPolygons.template.on("active", function(active, target) {
        if (previousPolygon && previousPolygon != target) {
          previousPolygon.set("active", false);
        }
        if (target.get("active")) {
          polygonSeries.zoomToDataItem(target.dataItem);
        } else {
          chart.goHome();
        }
        previousPolygon = target;
      });

      // Add zoom control
      var zoomControl = chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
      zoomControl.homeButton.set("visible", true);

      // Set clicking on "water" to zoom out
      chart.chartContainer.get("background").events.on("click", function() {
        chart.goHome();
      });

      // Make stuff animate on load
      chart.appear(1000, 100);
      a

    }); // end am5.ready()
  </script>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="index.php">
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
                      <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/about.php">Informacion</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/service.php">Servcios </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/contact.php">Contactenos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/mapa.php">Ver Mapa</a>
                    </li>
                    <?php if (isset($_SESSION['first'])): ?>
                      <!-- Dropdown para usuario logueado -->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo htmlspecialchars($_SESSION['first']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="pages/profile.php">Perfil</a>
                          <a class="dropdown-item" href="pages/logout.php">Cerrar sesión</a>
                        </div>
                      </li>
                    <?php else: ?>
                      <!-- Enlace de login si no hay usuario logueado -->
                      <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">Login</a>
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
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Mapa de <br />
                      Incidencias <br />
                      de Acoso Sexual
                    </h1>
                    <p>
                      Conoce los lugares de alto riesgo y ayuda a mejorar la seguridad.
                    </p>
                    <div class="btn-box">
                      <a href="pages/mapa.php" class="btn-1">
                        Ver Mapa
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="assets/images/mapa-peru.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Tu Experiencia <br />
                      Vale, <br />
                      ¡Compártela!
                    </h1>
                    <p>
                      Cada denuncia es una pieza importante en la lucha contra el acoso. Al reportar tu experiencia,
                      estás ayudando a prevenir futuros casos y protegiendo a otras personas.
                    </p>
                    <div class="btn-box">
                      <a href="pages/reportar.php" class="btn-1">
                        Reportar caso
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="assets/images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Monitorea <br />
                      el Avance de <br />
                      tu Denuncia
                    </h1>
                    <p>
                      Revisa el estado de tu reporte y mantente al tanto de cada paso
                      que estamos dando para resolver tu caso y garantizar tu bienestar.
                    </p>
                    <div class="btn-box">
                      <a href="pages/consultarCaso.php" class="btn-1">
                        Consultar
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="assets/images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- welcome section -->
  <section class="welcome_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Bienvenido
        </h2>
      </div>
      <div class="layout_padding2">
        <div class="img-box">
          <img src="assets/images/welcome.png" alt="" />
        </div>
        <div class="detail-box">
          <p>
            Somos una organización comprometida con la creación de espacios seguros y respetuosos para todos.
            Nos enfocamos en brindar apoyo y recursos para combatir el acoso, promoviendo la denuncia y el seguimiento
            de cada caso para que cada voz sea escuchada y cada experiencia sea valorada. A través de la educación,
            la concientización y la acción, trabajamos para construir una comunidad donde cada persona pueda sentirse
            protegida y empoderada. Creemos en el cambio y en el impacto que podemos generar juntos hacia un futuro libre de acoso.
          </p>
          <div>
            <a href="">
              Saber mas
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- end welcome section -->

  <!-- service section -->

  <section class="service_section">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Our Services
        </h2>
      </div>
      <div class="service_container layout_padding2">
        <div class="service_box">
          <div class="img-box">
            <img src="assets/images/s-1.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Business <br />
              Consultant
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
        <div class="service_box">
          <div class="img-box">
            <img src="assets/images/s-2.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Marketing <br />
              Analytics
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
        <div class="service_box">
          <div class="img-box">
            <img src="assets/images/s-3.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Financial <br />
              Planning
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
      </div>
      <div>
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end service section -->
  <!--problem section -->
  <section class="problem_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Do you have any business problem ?
        </h2>
      </div>
      <div class="layout_padding2">
        <div class="img-box">
          <img src="assets/images/problem.jpg" alt="" />
        </div>
        <div class="detail-box">
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
            some form, by injected humour, or randomised words which don&#39;t look even slightly believable. I
          </p>
          <div>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- end problem section -->
  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="content-container">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua. Ut enim ad minim veniam, quis
        </p>
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="assets/images/smiley.png" alt="" />
            </div>
            <div class="detail-box">
              <h3>
                99%
              </h3>
              <h6>
                SATISFIED CLIENTS
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="assets/images/monitor.png" alt="" />
            </div>
            <div class="detail-box">
              <h3>
                4700+
              </h3>
              <h6>
                AWESOME planing
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="assets/images/multiple-users-silhouette.png" alt="" />
            </div>
            <div class="detail-box">
              <h3>
                4500+
              </h3>
              <h6>
                CLIENTS
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="assets/images/bar-chart.png" alt="" />
            </div>
            <div class="detail-box">
              <h3>
                19000+
              </h3>
              <h6>
                DAILY business
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end why section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <h2>
        What Our Clients Says
      </h2>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="assets/images/client.png" alt="" />
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="assets/images/client.png" alt="" />
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="assets/images/client.png" alt="" />
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  </section>
  <!-- end client section -->
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container contact_heading">
      <h2>
        Contact Us
      </h2>
      <p>
        psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
      </p>
    </div>
    <div class="container">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName4">Name</label>
            <input type="text" class="form-control" id="inputName4" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" />
          </div>

        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNumber4">Phone number</label>
            <input type="tel" class="form-control" id="inputNumber4" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Select Service</label>
            <select id="inputState" class="form-control">
              <option selected=""></option>
              <option>...</option>
            </select>
          </div>

        </div>
        <div class="form-group">
          <label for="inputMessage">Message</label>
          <input type="text" class="form-control" id="inputMessage" placeholder="" />
        </div>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="">Send</button>
    </div>
    </form>

  </section>


  <!-- end contact section -->
  <div class="footer_bg">
    <!-- info section -->
    <section class="info_section layout_padding2-bottom">
      <div class="container">
        <h3 class="">
          BigWing
        </h3>
      </div>
      <div class="container info_content">

        <div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  Useful Link
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Loram ipusm
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Loram ipusm
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Loram ipusm
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Loram ipusm
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Loram ipusm
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  The Services
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Lorem ipsum dolor
                    </a>
                  </li>
                  <li>
                    <a href="">
                      sit amet, consectetur
                    </a>
                  </li>
                  <li>
                    <a href="">
                      adipiscing elit,
                    </a>
                  </li>
                  <li>
                    <a href="">
                      sed do eiusmod
                    </a>
                  </li>
                  <li>
                    <a href="">
                      tempor incididunt
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="d-flex">
                <h5>
                  Contact Us
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Lorem ipsum
                    </a>
                  </li>
                  <li>
                    <a href="">
                      dolor sit amet,
                    </a>
                  </li>
                  <li>
                    <a href="">
                      consectetur
                    </a>
                  </li>
                  <li>
                    <a href="">
                      adipiscing
                    </a>
                  </li>
                  <li>
                    <a href="">
                      elit, sed do eiusmod
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
              <img src="assets/images/fb.png" alt="" />
            </a>
            <a href="">
              <img src="assets/images/twitter.png" alt="" />
            </a>
            <a href="">
              <img src="assets/images/linkedin1.png" alt="" />
            </a>
            <a href="">
              <img src="assets/images/instagram1.png" alt="" />
            </a>
          </div>
          <div class="form_container mt-5">
            <form action="">
              <label for="subscribeMail">
                Newsletter
              </label>
              <input type="email" placeholder="Enter Your email" id="subscribeMail" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>

    </section>

    <!-- end info_section -->

    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        © 2024 estamos para ayudar
      </p>
    </section>
    <!-- footer section -->
  </div>


  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>



</body>

</html>
