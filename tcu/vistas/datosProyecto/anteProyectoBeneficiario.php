<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

?>

<?php
    include '../../conection.php'; //Conección a la DB

      $query = "select grupo, descripcion_beneficiario from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $descripcion_beneficiario = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["grupo"];
          $descripcion_beneficiario = $row["descripcion_beneficiario"];
      }

 ?>


<label for="identificacionProblema">DESCRIPCION DEL BENEFICIARIO</label>
<input type="hidden" id="hiddenCodigo" name="hiddenCodigo" value="<?php echo $codigo ?>">
                      <textarea  id="descripcion_beneficiario" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="10" cols="87"><?php echo $descripcion_beneficiario ?> </textarea>

                      <br>



 <div class="row">
    <div class="col-md-6">
      <button class="btn btn-warning" onclick="guardar('descripcion_beneficiario',<?php echo $grupo ?>,1); cargarFormularios('anteProyectoProblema.php','contenedorAnteProyecto');disminuirProgress(20);"><span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</button>
    </div>
    <div class="col-md-6">
      <button class="btn" onclick="guardar('descripcion_beneficiario',<?php echo $grupo?>,1);cargarFormularios('anteProyectoProyecto.php','contenedorAnteProyecto'); aumentarProgress(20);" style="margin-left:45% !important">Continuar  <span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
  </div>
