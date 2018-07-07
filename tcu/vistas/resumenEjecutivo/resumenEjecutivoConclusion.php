<?php
  session_start();
  include '../../conection.php'; //Conección a la DB

  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

  /**
   * Codigo para verificar el estado del resumen Ejecutivo y así 
   * dar acceso al usuario a las distintas opciones del menú.
   */
  $queryResumenEjecutivoStatus = "SELECT estado FROM tigrupou_tcu.resumen_ejecutivo WHERE grupo LIKE $grupo";
  $stmt = $db->prepare($queryResumenEjecutivoStatus);
  $stmt -> execute();
  $resultResumenEjecutivoStatus = $stmt -> fetchAll();
  foreach ($resultResumenEjecutivoStatus as $row) {
    $estatusResumenEjecutivo = $row["estado"];
  }
  if($estatusResumenEjecutivo == '1' or $estatusResumenEjecutivo == '2'){
    ?>
      <script>
        setReadOnly('conclusion');
      </script>
      <?php
  }

  $query = "SELECT grupo, conclusion FROM tigrupou_tcu.resumen_ejecutivo where grupo like $grupo;";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();

  $conclusion = "";
  $codigo = "";
  foreach($result as $row){
      $codigo = $row["grupo"];
      $conclusion = $row["conclusion"];
  }

 ?>

<label for="conclusion">CONCLUSIONES DEL PROYECTO</label>
<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
<textarea  id="conclusion"
      style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
            rows="42" cols="87" maxlength="3654"><?php echo $conclusion ?></textarea>


<br>
<div class="row">
    <div class="col-md-6">
      <a class="btn btn-primary"  href="#"
          onclick="guardar('conclusion',<?php echo $grupo ?>,2); cargarFormularios('resumenEjecutivoEvaluacion.php','contenedorResumenEjecutivo');disminuirProgress(25);">
              <span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</a>
    </div>
    <div class="col-md-6">
      <a class="btn btn" href="#" 
          onclick="guardar('conclusion',<?php echo $grupo?>,2);cargarFormularios('resumenEjecutivoRecomendaciones.php','contenedorResumenEjecutivo');aumentarProgress(25);"
            style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></a>
    </div>
  </div>
