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
                  <h2>Calificar Datos Proyecto</h2>
                  <div  class="ingreso ingresoTamano">
                      <form class="formulario">
                        <div class="well">
                          <h3><span style="color:#fe4918">Grupo 1 :</span> Recolección de basura </h3>
                          <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Cod</th>
                              <th>ced</th>
                              <th>Nombre</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                          </tbody>
                        </table>
                          
                          <div>
                            <button class="btn btn-success">Editar</button>
                          </div><br>
                        </div>
                        <div class="well">
                          <h3><span style="color:#fe4918">Grupo 1 :</span> Mejoramiento de zonas verdes </h3>
                          <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Cod</th>
                              <th>ced</th>
                              <th>Nombre</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                          </tbody>
                        </table>
                          
                          <div>
                            <button class="btn btn-success">Editar</button>
                          </div><br>
                        </div>
                        <div class="well">
                          <h3><span style="color:#fe4918">Grupo 1 :</span> Reactivación de zona urbana</h3>
                          <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Cod</th>
                              <th>ced</th>
                              <th>Nombre</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                            <tr>
                              <td>12</td>
                              <td>2144234234</td>
                              <td>Albin Mora Valverde</td>
                            </tr>
                          </tbody>
                        </table>
                          
                          <div>
                            <button class="btn btn-success">Editar</button>
                          </div><br>
                        </div>
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
