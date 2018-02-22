<?php
  // session_start();
  // $sesionId = $_SESSION["codigo"];
  // $grupo = $_SESSION["grupo"]; 
  // $tipo = $_GET['tipo'];
?>

<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   AnteProyecto
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">

 <style type="text/css">
   .container {
  width: 600px;
  margin: 100px auto; 
}
.progressbar {
  margin: 0;
  padding: 0;
  counter-reset: step;
}
.progressbar li {
  list-style-type: none;
  width: 18%;
  float: left;
  font-size: 12px;
  position: relative;
  text-align: center;
  text-transform: uppercase;
  color: #7d7d7d;
}
.progressbar li:before {
  width: 30px;
  height: 30px;
  content: counter(step);
  counter-increment: step;
  line-height: 30px;
  border: 2px solid #7d7d7d;
  display: block;
  text-align: center;
  margin: 0 auto 10px auto;
  border-radius: 50%;
  background-color: white;
}
.progressbar li:after {
  width: 100%;
  height: 2px;
  content: '';
  position: absolute;
  background-color: #7d7d7d;
  top: 15px;
  left: -50%;
  z-index: -1;
}
.progressbar li:first-child:after {
  content: none;
}
.progressbar li.active {
  color: green;
}
.progressbar li.active:before {
  border-color: #55b776;
}
.progressbar li.active + li:after {
  background-color: #55b776;
}
 </style>
</head>
<body>

 <?php 
    include '../../header.php';
    include '../../conection.php'; //Conección a la DB
    
 ?>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
          <![endif]-->

          <!-- Add your site or application content here -->

          
          <main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>ANTE PROYECTO</h2>
                  <div  class="ingreso ingresoTamano">

                   <div class="container">
                        <ul class="progressbar">
                            <li id="problemaMenu" class="active" >Problema</li>
                            <li id="beneficiarioMenu">Beneficiario</li>
                            <li id="proyectoMenu" >Proyecto</li>
                            <li id="objetivosMenu">Objetivos</li>
                            <li id="solucionesMenu">Soluciones</li>
                        </ul>
                  </div><!--.programa-evento-->
                    <div style="margin-left:20%;" method="POST">
                      <div id="contenedorAnteProyecto">
                        <label for="identificacionProblema">IDENTIFICACION DEL PROBLEMA</label>
                      <textarea  id="identificacionProblema" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="20" cols="87"> </textarea>

                      <label for="identificacionProblema2">DESCRIPCION DEL PROBLEMA</label>
                      <textarea  id="identificacionProblema2" style=" overflow:hidden; font-size:15px; font-family:Arial; text-align : justify;line-height: 1.6; resize:none;" rows="12" cols="87"> </textarea>
<br>
                      <button onclick="cargarAnteProyecto(1)" style="margin-left:67% !important">Continuar</button>
                      </div>
                      

                    </div>

                    <meter min="0" max="100"
                            low="25" high="75"
                            optimum="100" value="25">


                  </div>

              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>

          <?php 
          include '../../footer.php';
          ?>
        <script src="../../js/datosProyecto.js"></script>
        </body>
        </html>
