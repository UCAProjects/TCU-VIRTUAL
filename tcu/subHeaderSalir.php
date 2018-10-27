<link rel="stylesheet" href="../../css/subHeader.css">

<?php
  //Codigo php que verifica los estados de un determinado
  //usuario para así habilitar las opciones del menú que sen
  //realmente necesarias.
  include '/conection.php'; //Conección a la DB
?>

<style>
  /* Para opciones del menu Disable */ 
  .disabled {
    pointer-events:none; /* No clickable */
    opacity:0.6;         /* Se ve disabled */
}
</style>

<header class="sub-header">
  <div class="fondo-encabezado">
    <ul class="nav nav-tabs">
      <li class="dropdown">
          <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-clipboard-list"></i> Plantillas <span  class="caret white colorNaranja"></span></a>
          <ul class="dropdown-menu">
            <li id="liHorasDigital"><a href="../../Plantillas/CartaAceptacion.docx"><i class="fas fa-file-word"></i> Carta de Aceptación</a></li>
            <li id="liControlDocumento"><a href="../../Plantillas/FormCartaSolicitud.pdf"><i class="fas fa-file-word"></i> Carta de Solicitud</a></li>
            <li id="liControlDocumento"><a href="../../Plantillas/CartaFinalizacion.docx"><i class="fas fa-file-word"></i> Carta de Finalización</a></li>
            <li id="liControlDocumento"><a href="../../Plantillas/CronogramaTCU.docx"><i class="fas fa-file-word"></i> Cronograma</a></li>
            <li id="liControlDocumento"><a href="../../Plantillas/BitacoraTCULogoNuevo2018.pdf" target="_blank"><i class="fas fa-file-pdf"></i> Bitácora</a></li>
          </ul>
        </li>
        
      <li class="navbar-right" id="liSalir"><a class="color"  href="../../index.php"> Salir <i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </div><!-- .fondo-encabezado -->
</header>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
 crossorigin="anonymous"></script>



  
