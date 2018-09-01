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
  $estatusResumenEjecutivo = "";
  foreach ($resultResumenEjecutivoStatus as $row) {
    $estatusResumenEjecutivo = $row["estado"];
  }
  if($estatusResumenEjecutivo == '1' or $estatusResumenEjecutivo == '2'){
    ?>
      <script>
        setReadOnly('recomendaciones');
        setDisabled('btnEnviar');
        $("#labelNoAccess").text("No es posible enviar el Resumen Ejecutivo ya que este se encuentra en Revisión o ya ha sido Aprobado.");
      </script>
      <?php
  }

  $queryTotalHoras = "SELECT sum(numero_horas) as HORAS FROM tigrupou_tcu.horas_tcu WHERE grupo like $grupo";
  $stmt = $db ->prepare($queryTotalHoras);
  $stmt -> execute();
  $resultTotalHoras  = $stmt -> fetchAll();
  foreach ($resultTotalHoras as $row) {
    $totalHoras = $row["HORAS"];
  }
  if($totalHoras < '150' ){
    ?>
      <script>
        setDisabled('btnEnviar');
        $("#labelHours").text("No es posible enviar el Resumen Ejecutivo hasta que se hayan completado las 150 horas de TCU.");
      </script>
      <?php
  }

  $query = "SELECT grupo, recomendaciones FROM tigrupou_tcu.resumen_ejecutivo where grupo like $grupo;";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();

  $recomendaciones = "";
  $codigo = "";
  foreach($result as $row){
      $codigo = $row["grupo"];
      $recomendaciones = $row["recomendaciones"];
  }
 ?>

<label for="recomendaciones">RECOMENDACIONES</label>
<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
<textarea  id="recomendaciones"
      style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
            rows="42" cols="87" maxlength="3654"><?php echo $recomendaciones  ?></textarea>

<br>

  <div class="row">
    <div class="col-md-6">
      <a class="btn btn-primary"  href="#"
          onclick="guardar('recomendaciones',<?php echo $grupo ?>,2,'resumenEjecutivoConclusion.php','contenedorResumenEjecutivo'); disminuirProgress(25);">
              <span class="glyphicon glyphicon-arrow-left"> </span>Atrás</a>
    </div>
    <div class="col-md-6">
      <button id="btnEnviar" class="btn" 
        onclick="guardar('recomendaciones',<?php echo $grupo?>,2,'',''); 
            cargarModal(null,'mostrarModalConclusion','modalAdjuntarConclusion','modalAdjuntarConclusion.php');" 
        style="margin-left:50% !important"><i class="far fa-paper-plane"></i> ENVIAR
      </button>
    </div>
  </div>

  <br><br>
  <center><label id="labelNoAccess" class="label label-danger"></label></center>
  <center><label id="labelHours" class="label label-danger"></label></center>
