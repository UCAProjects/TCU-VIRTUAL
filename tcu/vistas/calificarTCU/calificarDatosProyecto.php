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
  $query = "";
  $rol = $_SESSION["rolFuncionario"];
  switch ($tipo){ //  ANTE PROYECTO
    case 1:
      switch ($rol) {
        case 1:
          $url = "detalleAnteProyecto.php?id=";
          $title = "Calificar Ante Proyecto";
          $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like strCarrera and A.estado like 1";
          break;
        case 2:
          $url = "detalleAnteProyecto.php?id=";
          $title = "Calificar Ante Proyecto";
          $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like strCarrera and A.estado_be like 1";
          break;

        default:
          break;
      }

      break;
    case 2:    // RESUMEN EJECUTIVO
    switch ($rol) {
      case 1:
        $title = "Calificar Resumen Ejecutivo";
        $url = "detalleResumenEjecutivo.php?id=";
        $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where G.carrera  like strCarrera and A.estado like 1";
        break;
      case 2:
        $title = "Calificar Resumen Ejecutivo";
        $url = "detalleResumenEjecutivo.php?id=";
        $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where G.carrera  like strCarrera and A.estado_be like 1";
      break;

      default:
        break;
    }

    default:
      // code...
    break;
  }
  $carrera = $_SESSION["carreraFuncionario"];
  $querySelect = str_replace("strCarrera", $carrera, $query);
  $stmt = $db->prepare($querySelect);
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
                  <h3><span style="color:#fe4918">Proyecto:</span> <?php echo $row["descripcion"] ?></h3>
                  <div>
                    <a class="btn btn-success" href="<?php echo $url . $row['codigo'] ?>">Validar</a>
                  </div><br>
                </div>
                <?php
              }
              if($cont == 0 ){ ?>
                <center>
                  <span class="label label-info"> No hay Ante Proyectos a Validar </span> </center>
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
