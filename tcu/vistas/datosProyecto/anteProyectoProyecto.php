
<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

?>

<?php
    include '../../conection.php'; //Conección a la DB

      $query = "select grupo, justificacion_proyecto from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $descripcion_beneficiario = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["grupo"];
          $descripcion_beneficiario = $row["justificacion_proyecto"];
      }

 ?>


<label for="identificacionProblema">JUSTIFICACIÓN DEL PROYECTO</label>
<input type="hidden" id="hiddenCodigo" name="hiddenCodigo" value="<?php echo $codigo ?>">
<textarea  id="justificacion_proyecto"
      style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
            rows="20" cols="87" maxlength="1740"><?php echo $descripcion_beneficiario ?>
</textarea>
<br>

<div class="row">
    <div class="col-md-6">
      <button class="btn btn-warning" onclick="guardar('justificacion_proyecto',<?php echo $grupo ?>,1); cargarFormularios('anteProyectoBeneficiario.php','contenedorAnteProyecto');disminuirProgress(20);"><span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</button>
    </div>
    <div class="col-md-6">
      <button class="btn" onclick="guardar('justificacion_proyecto',<?php echo $grupo?>,1);aumentarProgress(20);cargarFormularios('anteProyectoObjetivos.php','contenedorAnteProyecto');" style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
  </div>
