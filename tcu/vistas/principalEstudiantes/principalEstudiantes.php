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
    $sesionId = $_SESSION["codigo"];
    $grupo = $_SESSION["grupo"];

    include '../../header.php';
    include '../../subHeaderEstudiantes.php';
    include '../../conection.php'; //Conección a la DB


    $queryHistorialAP = "SELECT  DATE_FORMAT(RA.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha, E.descripcion, RA.version FROM tigrupou_tcu.grupos AS G JOIN tigrupou_tcu.revision_ante_proyecto AS RA ON G.codigo LIKE RA.ante_proyecto JOIN tigrupou_tcu.estado AS E ON E.codigo LIKE RA.estado WHERE G.codigo LIKE $grupo";

    $queryHistorialRE = "SELECT  DATE_FORMAT(RA.fecha_revision,'%d-%m-%y / %h:%i:%s') AS fecha, E.descripcion, RA.version FROM tigrupou_tcu.grupos AS G JOIN tigrupou_tcu.revision_resumen_ejecutivo AS RA ON G.codigo LIKE RA.resumen_ejecutivo JOIN tigrupou_tcu.estado AS E ON E.codigo LIKE RA.estado WHERE G.codigo LIKE $grupo";

    $stmt = $db->prepare($queryHistorialAP);
    $stmt -> execute();
    $resultHistorialAP = $stmt -> fetchAll();

    $stmt = $db->prepare($queryHistorialRE);
    $stmt -> execute();
    $resultHistorialRE = $stmt -> fetchAll();
 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->


          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Estatus del TCU</h2>
                  <div  class="ingreso ingresoTamano">

                      <form class="formulario">
                        <!--<li>
                           <span class="h3 orange">Estatus:</span> <span class="h2">Revisado</span>
                        </li> -->
                        <hr>
                        <h3><span class="h3 orange">Revisión Ante Proyecto</span></h3>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th> Fecha     /     Hora</th>
                              <th>Estatus</th>
                              <th>Versión de Revisión</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              foreach($resultHistorialAP as $row){ ?>
                                  <tr>
                                    <td><?php echo $row["fecha"];?></td>
                                    <td><?php echo $row["descripcion"];?></td>
                                    <td><?php echo $row["version"];?></td>
                                  </tr> <?php
                              }
                            ?>
                          </tbody>
                        </table>

                        <hr>
                        <h3><span class="h3 orange">Revisión Resumen Ejecutivo</span></h3>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th> Fecha     /     Hora</th>
                              <th>Estatus</th>
                              <th>Versión de Revisión</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              foreach($resultHistorialRE as $row){ ?>
                                  <tr>
                                    <td><?php echo $row["fecha"];?></td>
                                    <td><?php echo $row["descripcion"];?></td>
                                    <td><?php echo $row["version"];?></td>
                                  </tr> <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </form>
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
