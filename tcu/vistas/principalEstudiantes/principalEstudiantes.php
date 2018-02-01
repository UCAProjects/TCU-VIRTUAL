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
                  <h2>Estatus del TCU</h2>
                  <div  class="ingreso ingresoTamano">
                    
                      <form class="formulario">
                        <li>
                           <span class="h3" style="color:#fe4918">Estatus:</span> <span class="h2">Revisado</span>
                        </li>
                        <hr>
                        <h3>Historial</h3>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Fecha</th>
                              <th>Estatus</th>
                              <th>Comentarios</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>01/02/2018</td>
                              <td>Revisado</td>
                              <td>Mejorar referencias</td>
                            </tr>
                            <tr>
                              <td>01/02/2018</td>
                              <td>Aprobado</td>
                              <td>Sin correcciones</td>
                            </tr>
                            <tr>
                              <td>01/02/2018</td>
                              <td>En edición</td>
                              <td>En proceso</td>
                            </tr>
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
