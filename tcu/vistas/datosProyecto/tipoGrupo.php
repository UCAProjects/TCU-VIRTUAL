<?php
session_start();

  $tipo = $_GET['tipo'];
  $sesionId = $_SESSION["codigo"];
  $grupo = 0;
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
      <link rel="stylesheet" href="../../css/datosProyecto.css">
        <title>
          Crear Grupo
        </title>

    </head>
    <body>

      <?php
        include '../../header.php';
        if($tipo == 1){
          include '../../subHeaderEstudiantes.php';
        }
        include '../../conection.php';
      ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Grupo</h2>
                  <div class="formulario well" novalidate>

                    <br><br>

                    <p class="h3">¿El presente TCU será realizádo de forma grupal o individual?</p>
                    <br>
                    <div class="row">
                      <div class="col-md-2">
                        Individual
                      </div>
                      <div class="col-md-2">
                        <input type="checkbox" id="individual" name="individual" value="individual">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        Grupal
                      </div>
                      <div class="col-md-2">
                        <input type="checkbox" id="grupal" name="grupal" value="grupal">
                      </div>
                    </div>

                    <a class="btn btn-success btn-lg" onclick="redirectGrupo(<?php echo $tipo?>,<?php echo $sesionId?>)">Confirmar</a>

                    <br><br><br>

                  </div>

                </div>
              </div><!--.contenedor-->

          </section><!--.section programa-->
        </main>

        <?php
          include '../../footer.php'
        ?>
         <script src="../../js/datosProyecto.js"></script>
    </body>
</html>
