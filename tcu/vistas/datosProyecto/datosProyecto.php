<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   Datos del Proyecto
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">
</head>
<body>
 <?php 
    include '../../header.php';
 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->
          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Datos del Proyecto</h2>
                  <div  class="ingreso ingresoTamano">
                    <form class="formulario" novalidate>
                      <ul>
                        <div class="row">
                          <div class="col-md-12">
                            <li><label for="temaProyecto">Tema del proyecto</label></li>
                            <li><textarea rows="2" id="temaProyecto" name="temaProyecto" class="tamanoCompleto" placeholder="Digiete el tema del proyecto"></textarea></li>
                          </div>
                        </div><br>

                        <div class="row">
                          <div class="col-md-6">
                            <li><label for="lugar">Organización o lugar donde realizará el T.C.U.</label></li>
                            <li><textarea id="lugar" name="lugar" class="tamanoCompleto" placeholder="Digite la organización o lugar donde realizará el T.C.U."></textarea></li>
                          </div>
                          <div class="col-md-6">
                            <li><label for="supervisor">Supervisor(a) del T.C.U. </label></li>
                            <li><textarea rows="5" id="supervisor" name="supervisor" class="tamanoCompleto" placeholder="Digite el supervisor(a) del T.C.U."></textarea></li>
                          </div>
                        </div><br>


                        <div class="row">
                          <div class="col-md-3">
                            <li><label for="telTrabajo">Teléfono del Trabajo</label></li>
                            <li><input type="text" id="telTrabajo" name="telTrabajo" placeholder="Digite el teléfono del trabajo" class="tamanoCompleto"></li>
                          </div>
                          <div class="col-md-3">
                            <li><label for="cecular">Teléfono Celular</label></li>
                            <li><input type="text" id="cecular" name="cecular" placeholder="Digite el teléfono celular" class="tamanoCompleto"></li>
                          </div>
                          <div class="col-md-6">
                            <li><label for="correo" >Correo</label></li>
                            <li><input type="email" id="correo" name="correo" class="tamanoCompleto" placeholder="Digite el correo electrónico"></li>
                          </div>
                        </div><br>

                        <div class="row">
                          <div class="col-md-12">
                            <li><label for="direccion">Dirección exacta del lugar dónde realizará el T.C.U.</label></li>
                            <li><textarea id="direccion" name="direccion"  class="tamanoCompleto" placeholder="Digite la dirección exacta del lugar dónde realizará el T.C.U."></textarea></li>
                          </div>
                        </div>
                        <li><button type="submit">Confirmar</button><br><br><br></li>
                      </ul>
                    </form>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>

          <?php 
          include '../../footer.php'
          ?>
        </body>
        </html>
