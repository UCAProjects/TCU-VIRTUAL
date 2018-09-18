<?php
    session_start();
    include '../../conection.php'; //Conección a la DB
    $id = $_POST["id"];

    $QueryHistorial = "SELECT AP.version, AP.fecha_revision, AP.Observaciones AS observaciones,E.descripcion FROM tigrupou_tcu.revision_ante_proyecto AP JOIN tigrupou_tcu.estado E ON AP.estado LIKE E.codigo WHERE ante_proyecto LIKE $id AND ROL LIKE 1 AND estado NOT LIKE 6;";
    $stmt = $db->prepare($QueryHistorial);
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    
?>
<div class="modal-header" align="center">
  <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
    <span class="glyphicon glyphicon-remove black" aria-hidden="true"></span>
  </button>
  <h2><i class="fa fa-search-plus" aria-hidden="true"></i>Historial de Calificación de Ante Proyecto</h2>
</div>

<div class="modal.body body">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Version</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estatus</th>
        <th scope="col">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $cont = 0;
            foreach ($result as $row) {
                $cont ++;
                $Observaciones =$row["observaciones"];
                $estado=$row["descripcion"];
                $version = $row["version"];
                $fecha = $row["fecha_revision"]; ?>
                <tr>
                    <th scope="row"><?php echo $version?></th>
                    <th scope="row"><?php echo $fecha ?></th>
                    <th scope="row"><?php echo $estado ?></th>
                    <th scope="row"><?php echo $Observaciones ?></th>
                </tr><?php
            }
        ?>    
        
    </tbody>
    </table>

    
    <br>
    
    <?php 
    if($cont == 0){ ?>
        <center><p class="label label-danger"> Aún no se ha calificado este Ante Proyecto</p> </center>
    <?php } ?>
        
    <br>

</div>

<div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
</div>