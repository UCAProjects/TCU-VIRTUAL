<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tcu Virtual</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="site-header">
          <div class="fondo-encabezado">

          </div><!-- .fondo-encabezado -->
        </header>

        <main class="site-main">
          <section class="seccion-informacion">
            <h2>Información</h2>
            <div class="contenedor">
              <ul class="lista-informacion clearfix">
                <li>
                  <div class="tabla-informacion">
                    <h3>Uso del sistema</h3>
                    <p class="info">En esta sección puede encontrar, los pasos necesarios para
                      el uso correcto del sistema y como debe llenar la información tanto de
                      registro.
                    </p>
                    <a href="vistas/informacion/uso_sistema.php" class="button hollow">VER MÁS</a>
                  </div><!--.tabla-precio-->
                </li>
                <li>
                  <div class="tabla-informacion">
                    <h3>Reglamento TCU</h3>
                    <p class="info">
                      En esta sección puede acceder al reglamento del Trabajo Comunal Universitario,
                      en formato PDF el cual puede descargar desde la página.
                    </p>
                    <a href="vistas/informacion/reglamento_tcu.php" class="button">VER MÁS</a>
                  </div><!--.tabla-precio-->
                </li>
                <li>
                  <div class="tabla-informacion">
                    <h3>Contacto</h3>
                    <p class="info">
                      Para cualquier duda o consulta sobre el Sistema de TCU,
                      puede ponerse en contacto con nosotros, accediendo al formulario de
                      contacto.
                    </p>
                    <a href="vistas/informacion/contacto.php" class="button hollow clearfix">VER MÁS</a>
                  </div><!--.tabla-precio-->
                </li>
              </ul><!--.lista-precio-->
            </div><!--.contenedor-->
          </section><!--.precios seccion-->

          <section class="seccion-ingreso">
            <div class="contenedor-video">
              <video autoplay loop poster="bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogg">
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

        <footer class="site-footer">
          <div class="contenedor clearfix">
              <div class="footer-informacion">
                <h3>Sobre <span>Tcu Virtual</span></h3>
                <p>Plataforma virtual para la gestión del desarrollo del trabajo comunal universitario de las y los estudiantes, de la Universidad
                   Florencio del Castillo.
                </p>
              </div><!--.footer-informacion-->
              <div class="menu">
                <nav class="redes-sociales">
                  <h3>Redes <span>sociales</span></h3>
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a>
                </nav>
              </div><!--.menu-->
          </div><!--.contenedor clearfix-->
          <p class="copyright">
            Todos los derechos reservados TCU VIRTUAL 2018
          </p>
        </footer>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
