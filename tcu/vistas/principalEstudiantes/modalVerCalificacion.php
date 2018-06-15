<?php

    include '../../conection.php'; //Conección a la DB

    $id = $_POST["id"];
    $version = $_POST["version"];
    $tipo = $_POST["tipo"];

    if($tipo == 1){
      $queryDetalle ="SELECT DATE_FORMAT(RA.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha, E.descripcion as estado,  RA.Observaciones, G.descripcion as nombre FROM tigrupou_tcu.grupos AS G JOIN tigrupou_tcu.revision_ante_proyecto AS RA ON G.codigo LIKE RA.ante_proyecto JOIN tigrupou_tcu.estado AS E ON E.codigo LIKE RA.estado WHERE G.codigo LIKE $id and RA.version like $version;";
    }else{
      $queryDetalle ="SELECT DATE_FORMAT(RA.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha, E.descripcion as estado,  RA.Observaciones, G.descripcion as nombre FROM tigrupou_tcu.grupos AS G JOIN tigrupou_tcu.revision_resumen_ejecutivo AS RA ON G.codigo LIKE RA.resumen_ejecutivo JOIN tigrupou_tcu.estado AS E ON E.codigo LIKE RA.estado WHERE G.codigo LIKE $id and RA.version like $version;";
    }

    $stmt = $db->prepare($queryDetalle);
    $stmt -> execute();
    $resultDetalle = $stmt -> fetchAll();
    foreach($resultDetalle as $row){
      $fecha = $row["fecha"];
      $estado = $row["estado"];
      $observaciones = $row["Observaciones"];
      $nombre = $row["nombre"];
  }
?>
 <style>
    .body{
    }
    .title{
        font-weight: bold;
    }
 </style>

<div class="modal-header" align="center">
  <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
    <span class="glyphicon glyphicon-remove black" aria-hidden="true"></span>
  </button>
  <h2><i class="fa fa-search-plus" aria-hidden="true"></i>Calificación</h2>
</div>

<br>
<div class="modal.body body">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Version</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estatus</th>
      <th scope="col">Grupo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $version?></th>
      <th scope="row"><?php echo $fecha ?></th>
      <td><?php echo $estado ?></td>
      <td><?php echo $nombre ?></td>
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
      <td><?php echo $observaciones ?></td>
    </tr>
   
  </tbody>
</table>
 
</div>
<br>
<br>
