<?php 
  $tipo = $_GET['tipo'];
?>

<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   Editar Grupo
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">
</head>
<body>
  <?php
    include '../../header.php';
    include '../../subHeaderEstudiantes.php';
  ?>
<main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Datos del Proyecto</h2>
                  <div  class="ingreso ingresoTamano">

                    <div class="formulario">
                      <ul>
                        <li>
                          <label for="temaProyecto">Integrantes</label></li>


 <?php 
    include '../../conection.php'; //Conección a la DB

    if($tipo == 1){// Tipo 1 quiere decir que la petición la realizó un estudiante
      $query = "select grupo from tigrupou_tcu.estudiantes where codigo like 9";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $grupo = 0;
      foreach($result as $row){
        $grupo = $row["grupo"];
      }

      $query = "select codigo,nombre_completo,primer_apellido, cedula from tigrupou_tcu.estudiantes where grupo like $grupo";
      $stmt = $db->prepare($query);
      $stmt -> execute();
      $resultEstudiantes = $stmt -> fetchAll();
    
      
    
 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->

          
          
                          <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Cod</th>
                                  <th>Nombre</th>
                                  <th>Apellidos</th>
                                  <th>Cédula</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($resultEstudiantes as $row ){
                                  ?>
                                  <tr>
                                    <th scope="row"><?php echo $row["codigo"] ?></th>
                                    <td><?php echo $row["nombre_completo"] ?></td>
                                    <td><?php echo $row["primer_apellido"] ?></td>
                                    <td><?php echo $row["cedula"] ?></td>
                                  </tr><?php 
                                }
                              ?>
                              </tbody>
                          </table>
                          <hr><br>
                        </li>
                        <li><button id="btnConfirmar" name="btnConfirmar">Abandonar Grupo</button><br><br><br></li>
                      </ul>
                      <?php } ?>
                    </div>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>

          <?php 
          include '../../footer.php';
          ?>

        </body>
        </html>