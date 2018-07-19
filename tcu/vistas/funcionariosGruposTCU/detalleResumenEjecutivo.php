<div class="modal-header">
        <h2 class="modal-title">Resumen Ejecutivo</h2>
        
      </div>
<?php
    session_start();
    include '../../conection.php'; //Conección a la DB

    $id = $_POST["grupo"];
    $carrera = $_SESSION["carreraFuncionario"]; // Carrera a la que partenece el funcionario
    $query = "SELECT D.tema,D.organizacion, D.supervisor, A.* FROM tigrupou_tcu.datos D JOIN tigrupou_tcu.resumen_ejecutivo A ON D.grupo like A.grupo WHERE D.grupo like $id";
    $queryEstudiantes = "SELECT CONCAT(primer_apellido,' ',segundo_apellido,' ',nombre_completo) nombre FROM tigrupou_tcu.estudiantes WHERE grupo LIKE $id order by primer_apellido";
    $stmt = $db->prepare($queryEstudiantes);
    $stmt -> execute();
    $resultEstudiantes = $stmt -> fetchAll();
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();

    $tema="";
    $organizacion= "";
    $supervisor= "";
    $resumen_actividades= "";
    $evaluacion = "";
    $conclusion = "";
    $recomendaciones = "";
    foreach ($result as $row) {
      // Portada
      $tema=$row["tema"];
      $organizacion=$row["organizacion"];
      $supervisor=$row["supervisor"];
      //Contenido
      $resumen_actividades=$row["resumen_actividades"];
      $evaluacion = $row["evaluacion"];
      $conclusion = $row["conclusion"];
      $recomendaciones = $row["recomendaciones"];
    }

    $vacio = false;
    if($tema =="" and $organizacion =="" and $supervisor == "" and $resumen_actividades ==""){
        $vacio = true;
    }


    $linkConclusion = "";
    $linkBitacora = "";
    $queryAdjutos = "SELECT url_carta_conclusion, url_bitacora FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $id";
    $stmt = $db->prepare($queryAdjutos);
    $stmt -> execute();
    $resultAdjuntos = $stmt -> fetchAll();
    foreach ($resultAdjuntos as $row) {
      $linkConclusion = $row["url_carta_conclusion"];
      $linkBitacora = $row["url_bitacora"];
    }

  ?>
  <style>
    h4{
        font-weight: bold;
    }
  </style>
    <div class="modal-body">

    <?php
        if($vacio == false){ ?>
            <div class="well">
                    
                    <div id="divDocument"  style="background-color: white;">
                      <div style="padding: 40px;">
                        <center>
                          <img src="../../img/uca.png" alt="Smiley face">  <br><br><br><br>
                          <h4>Tema</h4>
                          <?php echo $tema ?>
                          <br>
                          <h4>Intergrantes</h4>
                          <?php
                          foreach ($resultEstudiantes as $row) {
                            echo $row["nombre"]
                            ?> <br>
                            <?php
                          }
                          ?>
                          <br>
                          <h4>Organización</h4>
                          <?php echo $organizacion ?> <br>
                          <h4>Supervisor</h4>
                          <?php echo $supervisor ?> <br><br><br><br><br><br><br><br>

                          -------- Fin de Página --------
                          <br><br>
                          <br><br><br><br>
                        </center>
                        <h4>Resumen de las actividades realizadas durante el TCU</h4>
                        <?php
                        for($i=0;$i<strlen($resumen_actividades);$i++){
                          if( $resumen_actividades[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $resumen_actividades[$i];
                          }
                        } ?>
                        <h4>Evaluación</h4>
                        <?php
                        for($i=0;$i<strlen($evaluacion);$i++){
                          if( $evaluacion[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $evaluacion[$i];
                          }
                        } ?>
                        <h4>Conclusión</h4>
                        <?php
                        for($i=0;$i<strlen($conclusion);$i++){
                          if( $conclusion[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $conclusion[$i];
                          }
                        } ?>
                        <h4>Recomendaciones</h4>
                        <?php
                        for($i=0;$i<strlen($recomendaciones);$i++){
                          if( $recomendaciones[$i] == "\n"){?>
                            <br>
                            <?php
                          }else{
                            echo $recomendaciones[$i];
                          }
                        }
                        ?>
                        <br><br><br><br><br>
                        <center>-------- Fin Documento -------</center>
                      </div>
                    </div> <!--   END DIV DOCUMENT -->
                    </fieldset>
                  </div>
                </div>
            </div>

        <?php 
            }else{ ?>
                <center><label class="label label-danger"> No hay Resumen Ejecutivo registrado.</label></center>
                <br>
        <?php }?>
    
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
