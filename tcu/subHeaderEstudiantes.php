<link rel="stylesheet" href="../../css/subHeader.css">

<?php
  //Codigo php que verifica los estados de un determinado
  //usuario para así habilitar las opciones del menú que sen
  //realmente necesarias.
  include '../../conection.php'; //Conección a la DB

  // $query = "select codigo from tigrupou_tcu.datos where grupo like $grupoDB";
  // $stmt = $db->prepare($query);
  // $stmt->execute();
  // $result = $stmt -> fetchAll();
  // foreach ($result as $row ) {
  // $datos = $row["codigo"];
  // //}
  // if($datos ==""){
  //   echo "1-0"; // El estudiante tiene grupo, pero no tiene datos asociada.
  // }else{
  //   echo "1-$datos"; // El estudiante tiene tanto grupo como datos asociados.
  // }
?>
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
          <li><a href="../datosProyecto/datosProyecto.php?tipo=1"><i class="fas fa-info-circle"></i> Datos del Proyecto</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-file-alt"></i> Documentación <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../datosProyecto/anteProyecto.php?tipo=1"><i class="fas fa-book"></i> Ante Proyecto</a></li>
          <li><a href="../resumenEjecutivo/resumenEjecutivo.php"><i class="fas fa-book"></i> Resumen Ejecutivo</a></li>
        </ul>
      </li>
    <!--<li class="navbar" id="liSalir"><a class="color"  href="# "><i class="fas fa-file-alt"></i> Ante Proyecto</a></li> -->

      <li class="dropdown">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-hourglass-half"></i> Realiazación de Horas <span  class="caret white colorNaranja"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../horasTCU/calendarioHoras.php"><i class="fas fa-calendar-alt"></i> Control de horas digital</a></li>
          <li><a href="../../documentos/Bitácora.pdf" target="_blank"><i class="fas fa-download"></i> Documento para el control de horas</a></li>
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
