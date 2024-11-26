<?php require_once '../includes/header.php' ?>

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container contact_heading">
      <h2>
        Contactanos
      </h2>
      <p>
        Escribenos ante cualquier duda o alguna información extra si asi lo requieres
      </p>
    </div>
    <div class="container">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName4">Nombre</label>
            <input type="text" class="form-control" id="inputName4" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" />
          </div>

        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNumber4">Número</label>
            <input type="tel" class="form-control" id="inputNumber4" />
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Selecionar Servicio</label>
            <select id="inputState" class="form-control">
              <option selected=""></option>
              <option>...</option>
            </select>
          </div>

        </div>
        <div class="form-group">
          <label for="inputMessage">Mensaje</label>
          <input type="text" class="form-control" id="inputMessage" placeholder="" />
        </div>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="">Enviar</button>
    </div>
    </form>

  </section>


  <!-- end contact section -->
  <div class="footer_bg">
    <!-- info section -->
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



  <!-- end info_section -->

  <?php require_once '../includes/footer.php' ?>
