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
    if(!isset($_SESSION["codigoFuncionario"])) //si la variable de sesion codigo no existe, entonces redireccionamos a la pagina de principal de invitados
    {
        header("Location: ../../index.php");
    }
    
    include '../../header.php';
    include '../../subHeaderFuncionarios.php';
    include '../../conection.php'; //Conección a la DB

    $rol = $_SESSION["rolFuncionario"];

      if($rol == 1){ // Director de Carrera
        $queryA = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where $strQuery and A.estado like 1 ";
        $queryR = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where $strQuery and A.estado like 1 ";
      }elseif ($rol == 2) { // Bienestar Estudiantil
        $queryA = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where  A.estado_be like 1 ";
        $queryR = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where A.estado_be like 1 ";
	  }

      $stmt = $db->prepare($queryA);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $numeroAnteProyecto = 0;
      foreach($result as $row){
          $numeroAnteProyecto = $row["total"];
      }

      $stmt = $db->prepare($queryR);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $numeroResumenEjecutivo = 0;
      foreach($result as $row){
          $numeroResumenEjecutivo = $row["total"];
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
                  <h2>Notificaciones</h2>
                  <div  class="ingreso ingresoTamano">
                      <form class="formulario" style="margin">
                        <?php
                          if($numeroAnteProyecto != 0){?>
                            <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i></i> Tienes <b class="orange"><?php echo $numeroAnteProyecto ?></b> Ante Proyectos pendientes de revisión, visita la pestaña de Calificar TCU.</li><br>
                          <?php
                          }else{ ?>
                            <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i> No hay Resumen Ejecutivos Pendientes</li><br> 

                          <?php }  
                        ?>
                        <?php
                          if($numeroResumenEjecutivo != 0){?>
                              <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i> Tienes <?php echo $numeroAnteProyecto ?> Informes Finales pendientes de revisión, visitá la pestaña de Calificar TCU.</li><br> -->
                          <?php
                          }else{ ?>
                            <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i> No hay Informes Finales pendientes</li><br>

                          <?php } 
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
