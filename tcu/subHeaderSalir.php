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
      <li class="navbar-right" id="liSalir"><a class="color"  href="../../index.php"> Salir <i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </div><!-- .fondo-encabezado -->
</header>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
 crossorigin="anonymous"></script>



  
