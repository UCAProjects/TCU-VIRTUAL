<?php
  // session_start();
  // $sesionId = $_SESSION["codigo"];
  // $grupo = $_SESSION["grupo"];
  // $tipo = $_GET['tipo'];
?>

<!doctype html>
<html class="no-js" lang="">
  <head>
    <title>
      AnteProyecto
    </title>

    <link rel="stylesheet" href="../../css/datosProyecto.css">

  </head>
  <body>
    <?php
      session_start();
      include '../../header.php';
      include '../../subHeaderEstudiantes.php';
      include '../../conection.php'; //Conección a la DB
    ?>
    <main class="site-main">
      <section class="seccion-informacion">
        <div class="contenedor clearfix">
          <div class="">
            <h2>ANTE PROYECTO</h2>
            <div  class="ingreso ingresoTamano">
              <div class="container">
                <ul class="progressbar">
                  <li id="20" class="active" >Problema</li>
                  <li id="40">Beneficiario</li>
                  <li id="60" >Proyecto</li>
                  <li id="80">Objetivos</li>
                  <li id="100">Soluciones</li>
                </ul>
              </div><!--.programa-evento-->
              <div style="margin-left:20%;" method="POST">
                <div id="contenedorAnteProyecto">

                </div>
              </div>
              <meter min="0" max="100" id="meter" low="25" high="75" optimum="100"    value="20">
              </meter>
            </div>
          </div><!--.contenedor-->
        </div>
      </section><!--.section programa-->
    </main>


    <div class="modal fade" id="modalAdjuntarDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Cartas de solicitud y aprovación TCU</h2>
            <button type="button" class="close" data-dismiss="modal"     aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="mostrarModal"></div>
          </div>
        </div>
      </div>
    </div>
    <?php
      include '../../footer.php';
    ?>
    <script src="../../js/datosProyecto.js"></script>

    <script>
        $( document ).ready(function() {
            cargarFormularios('anteProyectoProblema.php','contenedorAnteProyecto');
        });
    </script>

  </body>
</html>
