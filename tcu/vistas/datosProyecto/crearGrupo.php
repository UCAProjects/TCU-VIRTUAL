<!doctype html>
<html class="no-js" lang="">
    <head>
      <link rel="stylesheet" href="../../css/datosProyecto.css">
        <title>
          Crear Grupo
        </title>
    </head>
    <body>
      <?php 
        include '../../header.php';
        include '../../coneccionAlbin.php';
      ?>
      
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Conformar Grupo</h2>
                  <div class="formulario" novalidate>
                    <div class="row">
                      <div class="col-md-1">
                        <a href="#" onclick="cargarModal(null,'#buscarEstudianteModalDiv','#buscarEstudiante-modal','modalBuscarEstudiante.php')" class="buttonA"><i class="fa fa-search" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="cedula" id="cedula" placeholder="Cédula" autocomplete="on" required>
                      </div>
                      <div class="col-md-2">
                        <button onclick="consultaCed()"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                      </div>
                    </div>
                  </div>
                </div><!--.programa-evento-->
                <hr>
                <br>
                <div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyAgregarEstudiantes">
                      <tr>
                        <th scope="row">1</th>
                        <td>11163452</td>
                        <td>Marck</td>
                        <td>Castro</td>
                        <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>11163452</td>
                        <td>Marck</td>
                        <td>Castro</td>
                        <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>11163452</td>
                        <td>Marck</td>
                        <td>Castro</td>
                        <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 col-md-offset-8">
                      <button class="btn btn-block btn-success buttonForm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Confirmar</button>
                    </div>
                  </div>                  
                  <br><br>
                </div>
              </div><!--.contenedor-->
         
          </section><!--.section programa-->
        </main>
        <!-- Moda para Buscar Nombres de estudiantes-->
          <div class="modal fade" id="buscarEstudiante-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="modal_content">

                <div id="buscarEstudianteModalDiv"> <!--Div donde se carga el form para ingresar los datos -->
                </div>
              </div>
            </div>
          </div>
          <script src="../../js/datosProyecto.js"></script>
        <?php 
          include '../../footer.php'
        ?>
        <script type="text/javascript">
        function consultaCed(){
            var ced = $('#cedula').val();
            if(ced != ''){
              <?php 
                                            $query = "SELECT * FROM tigrupou_tcu.sedes;";
                                            $stmt = $db->prepare($query);
                                            $stmt -> execute();
                                            $result = $stmt -> fetchAll();
                                            foreach ($result as $row) {?>
                                              var data = {codigo :<?php echo  $row['codigo'] ?>,cedula: <?php echo  $row['codigo'] ?>,nombre: <?php echo  $row['codigo'] ?>,apellidos:<?php echo  $row['codigo'] ?>};
                                              agregarInfoTabla(data);<?php
                                            }
                                      
              ?>
            }else{
              alert("Cédula vacía");
            }
        }
      </script>
    </body>
</html>