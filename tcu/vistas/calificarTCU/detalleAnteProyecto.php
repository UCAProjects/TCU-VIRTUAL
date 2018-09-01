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
            height: 700px !important;
            width: 100% !important;
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
  $rol = $_SESSION["rolFuncionario"]; // Rol para saber rol del Funcionario:: 1 Director de Carrera | 2 Unidad Extensión 
  $query = "SELECT D.tema,D.organizacion, D.supervisor, A.* FROM tigrupou_tcu.datos D JOIN tigrupou_tcu.ante_proyecto A ON D.grupo like A.grupo WHERE D.grupo like $id";
  $queryEstudiantes = "SELECT CONCAT(primer_apellido,' ',segundo_apellido,' ',nombre_completo) nombre FROM tigrupou_tcu.estudiantes WHERE grupo LIKE $id order by primer_apellido";
  $stmt = $db->prepare($queryEstudiantes);
  $stmt -> execute();
  $resultEstudiantes = $stmt -> fetchAll();
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();
  foreach ($result as $row){
    $tema=$row["tema"];
    $organizacion=$row["organizacion"];
    $supervisor=$row["supervisor"];
    $identificacion_problema=$row["identificacion_problema"];
    $descripcion_problema=$row["descripcion_problema"];
    $descripcion_beneficiario=$row["descripcion_beneficiario"];
    $justificacion_proyecto=$row["justificacion_proyecto"];
    $objetivo_general=$row["objetivo_general"];
    $objetivos_especificos=$row["objetivos_especificos"];
    $estrategias_soluciones=$row["estrategias_soluciones"];
  }
  $linkAceptacion = "";
  $linkSolicitud = "";
  $linkCronograma = "";
  $queryAdjutos = "SELECT url_carta_aceptacion,url_carta_solicitud, url_cronograma_tcu FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $id";
  $stmt = $db->prepare($queryAdjutos);
  $stmt -> execute();
  $resultAdjuntos = $stmt -> fetchAll();
  foreach ($resultAdjuntos as $row){
    $linkAceptacion = $row["url_carta_aceptacion"];
    $linkSolicitud = $row["url_carta_solicitud"];
    $linkCronograma = $row["url_cronograma_tcu"];
  }


  $queryMaxVersion = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto 
  WHERE ante_proyecto like $id and rol LIKE $rol";

  $maxVersion = 0;
  $stmt = $db->prepare($queryMaxVersion); 
  $stmt -> execute();
  $resultMaxV = $stmt -> fetchAll();
  foreach ($resultMaxV as $row) {
      if($row["max"] != ""){
        $maxVersion = $row["max"];
      }
  }



  /**
   * Se verifica que haya una calificación guardada con anterioridad 
   */
  $queryGuardado = "SELECT * FROM tigrupou_tcu.revision_ante_proyecto WHERE version like $maxVersion and ante_proyecto like $id and rol LIKE $rol";
  $stmt = $db->prepare($queryGuardado);
  $stmt -> execute();
  $resultGuardado = $stmt -> fetchAll();
  
  $estadoGuardado = 0;
  $version = 0;
  $observacionesGuardado = "";
  foreach ($resultGuardado as $row) {
    $estadoGuardado = $row["estado"];
    $version = $row["version"];
    $observacionesGuardado = $row["Observaciones"];
  }
  
  ?>
    <main class="site-main">
        <section class="seccion-informacion">
            <div class=" clearfix">
                <div class="">
                    <h2>Ante Proyecto</h2>
                    <div class="ingreso ingresoTamano" style: " margin-left:50% !important">
                        <form class="">
                            <ul class="nav nav-tabs" id="nav">
                                <li class="active"><a href="#nav" onclick="modeLecture()"><i class="fas fa-book"></i> Modo
                                        Lectura</a></li>
                                <li><a href="#nav" onclick="modeRevision()"><i class="fas fa-edit"></i> Modo Revisión</a></li>

                            </ul><br>
                            <div class="well" id="adjuntos">
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>Adjuntos</b>
                                    </div>

                                    <div class="col-md-3" style="margin-right:10px;border-width:5px;border-style:ridge;">
                                        <a href="<?php echo $linkSolicitud?>" target="_blank"><i class="far fa-file-alt"></i>
                                            Carta Solicitud</a>
                                    </div>

                                    <div class="col-md-3 " style="margin-right:10px;border-width:5px;border-style:ridge;">
                                        <a href="<?php echo $linkAceptacion?>" target="_blank"><i class="far fa-file-alt"></i>
                                            Carta Aceptación</a>
                                    </div>

                                    <div class="col-md-3 " style="border-width:5px;border-style:ridge;">
                                        <a href="<?php echo $linkCronograma?>" target="_blank"><i class="far fa-file-alt"></i>
                                            Cronograma de TCU</a>
                                    </div>
                                </div>
                            </div>

                            <div id="LecturaModo" style="margin-right:10%;margin-left:10%;">
                                <div class="row well">
                                    <?php
                    if($rol == 1){ ?>
                                    <div>
                                        <a class="btn" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBE.php')">
                                            <i class="fas fa-gavel"></i> Calificación de la Unidad de Extensión
                                        </a>

                                    </div>
                                    <?php
                    }
                  ?>
                                    <br>
                                    <div class="well">
                                        <h3>
                                            <center>Ante Proyecto</center>
                                        </h3>
                                        <div id="divDocument" style="background-color: white;">
                                            <div style="padding: 40px;">
                                                <center>
                                                    <img src="../../img/uca.png" alt="Smiley face"> <br><br><br><br>
                                                    <h3>Tema</h3>
                                                    <?php echo $tema ?>
                                                    <br>
                                                    <h3>Integrantes</h3>
                                                    <?php
                                                        foreach ($resultEstudiantes as $row) {
                                                            echo $row["nombre"]
                                                            ?>                                                    <br>
                                                                                    <?php
                                                        }
                                                        ?>
                                                    <br>
                                                    <h3>Organización</h3>
                                                    <?php echo $organizacion ?> <br>
                                                    <h3>Supervisor</h3>
                                                    <?php echo $supervisor ?> <br><br><br><br><br><br><br><br> -------- Fin
                                                    de Página --------
                                                    <br><br>
                                                    <br><br><br><br>
                                                </center>
                                                <h3>Identificación del problema</h3>
                                                <?php
                                                    for($i=0;$i<strlen($identificacion_problema);$i++){
                                                    if( $identificacion_problema[$i] == "\n"){?>
                                                                            <br>
                                                                            <?php
                                                    }else{
                                                        echo $identificacion_problema[$i];
                                                    }
                                                    } ?>
                                                                            <h3>Descripción del problema</h3>
                                                                            <?php
                                                    for($i=0;$i<strlen($descripcion_problema);$i++){
                                                    if( $descripcion_problema[$i] == "\n"){?>
                                                                            <br>
                                                                            <?php
                                                    }else{
                                                        echo $descripcion_problema[$i];
                                                    }
                                                    } ?>
                                                                            <h3>Descripción del beneficiario</h3>
                                                                            <?php
                                                    for($i=0;$i<strlen($descripcion_beneficiario);$i++){
                                                    if( $descripcion_beneficiario[$i] == "\n"){?>
                                                                            <br>
                                                                            <?php
                                                    }else{
                                                        echo $descripcion_beneficiario[$i];
                                                    }
                                                    } ?>
                                                <h3>Justificación del Proyecto</h3>
                                                <?php
                        for($i=0;$i<strlen($justificacion_proyecto);$i++){
                          if( $justificacion_proyecto[$i] == "\n"){?>
                                                <br>
                                                <?php
                          }else{
                            echo $justificacion_proyecto[$i];
                          }
                        }
                        ?>
                                                <h3>Objetivo General</h3>
                                                <?php
                        for($i=0;$i<strlen($objetivo_general);$i++){
                          if( $objetivo_general[$i] == "\n"){?>
                                                <br>
                                                <?php
                          }else{
                            echo $objetivo_general[$i];
                          }
                        } ?>
                                                <h3>Objetivos Específicos</h3>
                                                <?php
                        for($i=0;$i<strlen($objetivos_especificos);$i++){
                          if( $objetivos_especificos[$i] == "\n"){?>
                                                <br>
                                                <?php
                          }else{
                            echo $objetivos_especificos[$i];
                          }
                        } ?>
                                                <h3>Estrategias y Soluciones</h3>
                                                <?php
                        for($i=0;$i<strlen($estrategias_soluciones);$i++){
                          if( $estrategias_soluciones[$i] == "\n"){?>
                                                <br>
                                                <?php
                          }else{
                            echo $estrategias_soluciones[$i];
                          }
                        } ?>
                                                <br><br><br><br><br>
                                                <center>-------- Fin Documento -------</center>
                                            </div> <!-- END WELL -->
                                        </div> <!--   END DIV DOCUMENT -->
                                    </div>
                                </div>
                            </div> <!--   END DIV Lecture Mode -->

                            <div id="RevisionMode" style="display: none; margin-right:10%;margin-left:10%;" class="well">
                                <?php
                  if($rol == 1){ ?>
                                <div>
                                    <a class="btn" href="#" onclick="cargarModal({'id':<?php echo $id; ?>},'modalModalDiv','verCalificacion-modal','modalCalificacionBE.php')">
                                        <i class="fas fa-gavel"></i> Calificación de la Unidad de Extensión
                                    </a>
                                </div>
                                <?php
                  }
                ?>
                                <div style="resize: both;"><br>
                                    <div class="row">
                                        <div class="col-md-7 col-md-offset-2">
                                            <h3>
                                                <center>Observaciones</center>
                                            </h3>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-primary" onclick="ingresarCalificacion(<?php echo $id;?>,6,1,<?php echo $rol;?>,
                                                <?php echo $estadoGuardado;?>)"><i
                                                    class="fas fa-save"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <center><textarea id="txtA_observaciones" placeholder="Observaciones" cols="70" rows="20"></textarea></center>
                                </div><!-- END DIV COL -->
                                <br>
                                <?php
                  if($rol == 1){ // Director de Carrera  ?>

                                <?php
                      $maxDCQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 1";
                      $maxEEQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 2";
                      $estadoDCQ = "SELECT estado FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 1 AND version LIKE MAXVERSION;";
                      $estadoEEQ = "SELECT estado FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 2 AND version LIKE MAXVERSION;";

                      $stmt = $db->prepare($maxDCQ);
                      $stmt -> execute();
                      $resultMaxDC = $stmt -> fetchAll();
                      $maxDC = 0;
                      foreach ($resultMaxDC as $row) {
                          if($row["max"] != ""){
                            $maxDC = $row["max"]; // Max del director de carrera
                          }
                        
                      }

                      $stmt = $db->prepare($maxEEQ);
                      $stmt -> execute();
                      $resultMaxEE = $stmt -> fetchAll();
                      $maxEE = 0;
                      foreach ($resultMaxEE as $row) {
                        if($row["max"] != ""){
                            $maxEE = $row["max"]; // Maximo de la Unidad de extensión
                          }
                        
                      }

                      $estadoDCQ = str_replace("MAXVERSION", $maxDC, $estadoDCQ);
                      $stmt = $db->prepare($estadoDCQ);
                      $stmt -> execute();
                      $resultEstadoDC = $stmt -> fetchAll();
                      $estadoResult = 0;
                      foreach ($resultEstadoDC as $row) {
                        $estadoResult = $row["estado"]; // Maximo de la Unidad de extensión
                      }

                      $estadoEEQ = str_replace("MAXVERSION", $maxEE, $estadoEEQ);
                      $stmt = $db->prepare($estadoEEQ);
                      $stmt -> execute();
                      $resultEstadoEE = $stmt -> fetchAll();
                      $estadoResultEE = 0;
                      foreach ($resultEstadoEE as $row) {
                        $estadoResultEE = $row["estado"]; // Maximo de la Unidad de extensión
                      }

                      if((($maxEE - $maxDC) == 1 and $estadoResultEE != 6) or (($maxEE - $maxDC) == 0 and $estadoResult == 6 and $estadoResultEE != 6)){ ?>
                                <div class="row ">
                                    <div class="col-md-2 col-md-offset-2">
                                        <a onclick="ingresarCalificacion(<?php echo $id;?>,4,1,<?php echo $rol;?>,
                                            <?php echo $estadoGuardado;?>)" class="btn btn-block btn-danger">Rechazado
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a onclick="ingresarCalificacion(<?php echo $id;?>,3,1,<?php echo $rol;?>,<?php echo $estadoGuardado;?>)" class="btn btn-block btn-primary">Corregir
                                            Observaciones</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a onclick="ingresarCalificacion(<?php echo $id;?>,2,1, <?php echo $rol;?>,<?php echo $estadoGuardado;?>)" class="btn btn-block btn">Autorizado</a>
                                    </div>
                                    <br>
                                </div>
                                <?php }else{ ?>
                                <br>
                                <center>
                                    <p class="label label-danger"> No se puede continuar hasta que la Unidad de Extensión genere su Calificación.</p>
                                </center>
                                        <?php } ?>
                    <?php }elseif($rol == 2){ //Unidad de Extensión ?>
                                        <div class="row ">
                                            <div class="col-md-2 col-md-offset-8">
                                                <a onclick="ingresarCalificacion(<?php echo $id;?>,3,1,<?php echo $rol;?>,<?php echo $estadoGuardado;?>)" class="btn btn-block btn">Validar</a>
                                            </div>
                                            <br>
                                        </div>
                                        <?php }
                                        ?>
                                        <br>
                            </div>
                        </form>
                    </div>
                </div>
                <!--.programa-evento-->
            </div>
            <!--.contenedor-->
        </section>
        <!--.section programa-->
    </main>

    <script src="../../js/datosProyecto.js"></script>

    <script src="../../js/calificarTcu.js"></script>
    <?php
        include '../../footer.php';
    ?>
     

    <?php 
    if($estadoGuardado == 6){ // Estado 6: estado para editar la calificicación  ?> 
    <script>
        $("#txtA_observaciones").val('<?php echo $observacionesGuardado ?>');
    </script>
    <?php }
  ?>

    <!-- Moda para agregar insumos a la actividad-->
    <div class="modal fade" id="verCalificacion-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_content">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div id="modalModalDiv">
                    <!--Div donde se carga el form para ingresar los datos -->
                </div>
            </div>
        </div>
    </div>


</body>

</html>