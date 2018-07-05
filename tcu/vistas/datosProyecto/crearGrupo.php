<?php
  session_start();

  $tipo = $_GET['tipo'];
  $sesionId = $_SESSION["codigo"];
  $grupo = 0;
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
      <link rel="stylesheet" href="../../css/datosProyecto.css">
        <title>
          Crear Grupo
        </title>

    </head>
    <body>

      <?php
        include '../../conection.php';
        include '../../header.php';
        if($tipo == 1){
          include '../../subHeaderEstudiantes.php';
        }

      ?>


        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Conformar Grupo</h2>
                  <div class="formulario" novalidate>
                    <div class="row">
                      <div class="col-md-1">
                        <a href="#" onclick="cargarModal(null,'buscarEstudianteModalDiv','buscarEstudiante-modal','modalBuscarEstudiante.php')" class="buttonA"><i class="fa fa-search" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="cedula" id="cedula" placeholder="Cédula" required>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-primary" style:"margin-top: 5px !important" onclick="consultaCed()"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                      </div>
                    </div>
                  </div>
                </div><!--.programa-evento-->
                <hr>
                <br>
                <div class="ingreso ingresoTamano">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyAgregarEstudiantes">
                      <?php
                      if($tipo == 1){// Tipo 1 quiere decir que la petición la realizó un estudiante para editar
                          $query = "select grupo from tigrupou_tcu.estudiantes where codigo like $sesionId";
                          $stmt = $db->prepare($query);
                          $stmt -> execute();
                          $result = $stmt -> fetchAll();
                          foreach($result as $row){
                            $grupo = $row["grupo"];
                          }

                          $query = "select codigo,nombre_completo,primer_apellido, cedula from tigrupou_tcu.estudiantes where grupo like $grupo";
                          $stmt = $db->prepare($query);
                          $stmt -> execute();
                          $resultEstudiantes = $stmt -> fetchAll();

                                  foreach ($resultEstudiantes as $row ){
                                  ?>
                                  <tr>
                                    <th scope="row"><?php echo $row["codigo"] ?></th>
                                    <td><?php echo $row["cedula"] ?></td>
                                    <td><?php echo $row["nombre_completo"] ?></td>
                                    <td><?php echo $row["primer_apellido"] ?></td>
                                    <td>
                                      <?php if($sesionId == $row["codigo"]){ ?>
                                        <a onclick="abandonarGrupo(<?php echo $sesionId ?>)"><i title="ABANDONAR GRUPO" class="fa fa-user-times" aria-hidden="true"></i></a> <?php
                                      }else{ ?>
                                      <i class="fa fa-lock"></i><?php

                                      } ?>

                                    </td>
                                  </tr><?php
                                }
                              }
      ?>
                      <!-- Información de estudiantes -->
                    </tbody>
                  </table>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 col-md-offset-8">
                      <button onclick="agregarGrupo(<?php echo $grupo ?>)" class="btn btn-block btn buttonForm"><i class="far fa-save"></i> Confirmar</button>
                    </div>
                  </div>
                  <br><br>
                </div>
              </div><!--.contenedor-->

          </section><!--.section programa-->
        </main>
        <!-- Moda para Buscar Nombres de estudiantes-->
          <div class="modal fade" id="buscarEstudiante-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="modal_content">

                <div id="buscarEstudianteModalDiv"> <!--Div donde se carga el form para ingresar los datos -->
                </div>
              </div>
            </div>
          </div>

        <?php
          include '../../footer.php'
        ?>
         <script src="../../js/datosProyecto.js"></script>
         <?php
            if($tipo != 1){
              $queryAuto = "SELECT cedula FROM tigrupou_tcu.estudiantes WHERE codigo LIKE $sesionId";
              $stmt = $db->prepare($queryAuto);//Actualiza la DB
              $stmt -> execute();
              $resultAuto = $stmt -> fetchAll();
              foreach ($resultAuto as $row) {
                $autoCed = $row["cedula"];
              } 
              ?>
              <script>
                consultaCed('<?php echo $autoCed ?>');
              </script>
              <?php
            }
         ?>
    </body>
</html>
