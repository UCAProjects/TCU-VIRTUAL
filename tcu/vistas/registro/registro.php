<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Registro Estudiantes
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
        $lugar ="";
        $carrera ="";
        $grado ="";
        $sede ="";
        $periodo ="";
        $usuario ="";
        $contrasena ="";
        $contrasena2 ="";

        if($tipo ==1){
          $sesionId = $_SESSION["codigo"];
          include '../../subHeaderEstudiantes.php';
          $query = "select * from tigrupou_tcu.estudiantes where codigo like $sesionId;";
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
            $lugar = $row["lugar_trabajo"];
            $carrera =$row["carrera"];;
            $grado =$row["grado"];;
            $sede =$row["sede"];;
            $periodo =$row["cuatrimestre"];
          }
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
                  <h2>Registro</h2>
                  <div class="ingreso ingresoTamano">
                  <form class="formulario" onsubmit="return validarRegistroEstudiantes()" method="POST" action="../../accesoDatos/registro/insertarEditarRegistroEstudiantes.php">
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
                    			<li><label for="nombre">nombre</label></li>
                      			<li><input type="text" name="nombre" id="nombre" placeholder="Digite su nombre" value="<?php echo $nombre ?>" required></li>
                    		</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="cedula">Cédula</label></li>
                      			<li><input type="text" name="cedula" id="cedula" placeholder="Digite su cédula" value="<?php echo $cedula ?>" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="correo">Correo</label></li>
                      			<li><input type="email" name="correo" id="correo" placeholder="Digite su correo" value="<?php echo $correo ?>" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="telefono">Teléfono</label></li>
                       			<li><input type="text" name="telefono" id="telefono" placeholder="Digite su teléfono" value="<?php echo $telefono ?>" required></li>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-4">
                    			<li><label for="carrera">Carrera</label></li>
                      			<li>
                      				<select name="carrera" id="carrera" required>
                                        <option value="0"> &ltSin Asignar&gt</option>
                                        <?php
                                            $query = "SELECT * FROM tigrupou_tcu.carreras;";
                                            $stmt = $db->prepare($query);
                                            $stmt -> execute();
                                            $result = $stmt -> fetchAll();
                                            foreach ($result as $row) {
                                              echo "<option value=\"$row[codigo]\"> $row[carrera] </option>";
                                            }
                                        ?>
									         </select>
					   		   </li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="grado">Grado</label></li>
					   			<li>
					   				<select name="grado" id="grado" required>
                      <option value="0"> &ltSin Asignar&gt</option>
								  		<?php
                                            $query = "SELECT * FROM tigrupou_tcu.grados;";
                                            $stmt = $db->prepare($query);
                                            $stmt -> execute();
                                            $result = $stmt -> fetchAll();
                                            foreach ($result as $row) {
                                              echo "<option value=\"$row[codigo]\"> $row[grado] </option>";
                                            }
                                        ?>
									</select>
					   			</li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="periodo">Período</label></li>
					   			<li>
					   				<select name="periodo" id="periodo" required>
                      <option value="0"> &ltSin Asignar&gt</option>
								  		<?php
                                            $query = "SELECT * FROM tigrupou_tcu.periodos;";
                                            $stmt = $db->prepare($query);
                                            $stmt -> execute();
                                            $result = $stmt -> fetchAll();
                                            foreach ($result as $row) {
                                              echo "<option value=\"$row[codigo]\"> $row[periodo] </option>";
                                            }
                                        ?>
									</select>
					   			</li>
                    		</div>
                    	</div>


                      <div class="row">
                    		<div class="col-md-4">
                    			<li><label for="sede">Sede</label></li>
					   				  <li>
					   					<select name="sede" id="sede" required>
                        <option value="0"> &ltSin Asignar&gt</option>
								  			<?php
                                            $query = "SELECT * FROM tigrupou_tcu.sedes;";
                                            $stmt = $db->prepare($query);
                                            $stmt -> execute();
                                            $result = $stmt -> fetchAll();
                                            foreach ($result as $row) {
                                              echo "<option value=\"$row[codigo]\"> $row[sede] </option>";
                                            }
                                        ?>
										</select>
					   				</li>
                    		</div>
                    		<div class="col-md-4">
					   			<li><label for="telefonoT">Teléfono donde realizará el TCU</label></li>
                       			<li><input type="text" name="telefonoT" id="telefonoT" placeholder="Digite su teléfono" value="<?php echo $telTrabajo ?>" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="lugarTrabajo">Lugar dónde Labora</label></li>
                       			 <li><textarea name="lugarTrabajo" id="lugarTrabajo" placeholder="Digite el lugar dónde labora" rows="4" required><?php echo $lugar ?></textarea></li>
                    		</div>
                    	</div>
                      <?php
                        if($tipo == 0){ ?>
                          <div class="row">
                            <div class="col-md-4">
                              <li><label for="usuario">Usuario</label></li>
                                <li><input type="text" name="usuario" id="usuario" placeholder="Digite su nombre de usuario" autocomplete="on" required readonly></li>
                            </div>
                            <div class="col-md-4">
                              <li><label for="contrasena">Crear Contraseña</label></li>
                                <li><input type="password" name="contrasena" id="contrasena" placeholder="Digite su contraseña" autocomplete="on" required></li>
                            </div>
                            <div class="col-md-4">
                              <li><label for="contrasena2">Confirmar Nueva Contraseña</label></li>
                                <li><input type="password" name="contrasena2" id="contrasena2" placeholder="Vuelva a digitar su contraseña" autocomplete="on" required></li>
                            </div>
                          </div> <?php
                        }
                      ?>
                    </ul>

                    <div class="col-md-3 col-md-offset-9">
                      <button class="btn btn-block btn buttonForm" type="submit" id="btnRegistro" name="btnRegistro"><i class="far fa-save"></i> Confirmar</button>
                    </div>
                    <br><br><br>
                  </form>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

          </section><!--.section programa-->
        </main>


        <?php
        	include '../../footer.php'; ?>

          <script src="../../js/registro.js"></script>
    <?php
          if($tipo == 1){ // Modo editar ?>
            <script type="text/javascript">
              valueSelect('carrera',<?php echo $carrera ?>);
              valueSelect('grado',<?php echo $grado ?>);
              valueSelect('periodo',<?php echo $periodo ?>);
              valueSelect('sede',<?php echo $sede ?>);
            </script>
          <?php
          }
        ?>


    </body>
</html>
