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
  $query = "SELECT D.tema,D.organizacion, D.supervisor, A.* FROM tigrupou_tcu.datos D JOIN tigrupou_tcu.ante_proyecto A ON D.grupo like A.grupo WHERE D.grupo like $id";
  $queryEstudiantes = "SELECT CONCAT(primer_apellido,' ',segundo_apellido,' ',nombre_completo) nombre FROM tigrupou_tcu.estudiantes WHERE grupo LIKE $id order by primer_apellido";
  $stmt = $db->prepare($queryEstudiantes);
  $stmt -> execute();
  $resultEstudiantes = $stmt -> fetchAll();
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();
  foreach ($result as $row) {
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
  ?>
  <main class="site-main">
    <section class="seccion-informacion">
      <div class=" clearfix">
        <div class="">
          <div  class="ingreso ingresoTamano">
            <form class="">
              <div class="row well">
                <div class="col-md-7" class="well">
                  <h2>Ante Proyecto</h2>
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
                      <h3>Descripción  del problema</h3>
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
                      <h3>Objetivos Especificos</h3>
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
                    </div>
                  </div> <!--   END DIV DOCUMENT -->
                </div>
                <div class="col-md-5" style=" height: 500px;  resize: both;">
                  <h2>Observaciones</h2>
                  <textarea style="width: 100%;height: 700px" id="txtA_observaciones" placeholder="Observaciones"></textarea>
                </div><!-- END DIV COL -->
              </div> <!-- END DIV ROW -->
              <div class="row ">
                <div class="col-md-3">
                  <a onclick="ingresarCalificacion(<?php echo $id;?>,2,1)" class="btn btn-block btn-success">Aprobar</a>
                </div>
                <div class="col-md-4 col-md-offset-1">
                  <a onclick="ingresarCalificacion(<?php echo $id;?>,3,1)" class="btn btn-block btn-primary">Aprobar con Observaciones</a>
                </div>
                <div class="col-md-3 col-md-offset-1">
                  <a onclick="ingresarCalificacion(<?php echo $id;?>,4,1)" class="btn btn-block btn-danger">Reprobado </a>
                </div><br>
              </div>
            </form>
          </div>
        </div><!--.programa-evento-->
      </div><!--.contenedor-->
    </section><!--.section programa-->
  </main>
  <script src="../../js/calificarTcu.js"></script>
  <?php
  include '../../footer.php';
  ?>
  <script src="../../js/datosProyecto.js"></script>
</body>
</html>
