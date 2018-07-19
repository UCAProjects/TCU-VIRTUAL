    <div class="modal-header">
        <h2 class="modal-title">Ante Proyecto</h2>
      </div>
<?php
    session_start();
    include '../../conection.php'; //Conección a la DB

    $id = $_POST["grupo"];

    $query = "SELECT D.tema,D.organizacion, D.supervisor, A.* FROM tigrupou_tcu.datos D JOIN tigrupou_tcu.ante_proyecto A ON D.grupo like A.grupo WHERE D.grupo like $id";
    $queryEstudiantes = "SELECT CONCAT(primer_apellido,' ',segundo_apellido,' ',nombre_completo) nombre FROM tigrupou_tcu.estudiantes WHERE grupo LIKE $id order by primer_apellido";
    $stmt = $db->prepare($queryEstudiantes);
    $stmt -> execute();
    $resultEstudiantes = $stmt -> fetchAll();
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    $tema="";
    $organizacion="";
    $supervisor="";
    $identificacion_problema="";
    $descripcion_problema="";
    $descripcion_beneficiario="";
    $justificacion_proyecto="";
    $objetivo_general="";
    $objetivos_especificos="";
    $estrategias_soluciones="";
    foreach ($result as $row) {
        $tema=$row["tema"];
        $organizacion=$row["organizacion"];
        $supervisor=$row["supervisor"];
        $identificacion_problema=$row["identificacion_problema"];
        $descripcion_problema=$row["descripcion_problema"];
        $descripcion_beneficiario=$row["descripcion_beneficiario"];
        $justificacion_proyecto=$row["justificacion_proyecto"];
        $objetivo_general=$row["objetivo_general"];
        $objetivos_especificos=$row["objetivos_especificos"];
        $estrategias_soluciones=$row["estrategias_soluciones"];
    }

    $vacio = false;
    if($tema == "" and $organizacion == "" and $supervisor == "" and $identificacion_problema == "" 
        and $descripcion_problema == "" and $descripcion_beneficiario == "" and $justificacion_proyecto == "" 
            and $objetivo_general == "" and $objetivos_especificos == "" and $estrategias_soluciones == ""){

        $vacio = true;
    }

    $linkAceptacion = "";
    $linkSolicitud = "";
    $linkCronograma = "";
    $queryAdjutos = "SELECT url_carta_aceptacion,url_carta_solicitud, url_cronograma_tcu FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $id";
    $stmt = $db->prepare($queryAdjutos);
    $stmt -> execute();
    $resultAdjuntos = $stmt -> fetchAll();

    foreach ($resultAdjuntos as $row) {
        $linkAceptacion = $row["url_carta_aceptacion"];
        $linkSolicitud = $row["url_carta_solicitud"];
        $linkCronograma = $row["url_cronograma_tcu"];
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
                                    <h4> Tema</h4>
                                    <?php echo $tema ?>
                                    <br>
                                    <h4>Integrantes</h4>
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
                                    <?php echo $supervisor ?> 
                                    
                                    <br><br><br><br><br><br><br><br>

                                    -------- Fin de Página --------
                                    <br><br><br><br>
                                </center>
                                <h4>Identificación del problema</h4>
                                <?php
                                for($i=0;$i<strlen($identificacion_problema);$i++){
                                    if( $identificacion_problema[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $identificacion_problema[$i];
                                    }
                                } ?>
                                <h4>Descripción del problema</h4>
                                <?php
                                for($i=0;$i<strlen($descripcion_problema);$i++){
                                    if( $descripcion_problema[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $descripcion_problema[$i];
                                    }
                                } ?>
                                <h4>Descripción del beneficiario</h4>
                                <?php
                                for($i=0;$i<strlen($descripcion_beneficiario);$i++){
                                    if( $descripcion_beneficiario[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $descripcion_beneficiario[$i];
                                    }
                                } ?>
                                <h4>Justificación del Proyecto</h4>
                                <?php
                                for($i=0;$i<strlen($justificacion_proyecto);$i++){
                                    if( $justificacion_proyecto[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $justificacion_proyecto[$i];
                                    }
                                }
                                ?>
                                <h4>Objetivo General</h4>
                                <?php
                                for($i=0;$i<strlen($objetivo_general);$i++){
                                    if( $objetivo_general[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $objetivo_general[$i];
                                    }
                                } ?>
                                <h4>Objetivos Específicos</h4>
                                <?php
                                for($i=0;$i<strlen($objetivos_especificos);$i++){
                                    if( $objetivos_especificos[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $objetivos_especificos[$i];
                                    }
                                } ?>
                                <h4>Estrategias y Soluciones</h4>
                                <?php
                                for($i=0;$i<strlen($estrategias_soluciones);$i++){
                                    if( $estrategias_soluciones[$i] == "\n"){?>
                                    <br>
                                    <?php
                                    }else{
                                        echo $estrategias_soluciones[$i];
                                    }
                                } ?>
                                <br><br><br><br><br>
                                <center>-------- Fin del documento -------</center>
                                </div>
                            </div> <!--   END DIV DOCUMENT -->
                        </div>
                    </div>
            <?php  
                }else{ ?>
                    <center><label class="label label-danger"> No hay Resumen Ejecutivo registrado.</label></center>
                    <br>
            <?php    
                }
            ?>
            
    <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
