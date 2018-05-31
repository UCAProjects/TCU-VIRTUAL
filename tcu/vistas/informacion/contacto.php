<!doctype html>
  <!--.HEADER-->
  <?php include("../../header.php") ?>
        <main class="site-main">
          <section class="seccion-informacion">
            <h2>Conctactenos</h2>
            <div class="contenedor">
              <div class="ingreso">
                <form class="formulario clearfix" action="contacto_enviar.php" method="post">
                  <ul>
                    <li><label for="correo">Correo:</label></li>
                    <li><input type="email" name="correo" id="correo" placeholder="Digite su correo" autocomplete="on" required></li>
                    <li><label for="nombre">Nombre completo:</label></li>
                    <li><input type="text" name="nombre" id="nombre" placeholder="Digite su nombre completo" autocomplete="on" required></li>
                    <li><label for="apellidos">Apellidos:</label></li>
                    <li><input type="text" name="apellidos" id="apellidos" placeholder="Digite sus apellidos" autocomplete="on" required></li>
                    <li><label for="telefono">Teléfono:</label></li>
                    <li><input type="text" name="telefono" id="telefono" placeholder="Digite su teléfono" autocomplete="on" required></li>
                    <li><label for="asunto">Asunto:</label></li>
                    <li><input type="text" name="asunto" id="asunto" placeholder="Digite el asunto del mensaje" autocomplete="on" required></li>
                    <li><label for="mensaje">Mensaje:</label></li>
                    <li><textarea name="mensaje" rows="20" cols="50"></textarea></li>
                    <li><button type="submit">Enviar</button></li>
                  </ul>
                </form>
              </div>
            </div><!--.contenedor-->
          </section><!--.seccion-informacion-->
        </main>

        <!--.FOOTER-->
        <?php include("../../footer.php") ?>
    </body>
</html>
