<?php
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

  include '../../conection.php'; //Conección a la DB

      $query = "SELECT grupo, resumen_actividades FROM tigrupou_tcu.resumen_ejecutivo where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $resumen_actividades = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["grupo"];
          $resumen_actividades = $row["resumen_actividades"];
      }

 ?>



<label for="identificacionProblema">RESUMEN DE LAS ACTIVIDADES REALIZADAS DURANTE EL TCU</label>
	<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
    <textarea  id="resumen_actividades" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="50" cols="87"><?php echo $resumen_actividades ?></textarea>

<br>

    <button class="btn" onclick="guardar('resumen_actividades',<?php echo $grupo ?>,2);cargarFormularios('resumenEjecutivoEvaluacion.php','contenedorResumenEjecutivo');aumentarProgress(25);" style="margin-left:74% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></button>
