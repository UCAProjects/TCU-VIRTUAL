<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"]; 
 
?>

<?php 
    include '../../conection.php'; //Conección a la DB

      $query = "select codigo, objetivo_general,objetivos_especificos from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $general = "";
      $especificos = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["codigo"];
          $general = $row["objetivo_general"];
          $especificos = $row["objetivos_especificos"];
      }
  
 ?>




	<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">

  <label for="objetivo_general">DESCRIPCION DEL OBJETIVO GENERAL</label>
    <textarea  id="objetivo_general" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="5" cols="87"><?php echo $general ?></textarea>

    <label for="objetivos_especificos">DESCRIPCION DE OBJETIVOS ESPECIFICOS</label>
    <textarea  id="objetivos_especificos" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="12" cols="87"> <?php echo $especificos ?> </textarea>

<br>


  <div class="row">
    <div class="col-md-6">
      <button class="btn btn-warning" onclick="guardar('objetivo_general',<?php echo $grupo ?>,1);guardar('objetivos_especificos',<?php echo $grupo ?>,1); cargarFormularios('anteProyectoProyecto.php','contenedorAnteProyecto');disminuirProgress(20);"><span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</button>
    </div>
    <div class="col-md-6">
      <button class="btn" onclick="guardar('objetivo_general',<?php echo $grupo ?>,1);guardar('objetivos_especificos',<?php echo $grupo ?>,1); cargarFormularios('anteProyectoEstrategiasPertenencias.php','contenedorAnteProyecto');aumentarProgress(20);" style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
  </div>
    