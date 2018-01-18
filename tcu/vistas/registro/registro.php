<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>
        	Registro
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
                  <h2>Registro</h2>
                  <form class="formulario" novalidate>
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
								  		<option value="volvo">Informática</option>
								  		<option value="saab">Educación Física </option>
								  		<option value="mercedes">Recursos Humanos</option>
								  		<option value="audi">Contaduría</option>
									</select>
					   		   </li>
                    		</div>
                    		<div class="col-md-4">
                    			<li><label for="grado">Grado</label></li>
					   			<li>
					   				<select name="grado" id="grado" required>
								  		<option value="volvo">Bachillerato</option>
								  		<option value="saab">Licenciatura</option>
								  		<option value="mercedes">Maestría</option>
									</select>
					   			</li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="periodo">Período</label></li>
					   			<li>
					   				<select name="periodo" id="periodo" required>
								  		<option value="volvo">Cuatrimestre 1</option>
								  		<option value="saab">Cuatrimestre 2</option>
								  		<option value="mercedes">Cuatrimestre 3</option>
									</select>
					   			</li>
                    		</div>
                    	</div>
                      

                      <div class="row">
                    		<div class="col-md-4">
                    			<li><label for="sede">Sede</label></li>
					   				<li>
					   					<select name="sede" id="sede" required>
								  			<option value="volvo">Central</option>
								  			<option value="saab">Heredia</option>
								  			<option value="mercedes">Turrialba</option>
										</select>
					   				</li>
                    		</div>
                    		<div class="col-md-4">
					   			<li><label for="telefono">Teléfono del Trabajo</label></li>
                       			<li><input type="text" name="telefono" id="telefono" placeholder="Digite su teléfono" autocomplete="on" required></li>
                    		</div>
                    		<div class="col-md-4">
                    			 <li><label for="lugarTrabajo">Lugar dónde Labora</label></li>
                       			 <li><textarea name="lugarTrabajo" id="lugarTrabajo" placeholder="Digite el lugar dónde labora" autocomplete="on" rows="4" required></textarea></li>
                    		</div>
                    	</div>
                      
                      
                      
                      
                      
					   

					   


					  

                       



     
                      <li><button type="submit">Registro</button>
                      <button type="submit">Ingreso</button></li>
                    </ul>
                  </form>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->
         
          </section><!--.section programa-->
        </main>

        <?php 
        	include '../../footer.php'
        ?>
    </body>
</html>
