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
   Resumen Ejecutivo
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
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->


          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Resumen Ejecutivo</h2>
                  <div  class="ingreso ingresoTamano">

                   <!--<div class="container">
                        <ul class="progressbar">
                            <li id="25" class="active" >Resumen</li>
                            <li id="50">Evalucación</li>
                            <li id="75" >conclusión</li>
                            <li id="100">Recomendaciones</li>
                        </ul>
                  </div>--><!--.programa-evento-->
                  <br><br>
                    <div style="margin-left:20%;" method="POST">
                      <div id="contenedorResumenEjecutivo">
                      </div>
                    </div>

                    <br><br><br>
                    <meter style="width: 90%; margin-left:5%" min="0" max="100" id="meter" low="25" high="75" optimum="100"    value="20">
                    </meter>

                  </div>

              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>
            <div class="modal fade" id="modalAdjuntarConclusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h2 class="modal-title" id="exampleModalLabel">Documentos por Adjuntar</h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div id="mostrarModalConclusion"></div>
                      </div>

                    </div>
              </div>
            </div>
          <?php
          include '../../footer.php';
          ?>
        <script src="../../js/datosProyecto.js">

        </script>
        <script>
            $( document ).ready(function() {
                cargarFormularios('resumenEjecutivoResumen.php','contenedorResumenEjecutivo');
            });
        </script>
        </body>
        </html>
