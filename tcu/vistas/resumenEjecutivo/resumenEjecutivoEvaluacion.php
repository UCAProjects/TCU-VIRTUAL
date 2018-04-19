<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

    include '../../conection.php'; //Conección a la DB

      $query = "SELECT grupo, evaluacion FROM tigrupou_tcu.resumen_ejecutivo where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $evaluacion = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["grupo"];
          $evaluacion = $row["evaluacion"];
      }

 ?>



<label for="evaluacion">EVALUACION DEL TCU</label>
	<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
    <textarea  id="evaluacion" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="50" cols="87"><?php echo $evaluacion ?></textarea>


<br>
<div class="row">
    <div class="col-md-6">
      <button class="btn btn-warning" onclick="guardar('evaluacion',<?php echo $grupo ?>,2); cargarFormularios('resumenEjecutivoResumen.php','contenedorResumenEjecutivo');disminuirProgress(25);"><span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</button>
    </div>
    <div class="col-md-6">
      <button class="btn" onclick="guardar('evaluacion',<?php echo $grupo?>,2);cargarFormularios('resumenEjecutivoConclusion.php','contenedorResumenEjecutivo');aumentarProgress(25);" style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
  </div>
