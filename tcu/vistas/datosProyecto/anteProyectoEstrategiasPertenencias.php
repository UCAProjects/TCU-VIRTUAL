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
        setReadOnly('estrategias_soluciones');
        setDisabled('btnEnviar');
        $("#labelNoAccess").text("No es posible enviar el Resumen Ejecutivo ya que este se encuentra en Revisión o ya ha sido Aprobado.");
      </script>
      <?php
  }


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
      <button class="btn btn-primary" href="#"
        onclick="guardar('estrategias_soluciones',<?php echo $grupo ?>,1,'anteProyectoObjetivos.php','contenedorAnteProyecto'); disminuirProgress(20);">
          <span class="glyphicon glyphicon-arrow-left"> </span>  
          Atrás
      </button>
    </div>
    <div class="col-md-6">
      <button id="btnEnviar" class="btn" 
        onclick="guardar('estrategias_soluciones',<?php echo $grupo ?>,1,'',''); cargarModal(null,'mostrarModal','modalAdjuntarDatos','modalDatosAdjuntos.php');" 
          style="margin-left:50% !important">
            <i class="far fa-paper-plane"></i> 
            ENVIAR
      </button>
    </div>
  </div>

  <br><br>
  <center><label id="labelNoAccess" class="label label-danger"></label></center>
