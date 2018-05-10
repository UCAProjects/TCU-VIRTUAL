<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   TCU
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">
</head>
<body>
 <?php
    session_start();
    include '../../header.php';
    include '../../subHeaderFuncionarios.php';
    include '../../conection.php'; //Conección a la DB
 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->


          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Gestionar Grupos TCU</h2>
                  <div  class="ingreso ingresoTamano">
                      <div class="formulario">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Periodo Actual</a></li>
                            <li><a href="#">Periodo Anterior</a></li>
                        </ul>

                        <br><br>

                      <!--
                        Boton buscar
                        Falta programabilidad
                        Evento onChance realiza consulta y setea los datos.
                        Por Ajax, emigrar pantalla de visualizacion a pantalla externa
                       -->
                      <div class="form-inline">
                             <input type="text" style="width:50% !important" id="textBucar" class="form-control" placeholder="Buscar">
                      </div>
                      <br>
                      <hr>
                        <?php
                          $query = "select distinct G.codigo, G.descripcion from tigrupou_tcu.grupos G join tigrupou_tcu.estudiantes E on G.codigo = E.grupo";

                          $stmt = $db->prepare($query);//Consulta los grupos a DB
                          $stmt -> execute();
                          $result = $stmt -> fetchAll();
                          foreach ($result as $row) {
                              ?>
                                    <div class="well">
                                        <h3><span class="orange">Grupo <?php echo $row["codigo"] ?> :</span> <?php echo $row["descripcion"] ?></h3>

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
                                              foreach ($resultUser as $user) {
                                                ?>

                                                    <tr>
                                                      <td><?php echo $user["codigo"] ?></td>
                                                      <td><?php echo $user["cedula"] ?></td>
                                                      <td><?php echo $user["nombre"] ?></td>
                                                    </tr>
                                                <?php

                                              }
                                            ?>
                                        </tbody>
                                      </table>

                                      <div>
                                        <button class="btn btn-success" onclick="editarGrupo(<?php echo $codigo ?>)"><i class="far fa-edit"></i> Editar</button>
                                      </div>

                                      <div>
                                        <button class="btn btn-warning" onclick="editarGrupo(<?php echo $codigo ?>)"><i class="far fa-calendar-check"></i> Detalle de Horas </button>
                                      </div>

                                        <br>
                                    </div>
                            <?php
                          }
                        ?>
                      </div>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>
          <script src="../../js/principalEstudiantes.js"></script>
          <?php
          include '../../footer.php';
          ?>
          <script src="../../js/datosProyecto.js"></script>
        </body>
        </html>
