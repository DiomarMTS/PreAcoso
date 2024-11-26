<?php require_once '../includes/header.php' ?>
<link rel="stylesheet" href="../assets/css/report.css">
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