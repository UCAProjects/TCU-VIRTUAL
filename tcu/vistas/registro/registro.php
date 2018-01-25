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
    		include '../../header.php';
    		include '../../conection.php';
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
					   			<li><label for="telefonoT">Teléfono del Trabajo</label></li>
                       			<li><input type="text" name="telefonoT" id="telefonoT" placeholder="Digite su teléfono" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="lugarTrabajo">Lugar dónde Labora</label></li>
                       			 <li><textarea name="lugarTrabajo" id="lugarTrabajo" placeholder="Digite el lugar dónde labora" autocomplete="on" rows="4" required></textarea></li>
                    		</div>
                    	</div>
                      <div class="row">
                    		<div class="col-md-4">
                    			<li><label for="usuario">Usuario</label></li>
                      			<li><input type="text" name="usuario" id="usuario" placeholder="Digite su nombre de usuario" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="contrasena">Contraseña</label></li>
                      			<li><input type="password" name="contrasena" id="contrasena" placeholder="Digite su contraseña" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="contrasena2">Confirmar Contraseña</label></li>
                      			<li><input type="password" name="contrasena2" id="contrasena2" placeholder="Vuelva a digitar su contraseña" autocomplete="on" required></li>
                    		</div>
                    	</div>
     
                      <li><button type="submit" id="btnRegistro" name="btnRegistro">Registro</button> <br><br><br></li>
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
