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
   Resumen Ejecutivo
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
  width: 23%;
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
                  <h2>Resumen Ejecutivo</h2>
                  <div  class="ingreso ingresoTamano">

                   <div class="container">
                        <ul class="progressbar">
                            <li id="25" class="active" >Resumen</li>
                            <li id="50">Evalucación</li>
                            <li id="75" >conclusión</li>
                            <li id="100">Recomendaciones</li>
                        </ul>
                  </div><!--.programa-evento-->
                    <div style="margin-left:20%;" method="POST">
                      <div id="contenedorResumenEjecutivo">
                          <?php include 'resumenEjecutivoResumen.php' ?>
                      
                      </div>
                    </div>

                    <meter min="0" max="100" id="meter" 
                            low="25" high="75"
                            optimum="100" value="25">

                  </div>

              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>
            <div class="modal fade" id="modalAdjuntarConclusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h2 class="modal-title" id="exampleModalLabel">Carta conclusión del TCU</h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div id="mostrarModalConclusion"></div>
                      </div>
      
                    </div>
              </div>
            </div>
          <?php 
          include '../../footer.php';
          ?>
        <script src="../../js/datosProyecto.js"></script>
        </body>
        </html>
