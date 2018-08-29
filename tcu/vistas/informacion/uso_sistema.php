<!doctype html>
<html class="no-js" lang="">
  <!--.HEADER-->
  <?php include("../../header.php") ?>

        <main class="site-main">
          <section class="seccion-informacion">
            <h2>Uso del sistema de Tcu</h2>
            <div class="contenedor">
              <div class="instrucciones-generales">
                <h3>Acerca del Sistema</h3>
                <p>
                  El sistema de TCU Virtual es una iniciativa de la Universidad para facilitar el desarrollo del Trabajo
                  Comunal Universitario. Esta propuesta, pretende digitalizar la información y apoyar al estudiante
                  a llevar un registro idóneo de todo el proceso de desarrollo de este,
                  como parte de su formación integral y como requisito ineludible para concluir su plan de estudios.
                </p>
                <h3>Uso del Sistema</h3>
                <div id="example1" style="height:700px" class="textTC"></div> 

                <br><br>
                <p>
                    Para cualquier duda o consulta, puede contactarnos por medio del formulario de <span>
                    <a href="contacto.php"><i class="fas fa-envelope" aria-hidden="true"></i> contacto</a></span> de la página y pronto le estaremos contactando.
                </p>
              </div>
            </div><!--.contenedor-->
          </section><!--.seccion-informacion-->
        </main>

        <!--.FOOTER-->
        <?php include("../../footer.php") ?>

        <script src="../../PDFObject/pdfobject.js"></script>
        <script>PDFObject.embed("../../documentos/MANUAL DE USUARIO DEL SOFTWARE DE TCU-V2.pdf", "#example1");</script>
    </body>
</html>
