<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

    include '../../conection.php'; //Conección a la DB

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
      <a class="btn btn-warning"  href="#"
          onclick="guardar('conclusion',<?php echo $grupo ?>,2); cargarFormularios('resumenEjecutivoEvaluacion.php','contenedorResumenEjecutivo');disminuirProgress(25);">
              <span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</a>
    </div>
    <div class="col-md-6">
      <a class="btn btn-success" href="#" 
          onclick="guardar('conclusion',<?php echo $grupo?>,2);cargarFormularios('resumenEjecutivoRecomendaciones.php','contenedorResumenEjecutivo');aumentarProgress(25);"
            style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></a>
    </div>
  </div>
