
<?php 
  //session_start();
    include '../../conection.php'; //Conección a la DB

      $carrera = $_SESSION["carreraFuncionario"];
      $query = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado like 1 ";

      $stmt = $db->prepare($query);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $numeroAnteProyecto = 0;
      foreach($result as $row){
          $numeroAnteProyecto = $row["total"];
      }
?>

<link rel="stylesheet" href="../../css/subHeader.css">

<header class="sub-header">
  <div class="fondo-encabezado">
    
    <ul class="nav nav-tabs">
      <li class="active">
        <a class="color" href="../principalFuncionarios/principalFuncionarios.php">
          <i  style="color: #fe4918" title="INICIO" class="fa fa-university white" aria-hidden="true"></i>
        </a>
      </li>

      <li class="dropdown">
          <a class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="white">Calificar TCU </span><span style="color: #fe4918" class="caret white colorNaranja"></span></a>
          <ul class="dropdown-menu">
            <li><a class="over" href="../calificarTCU/calificarDatosProyecto.php">Ante Proyecto <span class="badge"><?php echo $numeroAnteProyecto; ?></span></a></li>
          </ul>
        </li>
      <li id="liSalirs"><a class="color"  href="../funcionariosGruposTCU/administrarGrupos.php"> Grupos de TCU</a></li>
      <li id="liSalir"><a class="color"  href="../Reportes/reportes.php"> Reportes</a></li>

      <li class="navbar-right" id="liSalir"><a class="color colorNaranja"  href="../../index.php"><i  class="fa fa-sign-out" aria-hidden="true" title="SALIR"></i></a></li>

      <li class="dropdown navbar-right">
        <a  href="#" class="dropdown-toggle color colorNaranja" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i title="USUARIO" class="fa fa-user white" aria-hidden="true" ></i> <span  class="caret white colorNaranja"></span></a>

        <ul class="dropdown-menu">
          <li><a href="../registro/registroFuncionarios.php?tipo=2">Editar Perfil</a></li>
          <li><a href="../registro/editarContrasena.php?tipo=2">Cambiar Contraseña</a></li> 
        </ul>
      </li>
    </ul>
  </div><!-- .fondo-encabezado -->
</header>