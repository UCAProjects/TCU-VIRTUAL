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
            session_start();
            include '../../header.php';
            include '../../conection.php';

            $tipo = $_GET['tipo'];

          $pApellido = "";
            $sApellido = "";
            $nombre ="";
            $cedula ="";
            $correo ="";
            $telefono = "";
            $telTrabajo = "";

            if($tipo ==2){ //Editar Funcionarios
              include '../../subHeaderFuncionarios.php';
              $sesionId = $_SESSION["codigoFuncionario"];
              $query = "select * from tigrupou_tcu.funcionarios where codigo like $sesionId;";
              $stmt = $db->prepare($query);
              $stmt -> execute();
              $result = $stmt -> fetchAll();
              foreach($result as $row){
                $pApellido = $row["primer_apellido"];
                $sApellido = $row["segundo_apellido"];
                $nombre = $row["nombre_completo"];
                $cedula = $row["cedula"];
                $correo = $row["correo_electronico"];
                $telefono = $row["celular"];
                $telTrabajo = $row["telefono_trabajo"];
              }
            
      ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <main class="site-main">
          <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Registro</h2>
                <div class="ingreso ingresoTamano">
                  <form class="formulario"  action="../../accesoDatos/registro/insertarEditarRegistroFuncionarios.php" method="POST">
                    <ul>
                      <input type="hidden" name="tipo" id="tipo" value="<?php echo $tipo ?>">
                      <input type="hidden" name="codigo" id="codigo" value="<?php echo $sesionId ?>">
                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="apellido1">Primer Apellido</label></li>
                      			<li><input type="text" name="apellido1" id="apellido1" placeholder="Digite su primer apellido" value="<?php echo $pApellido ?>" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="apellido2">Segundo Apellido</label></li>
                      			<li><input type="text" name="apellido2" id="apellido2" placeholder="Digite su segundo apellido" value="<?php echo $sApellido ?>" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="nombre">Nombre</label></li>
                      			<li><input type="text" name="nombre" id="nombre" placeholder="Digite su nombre" value="<?php echo $nombre ?>" required></li>
                    		</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="cedula">Cédula</label></li>
                      			<li><input type="text" name="cedula" id="cedula" placeholder="Digite su cédula" value="<?php echo $cedula ?>" required readonly></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="correo">Correo</label></li>
                      			<li><input type="email" name="correo" id="correo" placeholder="Digite su correo" value="<?php echo $correo ?>" ></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="telefono">Teléfono</label></li>
                       			<li><input type="text" name="telefono" id="telefono" placeholder="Digite su teléfono" value="<?php echo $telTrabajo ?>" ></li>
                    		</div>
                    	</div>
                      <?php
                        if($tipo == 0){ ?>
                          <div class="row">
                            <div class="col-md-4">
                              <li><label for="usuario">Usuario</label></li>
                                <li><input type="text" name="usuario" id="usuario" placeholder="Digite su usuario" autocomplete="on" required readonly></li>
                            </div>
                            <div class="col-md-4">
                              <li><label for="contrasena">Contraseña</label></li>
                                <li><input type="password" name="contrasena" id="contrasena" placeholder="Digite su contraseña" autocomplete="on" required></li>
                            </div>
                            <div class="col-md-4">
                               <li><label for="contrasena2">Confirmar contraseña</label></li>
                                <li><input type="password" name="contrasena2" id="contrasena2" placeholder="Vuelva a digitar su contraseña" autocomplete="on" required></li>
                            </div>
                          </div> <?php
                        }
                      ?>
                      <li><button type="submit" id="btnRegistro" name="btnRegistro">Confirmar</button><br><br><br></li>
                    </ul>
                  </form>
                </div> <!--.programa-evento -->
              </div> <!--.contenedor -->

          </section> <!--.section programa -->
        </main>
        <?php
            }else{?>
            <div class="well">
              <label class="label label-danger">No se cuenta con permisos para realizar esta acción</label>
            </div>
              
            <?php
            }
        	include '../../footer.php'
        ?>
        <script src="../../js/registro.js?version=5"></script>
    </body>
</html>