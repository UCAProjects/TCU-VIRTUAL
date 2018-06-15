<?php
     session_start();
     include '../../conection.php'; //Conección a la DB

    $nombre = $_POST["Nombre"];
    $tipo = $_POST["Tipo"];
    $query = "SELECT distinct G.codigo, G.descripcion from tigrupou_tcu.grupos G join tigrupou_tcu.estudiantes E on G.codigo = E.grupo WHERE (G.descripcion like '%$nombre%' or E.nombre_completo like '%$nombre%' or E.primer_apellido  like '%$nombre%' or E.segundo_apellido like '%$nombre%') and G.estado like '$tipo';";
    $stmt = $db->prepare($query);//Consulta los grupos a DB
    $stmt -> execute();
    $result = $stmt -> fetchAll();

    foreach ($result as $row) { ?>
        <div class="well">
            <h3>
                <span class="orange">
                    Grupo <?php echo $row["codigo"] ?> :
                </span> 
                <?php echo $row["descripcion"] ?>
            </h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>ced</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $codigo = $row["codigo"];
                        $queryUser = "select codigo, cedula, CONCAT(nombre_completo,' ', primer_apellido,' ',segundo_apellido) as nombre from tigrupou_tcu.estudiantes where grupo like $codigo";
                        $stmt = $db->prepare($queryUser);//Consulta los grupos a DB
                        $stmt -> execute();
                        $resultUser = $stmt -> fetchAll();
                        foreach ($resultUser as $user) {?>
                            <tr>
                                <td><?php echo $user["codigo"] ?></td>
                                <td><?php echo $user["cedula"] ?></td>
                                <td><?php echo $user["nombre"] ?></td>
                            </tr> <?php
                        } ?>
                </tbody>
            </table>

            <div>
                <button class="btn btn-success" onclick="editarGrupo(<?php echo $codigo ?>)"><i class="far fa-edit"></i> Editar</button>
            </div>
            <div>
                <button class="btn btn-warning" onclick="editarGrupo(<?php echo $codigo ?>)"><i class="far fa-calendar-check"></i> Detalle de Horas </button>
            </div>

            <br>
        </div><?php
    }
?>