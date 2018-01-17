<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Registro
        </title>
    </head>
    <body>
    	<?php 
    		include 'header.php'
    	?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <main class="site-main">
          <section class="seccion-informacion">
            <h2>Información</h2>

          </section>

          <section class="seccion-ingreso">
            <div class="contenedor-video">
              <video autoplay loop poster="../../bg-talleres.jpg">
                <source src="../../video/video.mp4" type="video/mp4">
                <source src="../../video/video.webm" type="video/webm">
                <source src="../../video/video.ogv" type="video/ogg">
              </video>
            </div>
            <div class="contenido-programa">
              <div class="contenedor clearfix">
                <div class="ingreso">
                  <h2>Ingreso al sistema</h2>
                  <form class="formulario" novalidate>
                    <ul>
                      <li><label for="usuario">Usuario:</label></li>
                      <li><input type="text" name="usuario" id="usuario" placeholder="Digite su usuario" autocomplete="on" required></li>
                      <li><label for="password">Contraseña:</label></li>
                      <li><input type="text" name="password" id="password" placeholder="Digite su contraseña" autocomplete="on" required></li>
                      <li><button type="submit">Registro</button>
                      <button type="submit">Ingreso</button></li>
                    </ul>
                  </form>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->
            </div><!--.contenido-programa-->
          </section><!--.section programa-->
        </main>

        <?php 
        	include 'footer.php'
        ?>
    </body>
</html>
