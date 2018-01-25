<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Registro Funcionarios
        </title>
        <link rel="stylesheet" href="../../css/datosProyecto.css">
    </head>
    <body>
    	<?php 
    		include '../../header.php';
        
    	?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Registro</h2>
                <div class="ingreso ingresoTamano">
                  <form class="formulario" onsubmit="return validarRegistroFuncionarios()" action="../../accesoDatos/registro/insertarEditarRegistroFuncionarios.php" method="POST">
                    <ul>
                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="apellido1">Primer Apellido</label></li>
                      			<li><input type="text" name="apellido1" id="apellido1" placeholder="Digite su primer apellido" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="apellido2">Segundo Apellido</label></li>
                      			<li><input type="text" name="apellido2" id="apellido2" placeholder="Digite su segundo apellido" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="nombre">Nombre</label></li>
                      			<li><input type="text" name="nombre" id="nombre" placeholder="Digite su nombre" autocomplete="on" required></li>
                    		</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="cedula">Cédula</label></li>
                      			<li><input type="text" name="cedula" id="cedula" placeholder="Digite su cédula" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="correo">Correo</label></li>
                      			<li><input type="email" name="correo" id="correo" placeholder="Digite su correo" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="telefono">Teléfono</label></li>
                       			<li><input type="text" name="telefono" id="telefono" placeholder="Digite su teléfono" autocomplete="on" required></li>
                    		</div>
                    	</div>
                      <div class="row">
                        <div class="col-md-4">
                          <li><label for="usuario">Usuario</label></li>
                            <li><input type="text" name="usuario" id="usuario" placeholder="Digite su usuario" autocomplete="on" required></li>
                        </div>
                        <div class="col-md-4">
                          <li><label for="contrasena">Contraseña</label></li>
                            <li><input type="password" name="contrasena" id="contrasena" placeholder="Digite su contraseña" autocomplete="on" required></li>
                        </div>
                        <div class="col-md-4">
                           <li><label for="contrasena2">Confirmar contraseña</label></li>
                            <li><input type="password" name="contrasena2" id="contrasena2" placeholder="Vuelva a digitar su contraseña" autocomplete="on" required></li>
                        </div>
                      </div>        

                      <li><button type="submit" id="btnRegistro" name="btnRegistro">Registro</button><br><br><br></li>
                    </ul>
                  </form>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->
         
          </section><!--.section programa-->
        </main>
        <script src="../../js/registro.js"></script>
        <?php 
        	include '../../footer.php'
        ?>
    </body>
</html>
