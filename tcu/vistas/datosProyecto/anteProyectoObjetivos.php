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
        setReadOnly('objetivo_general');
        setReadOnly('objetivos_especificos');
      </script>
      <?php
  }

  $query = "select grupo, objetivo_general,objetivos_especificos from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();

  $general = "";
  $especificos = "";
  $codigo = "";
  foreach($result as $row){
      $codigo = $row["grupo"];
      $general = $row["objetivo_general"];
      $especificos = $row["objetivos_especificos"];
  }

 ?>

  <div class="row">
    <input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">

    <label for="objetivo_general">OBJETIVO GENERAL</label>
  </div>
	
  <div class="row">
    <textarea  id="objetivo_general"
        style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                rows="5" cols="87"><?php echo $general ?></textarea>
  </div>
  
  <div class="row">
    <label for="objetivos_especificos">OBJETIVOS ESPECIFICOS</label>
  </div>
  
  <div class="row">
    <textarea  id="objetivos_especificos"
        style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                rows="12" cols="87"><?php echo $especificos ?></textarea>
  </div>
  

<br>


  <div class="row">
    <div class="col-md-6">
      <button class="btn btn-primary" href="#"
        onclick="guardar('objetivo_general',<?php echo $grupo ?>,1);guardar('objetivos_especificos',<?php echo $grupo ?>,1, 'anteProyectoProyecto.php','contenedorAnteProyecto');disminuirProgress(20);">
          <span class="glyphicon glyphicon-arrow-left"> </span>  
          Atrás
      </button>
    </div>
    <div class="col-md-6">
      <button class="btn" href="#"
        onclick="guardar('objetivo_general',<?php echo $grupo ?>,1);guardar('objetivos_especificos',<?php echo $grupo ?>,1,'anteProyectoEstrategiasPertenencias.php','contenedorAnteProyecto'); aumentarProgress(20);" 
          style="margin-left:45% !important"> 
            Continuar  <span class="glyphicon glyphicon-arrow-right"></span>
      </button>
    </div>
  </div>
