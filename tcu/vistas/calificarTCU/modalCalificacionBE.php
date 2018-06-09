<?php
  session_start();
  include '../../conection.php'; //Conección a la DB

  $id = $_POST["id"];
  $query =  "SELECT R.Observaciones, E.descripcion FROM tigrupou_tcu.revision_ante_proyecto_be as R JOIN tigrupou_tcu.estado as E ON R.estado LIKE E.codigo WHERE ante_proyecto LIKE $id AND version like ( SELECT max(version) FROM tigrupou_tcu.revision_ante_proyecto_be WHERE ante_proyecto LIKE $id)";
  $stmt = $db->prepare($query);
  $stmt -> execute();
  $result = $stmt -> fetchAll();
  foreach ($result as $row) {
    $Observaciones =$row["Observaciones"];
    $descripcion=$row["descripcion"];
  }

?>

<div class="">
  <h2>Calificación Bienestar Estudiantil</h2>

    <hr>
    <br>
    <center><b><h4>
      <?php echo $descripcion ?>
    </h4></b></center>

    <br>
    <h4>
      <?php echo $Observaciones ?>
    </h4>
</div>

<div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
</div>
