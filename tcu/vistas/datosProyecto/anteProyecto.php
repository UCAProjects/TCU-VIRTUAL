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

      $grupo = $_SESSION["grupo"];

      $linkAceptacion = "";
      $linkSolicitud = "";
      $linkCronograma = "";
      $queryAdjutos = "SELECT url_carta_aceptacion,url_carta_solicitud, url_cronograma_tcu FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $grupo";
      $stmt = $db->prepare($queryAdjutos);
      $stmt -> execute();
      $resultAdjuntos = $stmt -> fetchAll();
      foreach ($resultAdjuntos as $row) {
        $linkAceptacion = $row["url_carta_aceptacion"];
        $linkSolicitud = $row["url_carta_solicitud"];
        $linkCronograma = $row["url_cronograma_tcu"];
      }

    ?>
    <main class="site-main">
      <section class="seccion-informacion">
        <div class="contenedor clearfix">
          <div class="">
            <h2>ANTE PROYECTO</h2>
            
            <div  class="ingreso ingresoTamano">
            
            <?php 
                if($linkAceptacion != "" or $linkCronograma != "" or $linkSolicitud != ""){ ?>
                  <div class="well" id="adjuntos">
                      <div class="row">
                        <div class="col-md-2">
                          <b>Adjuntos</b>
                        </div>
                        <?php
                          if($linkSolicitud != ""){ ?>
                            <div class="col-md-3" style="margin-right:10px;border-width:5px;border-style:ridge;">
                              <a href="<?php echo $linkSolicitud?>" target="_blank"><i class="far fa-file-alt"></i> Carta Solicitud</a>
                            </div>
                          <?php } ?>

                        <?php   
                          if($linkAceptacion != ""){ ?>
                            <div class="col-md-3 " style="margin-right:10px;border-width:5px;border-style:ridge;">
                              <a href="<?php echo $linkAceptacion?>" target="_blank"><i class="far fa-file-alt"></i> Carta Aceptación</a>
                            </div>
                        <?php } ?>

                        <?php   
                          if($linkCronograma != ""){ ?>
                            <div class="col-md-3 " style="border-width:5px;border-style:ridge;">
                              <a href="<?php echo $linkCronograma?>" target="_blank"><i class="far fa-file-alt"></i> Cronograma de TCU</a>
                            </div>
                        <?php } ?>
                      </div>
                  </div>

                <?php } ?>
                
              <br><br>
              <div style="margin-left:20%;" method="POST">
                <div id="contenedorAnteProyecto">
                </div>
              </div>
              <br><br><br>
              <meter style="width: 90%; margin-left:5%" min="0" max="100" id="meter" low="25" high="75" optimum="100"    value="20">
              </meter>
              <!--<div class="container">
                <ul class="progressbar">
                  <li id="20" class="active">Problema</li>
                  <li id="40">Beneficiario</li>
                  <li id="60" >Proyecto</li>
                  <li id="80">Objetivos</li>
                  <li id="100">Soluciones</li>
                </ul>
              </div>--><!--.programa-evento-->
              
              
              
            </div>
          </div><!--.contenedor-->
        </div>
      </section><!--.section programa-->
    </main>
    <div class="modal fade" id="modalAdjuntarDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Documentos por Adjuntar</h2>
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
