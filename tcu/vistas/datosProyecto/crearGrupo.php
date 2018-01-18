<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Crar Grupo
        </title>
    </head>
    <body>
    	<?php 
    		include '../../header.php'
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
                  <form class="formulario" novalidate>
                    <div class="row">
                      <div class="col-md-1">
                        <img src="../../img/lupa.png" style="width: 50px">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="telefono" id="telefono" placeholder="Cédula" autocomplete="on" required>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                      </div>
                    </div>
                  </form>
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
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><img src="../../img/delete.png" style="width: 30px"></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><img src="../../img/delete.png" style="width: 30px"></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td><img src="../../img/delete.png" style="width: 30px"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div><!--.contenedor-->
         
          </section><!--.section programa-->
        </main>

        <?php 
        	include '../../footer.php'
        ?>
    </body>
</html>
