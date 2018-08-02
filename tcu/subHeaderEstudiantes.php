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
      <li>
        <a href="../principalEstudiantes/principalEstudiantes.php">
          <i title="INICIO" class="fa fa-university white" aria-hidden="true"></i>
        </a>
      </li>
      <li class="dropdown">
        <a  class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="white"><i class="fas fa-globe"></i> Proyecto TCU</span><span class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li><a class="over" href="../datosProyecto/crearGrupo.php?tipo=1"><i class="fas fa-users"></i> Grupo de Trabajo</a></li>
          <li><a href="../datosProyecto/datosProyecto.php?tipo=-1"><i class="fas fa-info-circle"></i> Datos del Proyecto</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-file-alt"></i> Documentación <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../datosProyecto/anteProyecto.php?tipo=1"><i class="fas fa-book"></i> Ante Proyecto</a></li>
          <li id="liResumenEjectivo"><a href="../resumenEjecutivo/resumenEjecutivo.php"><i class="fas fa-book"></i> Resumen Ejecutivo</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-hourglass-half"></i> Realización de Horas <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li id="liHorasDigital"><a href="../horasTCU/calendarioHoras.php?grupo=0"><i class="fas fa-calendar-alt"></i> Control de horas digital</a></li>
          <li id="liControlDocumento"><a href="../../documentos/Bitácora.pdf" target="_blank"><i class="fas fa-download"></i> Documento para el control de horas</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-clipboard-list"></i> Plantillas <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li id="liHorasDigital"><a ><i class="far fa-file-alt"></i> Carta de Aceptación</a></li>
          <li id="liControlDocumento"><a  target="_blank"><i class="far fa-file-alt"></i> Carta de Supervisión</a></li>
        </ul>
      </li>
      <li class="navbar-right" id="liSalir"><a class="color"  href="../../index.php"><i class="fas fa-sign-out-alt"></i></a></li>
      <li class="dropdown navbar-right">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i title="USUARIO" class="fa fa-user white" aria-hidden="true" ></i> <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../registro/registro.php?tipo=1"><i class="fas fa-edit"></i> Editar Perfil</a></li>
          <li><a href="../registro/editarContrasena.php?tipo=1"><i class="fas fa-key"></i> Cambiar Contraseña</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- .fondo-encabezado -->
</header>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
 crossorigin="anonymous"></script>

<?php
  //session_start();
  $grupo = $_SESSION["grupo"];

  /*
    Codigo para verificar el estado del anteProyecto y así 
    dar acceso al usuario a las distintas opciones del menú.
   */
  $queryAnteProyectoStatus = "SELECT estado FROM tigrupou_tcu.ante_proyecto WHERE grupo LIKE $grupo";
  $stmt = $db->prepare($queryAnteProyectoStatus);
  $stmt -> execute();
  $resultAnteProyectoStatus = $stmt -> fetchAll();
  $estatusAnteProyecto = '';
  foreach ($resultAnteProyectoStatus as $row) {
    $estatusAnteProyecto = $row["estado"];
  }
  if($estatusAnteProyecto == '' or $estatusAnteProyecto == '1' or $estatusAnteProyecto == '3' or $estatusAnteProyecto == '4'){
    ?>
      <script>
        $("#liResumenEjectivo").addClass("disabled" );
        $("#liHorasDigital").addClass("disabled" );
        $("#liControlDocumento").addClass("disabled" );
      </script>
      <?php
  }

  
