<?php
  session_start();
  include '../../conection.php'; //Conección a la DB


  $id = $_POST["id"];
  $query =  "SELECT R.Observaciones, E.descripcion as estado, R.version, DATE_FORMAT(R.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha FROM tigrupou_tcu.revision_ante_proyecto as R JOIN tigrupou_tcu.estado as E ON R.estado LIKE E.codigo WHERE ante_proyecto LIKE $id AND version like ( SELECT max(version) FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id and rol like 2) and rol like 2";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();
  foreach ($result as $row) {
    $Observaciones =$row["Observaciones"];
    $estado=$row["estado"];
    $version = $row["version"];
    $fecha = $row["fecha"];
  }

?>
<div class="modal-header" align="center">
  <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
    <span class="glyphicon glyphicon-remove black" aria-hidden="true"></span>
  </button>
  <h2><i class="fa fa-search-plus" aria-hidden="true"></i>Calificación Unidad de Extensión</h2>
</div>

<div class="modal.body body">

<?php
    $maxDCQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 1";
    $maxEEQ = "SELECT MAX(version) as max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 2";
    $estadoDCQ = "SELECT estado FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 1 AND version LIKE MAXVERSION;";
    $estadoEEQ = "SELECT estado FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $id AND rol LIKE 2 AND version LIKE MAXVERSION;";

    $stmt = $db->prepare($maxDCQ);
    $stmt -> execute();
    $resultMaxDC = $stmt -> fetchAll();
    $maxDC = 0;
    foreach ($resultMaxDC as $row) {
        if($row["max"] != ""){
          $maxDC = $row["max"]; // Max del director de carrera
        }
      
    }

    $stmt = $db->prepare($maxEEQ);
    $stmt -> execute();
    $resultMaxEE = $stmt -> fetchAll();
    $maxEE = 0;
    foreach ($resultMaxEE as $row) {
      if($row["max"] != ""){
          $maxEE = $row["max"]; // Maximo de la Unidad de extensión
        }
      
    }

    $estadoDCQ = str_replace("MAXVERSION", $maxDC, $estadoDCQ);
    $stmt = $db->prepare($estadoDCQ);
    $stmt -> execute();
    $resultEstadoDC = $stmt -> fetchAll();
    $estadoResult = 0;
    foreach ($resultEstadoDC as $row) {
      $estadoResult = $row["estado"]; // Maximo de la Unidad de extensión
    }

    $estadoEEQ = str_replace("MAXVERSION", $maxEE, $estadoEEQ);
    $stmt = $db->prepare($estadoEEQ);
    $stmt -> execute();
    $resultEstadoEE = $stmt -> fetchAll();
    $estadoResultEE = 0;
    foreach ($resultEstadoEE as $row) {
      $estadoResultEE = $row["estado"]; // Maximo de la Unidad de extensión
    }

    if((($maxEE - $maxDC) == 1 and $estadoResultEE != 6) or (($maxEE - $maxDC) == 0 and $estadoResult == 6 and $estadoResultEE != 6)){  ?>
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Version</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $version?></th>
      <th scope="row"><?php echo $fecha ?></th>
      <td>Verificado</td>
    </tr>
   
  </tbody>
</table>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Observaciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $Observaciones ?></td>
    </tr>
   
  </tbody>
</table>
    <?php }else{ ?>
      <br>
          <center><p class="label label-danger"> No se ha registrado Calificación por parte de la Unidad de Extensión</p> <center>
    <?php }

    ?>
<br>

</div>

<div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
</div>


