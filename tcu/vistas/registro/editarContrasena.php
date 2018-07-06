<?php
// Se recibe una variable tipo, la cual espercifica como se comportará la pantalla
// TIPO = 1 . Cambio de contraseña para estudiantes.
// TIPO = 2. Cambio de contraseña para funcionarios.
  session_start();
  $tipo = $_GET['tipo'];
  $id = "";
  $query = "";
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Cambio Contraseña
        </title>
         <link rel="stylesheet" href="../../css/datosProyecto.css">
    </head>
    <body>
    	<?php
    		include '../../header.php';
    		include '../../conection.php';
        if($tipo ==1){
          include '../../subHeaderEstudiantes.php';
          $id = $_SESSION["codigo"];
          $query = "SELECT nombre_usuario FROM tigrupou_tcu.autentificacion_estudiantes where usuario like $id;";
        }elseif($tipo ==2){
            $id = $_SESSION["codigoFuncionario"];
            include '../../subHeaderFuncionarios.php';
            $query = "SELECT nombre_usuario FROM tigrupou_tcu.autentificacion_funcionarios where usuario like $id;";
          }
          $nombre_usuario = "";
          $stmt = $db->prepare($query);
          $stmt -> execute();
          $result = $stmt -> fetchAll();
          foreach ($result as $row) {
            $nombre_usuario = $row["nombre_usuario"];
          }
    	?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Cambio de Usuario y Contraseña</h2>
                  <div class="ingreso ingresoTamano">
                  <div class="formulario">
                    <ul>
                      <div class="row">
                        <div class="col-md-6">
                          <li><label for="usuario">Usuario</label></li>
                            <li><input type="text" name="usuario" id="usuario" placeholder="Digite su nombre de usuario" value="<?php echo $nombre_usuario ?>" required readonly></li>
                        </div>
                        <div class="col-md-6">
                          <li><label for="contrasena">Contraseña Anterior</label></li>
                            <li><input type="password" name="contrasenaA" id="contrasenaA" placeholder="Digite su antigua contraseña" required></li>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <li><label for="contrasena2">Nueva Contraseña</label></li>
                            <li><input type="password" name="contrasenaN" id="contrasenaN" placeholder="Digite su nueva contraseña"  required></li>
                        </div>
                        <div class="col-md-6">
                          <li><label for="contrasena2">Confirmar Nueva Contraseña</label></li>
                            <li><input type="password" name="contrasenaN2" id="contrasenaN2" placeholder="Vuelva a digitar su nueva contraseña" required></li>
                        </div>
                      </div>
                      <div class="col-md-3 col-md-offset-9">
                        <button  class="btn btn-block btn buttonForm" id="btnUserContrasena" name="btnUserContrasena" onclick="validarEditarUsuarioContrasena(<?php echo $id ?>,<?php echo $tipo ?>)"><i class="far fa-save"></i> Confirmar</button>
                      </div>
                      <br><br><br>
                    </ul>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->
          </section><!--.section programa-->

        </main>
        <?php
        	include '../../footer.php'
        ?>
        <script src="../../js/registro.js"></script>
    </body>
</html>
