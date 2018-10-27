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
          setReadOnly('identificacion_problema');
          setReadOnly('descripcion_problema');
        </script>
        <?php
    }
    
    $query = "select grupo, identificacion_problema,descripcion_problema from tigrupou_tcu.ante_proyecto where grupo like $grupo;";
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    $identificacionProblema = "";
    $descripcionProblema = "";
    $codigo = "";
    foreach($result as $row){
        $codigo = $row["grupo"];
        if($row["identificacion_problema"] != ""){
            $identificacionProblema = $row["identificacion_problema"];
        }
        if($row["descripcion_problema"] != ""){
            $descripcionProblema = $row["descripcion_problema"];
        }
        
    }
 ?>

<div class="row">
    <label for="identificacionProblema">IDENTIFICACIÓN DEL PROBLEMA</label>
    <input type="hidden" name="hiddenCodigo" id="hiddenCodigo" value="<?php echo $codigo?>">
</div>
<div class="row">
    <textarea  id="identificacion_problema"
          style="font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                rows="15" cols="87" maxlength="1305"><?php echo $identificacionProblema ?></textarea>
</div>
    
<div class="row">
    <label for="identificacionProblema2">DESCRIPCIÓN DEL PROBLEMA</label>
</div>

<div class="row">
    <textarea  id="descripcion_problema"
        style="font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;"
                rows="21" cols="87" maxlength="1827" ><?php echo $descripcionProblema ?></textarea>

</div>
    
<br>
    <button class="btn" href="#"
        onclick="guardar('identificacion_problema',<?php echo $grupo ?>,1,'','');
                    guardar('descripcion_problema',<?php echo $grupo ?>,1,'anteProyectoBeneficiario.php','contenedorAnteProyecto', <?php echo $grupo ?>);
                    aumentarProgress(20); "
        style="margin-left:74% !important">Continuar
            <span class="glyphicon glyphicon-arrow-right"></span>
    </button>
