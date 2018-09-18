<?php
    session_start();
    include '../../conection.php'; //Conección a la DB
    $nombre = $_POST["Nombre"];
    $tipo = $_POST["Tipo"];
    $query = "SELECT distinct G.codigo, G.descripcion, C.carrera from tigrupou_tcu.grupos G join tigrupou_tcu.estudiantes E on G.codigo = E.grupo JOIN tigrupou_tcu.carreras C ON G.carrera LIKE C.codigo WHERE (E.cedula like '%$nombre%' or G.descripcion like '%$nombre%' or E.nombre_completo like '%$nombre%' or E.primer_apellido  like '%$nombre%' or E.segundo_apellido like '%$nombre%'  or C.carrera like '%$nombre%') and G.estado like '$tipo';";
    $stmt = $db->prepare($query);//Consulta los grupos a DB
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    foreach ($result as $row) { ?>
        <div class="well">
            <h3>
                <span class="orange">
                    Proyecto:
                </span> 
                <?php echo $row["descripcion"] ?>
            </h3>
            <h4>
                <span class="orange">
                    Carrera:
                </span> 
                <?php echo $row["carrera"] ?>
            </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $codigo = $row["codigo"];
                        $queryUser = "SELECT E.codigo, E.cedula, CONCAT(E.nombre_completo,' ', E.primer_apellido,' ',E.segundo_apellido) as nombre, C.carrera  from tigrupou_tcu.estudiantes E JOIN tigrupou_tcu.carreras C ON E.carrera LIKE C.codigo WHERE grupo like $codigo";
                        $stmt = $db->prepare($queryUser);//Consulta los grupos a DB
                        $stmt -> execute();
                        $resultUser = $stmt -> fetchAll();
                        foreach ($resultUser as $user) {?>
                            <tr>
                                <td><?php echo $user["codigo"] ?></td>
                                <td><?php echo $user["cedula"] ?></td>
                                <td><?php echo $user["nombre"] ?></td>
                                <td><?php echo $user["carrera"] ?></td>
                            </tr> <?php
                        } ?>
                </tbody>
            </table>
            <p align="right">
                <a class="btn btn" href="../datosProyecto/datosProyecto.php?tipo=<?php echo $row["codigo"] ?>"> <i class="far fa-eye"></i> Ver</a>
                <a class="btn btn-primary" href="../horasTCU/calendarioHoras.php?grupo=<?php echo $row["codigo"] ?>"><i class="far fa-calendar-check"></i> Detalle de Horas </a>
            </p>
        </div><?php
    }
?>