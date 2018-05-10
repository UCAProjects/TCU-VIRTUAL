<?php
  session_start();
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];
?>

<?php
    include '../../conection.php'; //Conección a la DB

      $query = "select grupo, estrategias_soluciones from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();

      $estrategias_soluciones = "";
      $codigo = "";
      foreach($result as $row){
      	  $codigo = $row["grupo"];
          $estrategias_soluciones = $row["estrategias_soluciones"];
      }

 ?>

<label for="identificacionProblema">ESTRATEGIAS Y PERTENENCIAS DE LAS POSIBLES SOLUCIONES</label>
	<input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
    <textarea  id="estrategias_soluciones"
          style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                rows="30" cols="87" maxlength="2610"><?php echo $estrategias_soluciones  ?></textarea>
<br>

  <div class="row">
    <div class="col-md-6">
      <button class="btn btn-warning" onclick="guardar('estrategias_soluciones',<?php echo $grupo ?>,1); cargarFormularios('anteProyectoObjetivos.php','contenedorAnteProyecto'); disminuirProgress(20);"><span class="glyphicon glyphicon-arrow-left"> </span>  Atrás</button>
    </div>
    <div class="col-md-6">
      <button class="btn" onclick="cargarModal(null,'mostrarModal','modalAdjuntarDatos','modalDatosAdjuntos.php');" style="margin-left:50% !important"><i class="far fa-paper-plane"></i> ENVIAR</button>
    </div>
  </div>
