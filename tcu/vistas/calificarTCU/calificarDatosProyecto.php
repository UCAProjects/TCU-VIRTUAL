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

    $tipo = $_GET["class"];

    switch ($tipo) {
      case 1:
        $url = "detalleAnteProyecto.php?id";
        $title = "Calificar Ante Proyecto";
        break;
      case 2:
        $title = "Calificar Resumen Ejecutivo";
        $url = "detalleResumenEjecutivo.php?id";
        break;
      default:
        // code...
        break;
    }

    $carrera = $_SESSION["carreraFuncionario"];
    $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado like 1";

    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();



 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->


          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2><?php echo $title ?></h2>
                  <div  class="ingreso ingresoTamano">
                      <form class="formulario">
                        <?php
                          $cont = 0;
                          foreach($result as $row){
                            $cont ++;   ?>
                            <div class="well">
                              <h3><span style="color:#fe4918">Grupo <?php echo $row["codigo"] ?>:</span> <?php echo $row["descripcion"] ?></h3>
                                <div>
                                  <a class="btn btn-success" href="detalleAnteProyecto.php?id=<?php echo $row['codigo'] ?>">Calificar</a>
                                </div><br>
                              </div>
                          <?php
                          }
                          if($cont == 0 ){ ?>
                            <center>
                              <span class="label label-info"> No hay Ante Proyectos a Calificar </span> </center>
                        <?php
                          }
                        ?>
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
