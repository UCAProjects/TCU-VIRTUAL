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
                            <li class="active"><a href="#">TCU Activos</a></li>
                            <li><a href="#">TCU Inactivos</a></li>
                        </ul>

                        <br><br>

                        <!--
                        Boton buscar
                        Falta programabilidad
                        Evento onChance realiza consulta y setea los datos.
                        Por Ajax, emigrar pantalla de visualizacion a pantalla externa
                       -->
                      <div class="form-inline">
                             <input type="text" style="width:50% !important" id="textBuscar" class="form-control" placeholder="Buscar">
                      </div>
                      <br>
                      <hr>

                      <div id="loadGroups"></div>
                      
                    </div>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>
          <?php
          include '../../footer.php';
          ?>
          <script src="../../js/funcionariosGrupos.js"></script>
        </body>
        </html>
