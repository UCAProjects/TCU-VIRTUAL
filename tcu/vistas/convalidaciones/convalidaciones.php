<!doctype html>
<html class="no-js" lang="">

<head>
	<title>
		TCU
	</title>
	<!-- Convalidaciones -->
</head>

<body>
	<?php
        session_start(); 
        //$sesionId = $_SESSION["codigo"];
        //$grupo = $_SESSION["grupo"];

        include '../../header.php'; 
        include '../../subHeaderFuncionarios.php'; 
        include '../../conection.php'; //Conección a la DB

      ?>
    <link rel="stylesheet" href="../../css/datosProyecto.css">
	<link rel='stylesheet' href='../../css/stilos.css' />
	

	<!--[if lte IE 9] >  <p class="browserupgrade" > You are using an <strong> outdated </strong > browser . Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p> 
        <! [endif]-->
	<!--Add your site or application content here -->

	<main class="site-main">
        <section class="seccion-informacion">
            <div class="contenedor clearfix">
                <h2>Convalidación del TCU</h2>
                <div class="ingreso ingresoTamano">
                    <form class="formulario" method="POST" action="../../accesoDatos/convalidaciones/convalidaciones.php">
                        <ul>
                            <input type="hidden" name="tipo" id="tipo" >
                            <input type="hidden" name="codigo" id="codigo">

                    	    <div class="row">
                                <div class="col-md-4">
                                    <li><label for="apellido1">Primer Apellido</label></li>
                                    <li><input type="text" name="apellido1" id="apellido1" placeholder="Digite el primer apellido"  required></li>
                                </div>
                                <div class="col-md-4">
                                    <li><label for="apellido2">Segundo Apellido</label></li>
                                    <li><input type="text" name="apellido2" id="apellido2" placeholder="Digite el segundo apellido" required></li>
                                </div>
                                <div class="col-md-4">
                                    <li><label for="nombre">nombre</label></li>
                                    <li><input type="text" name="nombre" id="nombre" placeholder="Digite el nombre"  required></li>
                                </div>
                    	    </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <li><label for="cedula">Cédula</label></li>
                                    <li><input type="number" name="cedula" id="cedula" placeholder="Digite la cédula"  required></li>
                                </div>
                                <div class="col-md-4">
                                    <li><label for="universidad">Universidad de Procedencia</label></li>
                                    <li><input type="text" name="universidad" id="universidad" placeholder="Digite la Universidad de Procedencia" required></li>
                                </div>
                                <div class="col-md-4">
                                    <li><label for="periodo">Período</label></li>
                                    <li>
                                        <select name="periodo" id="periodo" required>
                                            <option value="0"> &ltSin Asignar&gt</option>
                                            <?php
                                                $query = "SELECT P.codigo, CONCAT(P.anio, ' - ', SP.sub_periodo,' ', P.numero_periodo ) AS PERIODO FROM tigrupou_tcu.periodos P JOIN tigrupou_tcu.sub_periodo SP ON P.sub_periodo LIKE SP.codigo;";
                                                $stmt = $db->prepare($query);
                                                $stmt -> execute();
                                                $result = $stmt -> fetchAll();
                                                foreach ($result as $row) {
                                                echo "<option value=\"$row[codigo]\"> $row[PERIODO] </option>";
                                                }
                                            ?>
                                        </select>
                                    </li>
                                </div>
                    	    </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <li><label for="descripcionProyecto">Descripción del proyecto</label></li>
                                        <textarea name="descripcionProyecto" id="descripcionProyecto" style="width:97%; height: 200px !important"  placeholder="Digite una breve descripción del proyecto" required></textarea>
                                </div>
                            </div>
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
          include '../../footer.php'; 
  ?>
    
        
      </body> 
    </html>