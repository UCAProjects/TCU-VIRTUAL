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
        setReadOnly('descripcion_beneficiario');
      </script>
      <?php
  }

  $query = "select grupo, descripcion_beneficiario from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();

  $descripcion_beneficiario = "";
  $codigo = "";
  foreach($result as $row){
      $codigo = $row["grupo"];
      if($row["descripcion_beneficiario"] != ""){
        $descripcion_beneficiario = $row["descripcion_beneficiario"];
      }
     
  }

 ?>


<label for="identificacionProblema">DESCRIPCIÓN DEL BENEFICIARIO</label>
<input type="hidden" id="hiddenCodigo" name="hiddenCodigo" value="<?php echo $codigo ?>">
        <textarea  id="descripcion_beneficiario"
              style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                    rows="15" cols="87" maxlength="1305"><?php echo $descripcion_beneficiario ?></textarea>
        <br>

 <div class="row">
    <div class="col-md-6">
      <button class="btn btn-primary"  href="#"
          onclick="guardar('descripcion_beneficiario',<?php echo $grupo ?>,1,'anteProyectoProblema.php','contenedorAnteProyecto');disminuirProgress(20);">
            <span class="glyphicon glyphicon-arrow-left"> </span>  
            Atrás
      </button>
    </div>
    <div class="col-md-6">
      <button class="btn" href="#"
        onclick="guardar('descripcion_beneficiario',<?php echo $grupo?>,1,'anteProyectoProyecto.php','contenedorAnteProyecto'); aumentarProgress(20);" 
        style="margin-left:45% !important">
          Continuar  
          <span class="glyphicon glyphicon-arrow-right"></span>
      </button>
    </div>
  </div>
