<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
    TCU
  </title>
  <link rel="stylesheet" href="../../css/datosProyecto.css">
  <style type="text/css">
    #divDocument {
      overflow-y: scroll;
      height: 700px  !important;
      width: 100% !important;
    }
    * {box-sizing: border-box}
    .mySlides1, .mySlides2 {display: none}
    img {vertical-align: middle;}

  /* Slideshow container */
  .slideshow-container {
    max-width: 200px;
    width: 200px !important;
    height: 20px !important;
    position: relative;
    margin: auto;
  }

  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
}

  </style>
</head>
<body>

    <?php
    session_start();
    include '../../header.php';
    include '../../subHeaderFuncionarios.php';
    include '../../conection.php'; //Conección a la DB

    $id = $_GET["id"];
    $carrera = $_SESSION["carreraFuncionario"]; // Carrera a la que partenece el funcionario
    $query = "SELECT D.tema,D.organizacion, D.supervisor, A.* FROM tigrupou_tcu.datos D JOIN tigrupou_tcu.resumen_ejecutivo A ON D.grupo like A.grupo WHERE D.grupo like $id";
    $queryEstudiantes = "SELECT CONCAT(primer_apellido,' ',segundo_apellido,' ',nombre_completo) nombre FROM tigrupou_tcu.estudiantes WHERE grupo LIKE $id order by primer_apellido";
    $stmt = $db->prepare($queryEstudiantes);
    $stmt -> execute();
    $resultEstudiantes = $stmt -> fetchAll();
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    foreach ($result as $row) {
      // Portada
      $tema=$row["tema"];
      $organizacion=$row["organizacion"];
      $supervisor=$row["supervisor"];
      //Contenido
      $resumen_actividades=$row["resumen_actividades"];
      $evaluacion = $row["evaluacion"];
      $conclusion = $row["conclusion"];
      $recomendaciones = $row["recomendaciones"];
    }


    $linkConclusion = "";
    $linkBitacora = "";
    $queryAdjutos = "SELECT url_carta_conclusion, url_bitacora FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $id";
    $stmt = $db->prepare($queryAdjutos);
    $stmt -> execute();
    $resultAdjuntos = $stmt -> fetchAll();
    foreach ($resultAdjuntos as $row) {
      $linkConclusion = $row["url_carta_conclusion"];
      $linkBitacora = $row["url_bitacora"];
    }

    $maxDCQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $id AND rol LIKE 1";
    $maxEEQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $id AND rol LIKE 2";

    $stmt = $db->prepare($maxDCQ);
    $stmt -> execute();
    $resultMaxDC = $stmt -> fetchAll();
    foreach ($resultMaxDC as $row) {
      $maxDC = $row["max"];
    }
    $stmt = $db->prepare($maxEEQ);
    $stmt -> execute();
    $resultMaxEE = $stmt -> fetchAll();
    foreach ($resultMaxEE as $row) {
      $maxEE = $row["max"];
    } 


    $queryPhotoEvi = "SELECT url FROM tigrupou_tcu.evidencias_adjuntas WHERE GRUPO LIKE $id LIMIT 0, 10";
    $stmt = $db -> prepare($queryPhotoEvi);
    $stmt -> execute();
    $resultPhotoEvi = $stmt -> fetchAll();
  ?>

  <main class="site-main">
    <section class="seccion-informacion">
      <div class=" clearfix">
        <div class="">
          <div  class="ingreso ingresoTamano">
            <form class="">
              <h2>Resumen Ejecutivo</h2>

              <ul class="nav nav-tabs" id="nav">
                  <li class="active"><a href="#nav" onclick="modeLecture()"><i class="fas fa-book"></i> Modo Lectura</a></li>
                  <li><a href="#nav" onclick="modeRevision()"><i class="fas fa-edit"></i> Modo Revisión</a></li>
              </ul>
              <br>

              <div class="well" id="adjuntos" style="margin-right:4%;margin-left:4%;">
                <div class="row">
                  <div class="col-md-3">
                    <fieldset>
                      <legend>Adjuntos</legend>
                        <a href="<?php echo $linkConclusion?>" target="_blank"><i class="far fa-file-alt"></i> Carta Conclusión</a> <br>  
                        <a href="<?php echo $linkBitacora?>" target="_blank"><i class="far fa-file-alt"></i>    Bitácora   </a>
                      </fieldset>
                  </div> 
                  <div class="col-md-9" > 
                    <fieldset>
                      <legend>Evidencias</legend> 
                      
                      <?php 
                          foreach ($resultPhotoEvi as $row) {
                            $url = $row["url"]; ?>
                            <a href="<?php echo $url ?>"  target="_blank" </a>
                              <img src="<?php echo $url ?>" class="img-thumbnail"  style="width:82px; height:60px" />
                            </a>
                         <?php } 
                      ?>
                    </fieldset>
                  </div> 
                </div>
              </div>
              <div id="LecturaModo" style="margin-right:5%;margin-left:5%;">
                <div class="row well">
                <?php
                    if($rol == 1){ ?>
                      <div>
                        <?php if(($maxEE - $maxDC) == 1){ ?>
                          <a class="btn btn-success" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBEResumenEjecutivo.php')">
                              <i class="fas fa-gavel"></i> Unidad de Extensión
                            </a>
                        <?php }else{ ?> 
                              <a class="btn btn-danger" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBEResumenEjecutivo.php')">
                                <i class="fas fa-gavel"></i> Unidad de Extensión
                              </a>
                        <?php } ?>  
                      </div><?php
                    }
                  ?> <br>
                  <div class="well">
                    <fieldset>
                      <legend><h3>Ante Proyecto</h3></legend>
                    <div id="divDocument"  style="background-color: white;">
                      <div style="padding: 40px;">
                        <center>
                          <img src="../../img/uca.png" alt="Smiley face">  <br><br><br><br>
                          <h3>Tema</h3>
                          <?php echo $tema ?>
                          <br>
                          <h3>Intergrantes</h3>
                          <?php
                          foreach ($resultEstudiantes as $row) {
                            echo $row["nombre"]
                            ?> <br>
                            <?php
                          }
                          ?>
                          <br>
                          <h3>Organización</h3>
                          <?php echo $organizacion ?> <br>
                          <h3>Supervisor</h3>
                          <?php echo $supervisor ?> <br><br><br><br><br><br><br><br>

                          -------- Fin de Página --------
                          <br><br>
                          <br><br><br><br>
                        </center>
                        <h3>Resumen de las actividades realizadas durante el TCU</h3>
                        <?php
                        for($i=0;$i<strlen($resumen_actividades);$i++){
                          if( $resumen_actividades[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $resumen_actividades[$i];
                          }
                        } ?>
                        <h3>Evaluación</h3>
                        <?php
                        for($i=0;$i<strlen($evaluacion);$i++){
                          if( $evaluacion[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $evaluacion[$i];
                          }
                        } ?>
                        <h3>Conclusión</h3>
                        <?php
                        for($i=0;$i<strlen($conclusion);$i++){
                          if( $conclusion[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $conclusion[$i];
                          }
                        } ?>
                        <h3>Recomendaciones</h3>
                        <?php
                        for($i=0;$i<strlen($recomendaciones);$i++){
                          if( $recomendaciones[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $recomendaciones[$i];
                          }
                        }
                        ?>
                        <br><br><br><br><br>
                        <center>-------- Fin Documento -------</center>
                      </div>
                    </div> <!--   END DIV DOCUMENT -->
                    </fieldset>Acomp if setct in nevf
                  </div> comz quer bnie poz apow queen on f
                </div>
              </div>  <!--   END DIV Lecture Mode -->

              <div id="RevisionMode" style="display: none; margin-right:4%;margin-left:4%;" class="well">
              <?php
                    if($rol == 1){ ?>
                      <div>
                        <?php if(($maxEE - $maxDC) == 1){ ?>
                          <a class="btn btn-success" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBEResumenEjecutivo.php')">
                              <i class="fas fa-gavel"></i> Unidad de Extensión
                            </a>
                        <?php }else{ ?> 
                              <a class="btn btn-danger" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBEResumenEjecutivo.php')">
                                <i class="fas fa-gavel"></i> Unidad de Extensión
                              </a>
                        <?php } ?>  
                      </div><?php
                    }
                  ?> 
                <div style="resize: both;">
                  <fieldset>
                      <legend><h3><h3>Observaciones</h3></h3></legend>
                         <textarea  id="txtA_observaciones" placeholder="Observaciones" cols="120" rows="10"></textarea>
                  </fieldset>
                </div><!-- END DIV COL -->
                <br>
                <?php
                  if($rol == 1){ // Director de Carrera  
                      if(($maxEE - $maxDC) == 1){ ?>?
                          <div class="row ">
                            <div class="col-md-2 col-md-offset-2" >
                              <a onclick="ingresarCalificacion(<?php echo $id;?>,4,2,<?php echo $rol;?>)" class="btn btn-block btn-danger">Rechazado </a>
                            </div>
                            <div class="col-md-4">
                              <a onclick="ingresarCalificacion(<?php echo $id;?>,3,2,<?php echo $rol;?>)" class="btn btn-block btn-primary">Corregir Observaciones</a>
                            </div>
                            <div class="col-md-2">
                              <a onclick="ingresarCalificacion(<?php echo $id;?>,2,2, <?php echo $rol;?>)" class="btn btn-block btn">Autorizado</a>
                            </div>
                            <br>
                          </div>
                          <?php }else{ ?>
                             <br>
                                      <center><p class="label label-danger"> No se puede continuar hasta que la Unidad de Extensión genere su Calificación.</p> <center>
                            <?php } ?>
                  <?php }elseif($rol == 2){ //Unidad de Extensión ?>
                      <div class="row ">
                        <div class="col-md-2 col-md-offset-8" >
                          <a onclick="ingresarCalificacion(<?php echo $id;?>,3,2,<?php echo $rol;?>)" class="btn btn-block btn">Validar</a>
                        </div>
                        <br>
                      </div>
                  <?php }
                ?>
              <br>
            </div>
            </form>
          </div>
        </div><!--.programa-evento-->
      </div><!--.contenedor-->
    </section><!--.section programa-->
  </main>

    <!-- Moda para agregar insumos a la actividad-->
    <div class="modal fade" id="verCalificacion-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modal_content">
        <div class="modal-header" align="center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>
        <div id="modalModalDiv"> <!--Div donde se carga el form para ingresar los datos -->
        </div>
      </div>
    </div>
  </div>
  <script src="../../js/calificarTcu.js"></script>
  <?php
    include '../../footer.php';
  ?>
  <script src="../../js/datosProyecto.js"></script>
  
 </body>
</html>
