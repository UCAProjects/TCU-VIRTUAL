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
                  <h2>Notificaciones</h2>
                  <div  class="ingreso ingresoTamano">
                      <form class="formulario" style="margin">
                        <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i></i> Tienes Ante Proyectos pendientes de revisión, visitá la pestaña de Calificar TCU.</li><br>
                        <li style="margin-left: 15%;"><i  class="fas fa-circle orange"></i> Tienes Resumen Ejecutivos pendientes de revisión, visitá la pestaña de Calificar TCU.</li><br>
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
