<?php
  session_start();
  include '../../conection.php'; //Conección a la DB

  $id = $_POST["id"];
  $query =  "SELECT R.Observaciones, E.descripcion as estado, R.version, DATE_FORMAT(R.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha FROM tigrupou_tcu.revision_ante_proyecto_be as R JOIN tigrupou_tcu.estado as E ON R.estado LIKE E.codigo WHERE ante_proyecto LIKE $id AND version like ( SELECT max(version) FROM tigrupou_tcu.revision_ante_proyecto_be WHERE ante_proyecto LIKE $id)";
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
  <h2><i class="fa fa-search-plus" aria-hidden="true"></i>Calificación Bienestar Estudiantil</h2>
</div>

<br>
<div class="modal.body body">
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
      <td><?php echo $estado ?></td>
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
 
</div>
<br>
<br>
<div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
</div>


