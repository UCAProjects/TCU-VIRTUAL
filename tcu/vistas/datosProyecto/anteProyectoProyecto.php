
<?php
  session_start();
  include '../../conection.php'; //Conección a la DB
  $sesionId = $_SESSION["codigo"];
  $grupo = $_SESSION["grupo"];

  /**
   * Codigo para verificar el estado del anteProyecto y así 
   * dar acceso al usuario a las distintas opciones del menú.
   */
  $queryAnteProyectoStatus = "SELECT estado FROM tigrupou_tcu.ante_proyecto WHERE grupo LIKE $grupo";
  $stmt = $db->prepare($queryAnteProyectoStatus);
  $stmt -> execute();
  $resultAnteProyectoStatus = $stmt -> fetchAll();
  $estatusAnteProyecto = "";
  foreach ($resultAnteProyectoStatus as $row) {
    $estatusAnteProyecto = $row["estado"];
  }
  if($estatusAnteProyecto == '1' or $estatusAnteProyecto == '2'){
    ?>
      <script>
        setReadOnly('justificacion_proyecto');
      </script>
      <?php
  }

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
            rows="20" cols="87" maxlength="1740"><?php echo $descripcion_beneficiario ?></textarea>
<br>

<div class="row">
    <div class="col-md-6">
      <button class="btn btn-primary" href="#" 
        onclick="guardar('justificacion_proyecto',<?php echo $grupo ?>,1,'anteProyectoBeneficiario.php','contenedorAnteProyecto'); disminuirProgress(20);">
          <span class="glyphicon glyphicon-arrow-left"> </span>  
          Atrás
      </button>
    </div>
    <div class="col-md-6">
      <button class="btn" href="#"
        onclick="guardar('justificacion_proyecto',<?php echo $grupo?>,1,'anteProyectoObjetivos.php','contenedorAnteProyecto');aumentarProgress(20);" 
          style="margin-left:45% !important">
            Continuar  <span class="glyphicon glyphicon-arrow-right"></span>
      </button>
    </div>
  </div>
