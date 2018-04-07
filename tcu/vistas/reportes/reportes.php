
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
    TCU
  </title>


</head>
<body>
  <?php
  session_start();
  //$sesionId = $_SESSION["codigo"];
  //$grupo = $_SESSION["grupo"];

  include '../../header.php';
  include '../../subHeaderFuncionarios.php';
  include '../../conection.php'; //Conección a la DB
  ?>

  <link rel='stylesheet' href='../../css/stilos.css' />
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

  <main class="site-main">
    <section class="seccion-informacion">
      <div class="contenedor clearfix">
        <div class="">
          <br>
          <div class="well">
            <div class="row">
              <div class="col-md-10">
                <div id="contenidoReportes">
                  <?php //include( 'reporteTitulo.php' ); ?>  <!-- Se llama el reporte por fecha   -->
                </div>
                <div style="background-color: white; width: 100%; height: 100%">
                  <div class="row">
                    <div class="col-md-12 " id="consultasReportes">
                      <br><br><br><br><br><br><br><br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1">  <!--Menú vertical para acceder los diferentes reportes  -->
                <ul class="nav nav-tabs tabs-right vertical-text" style="height: 900px">
                  <li class="active" id="cargarCrearTipoLugar"><a  data-toggle="tab" onclick="crearVistas('reporteTitulo.php',null,'#contenidoReportes')" >Titulo</a></li>
                  <li id="cargarTiposActividades"><a  data-toggle="tab" onclick="crearVistas('reporteFecha.php',null,'#contenidoReportes')">Fecha</a></li>
                  <li id="cargarTiposActividades"><a  data-toggle="tab" onclick="crearVistas('reporteDepartamento.php',null,'#contenidoReportes')">Departamento</a></li>
                </ul>
              </div>
            </div>
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
