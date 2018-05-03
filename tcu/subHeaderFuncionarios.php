
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

    <!-- Boton Inicio -->
    <ul class="nav nav-tabs">
      <li>
        <a class="color" href="../principalFuncionarios/principalFuncionarios.php">
          <i title="INICIO" class="fa fa-university white" aria-hidden="true"></i>
        </a>
      </li>
     <!-- ************************ -->

     <!-- Calificar TCU -->
      <li class="dropdown">
          <a class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <span class="white"><i class="fas fa-check-circle"></i>
                          Calificar TCU
                      </span>
                      <span style="color: #fe4918" class="caret white"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
                  <a class="over" href="../calificarTCU/calificarDatosProyecto.php"><i class="fas fa-clipboard-check"></i> Ante Proyecto
                      <span class="badge" style="background-color:#3a87ad"><?php echo $numeroAnteProyecto; ?></span>
                  </a>
            </li>
            <li>
              <a class="over" href="../calificarTCU/calificarDatosProyecto.php"><i class="fas fa-clipboard-check"></i> Resumen Ejecutivo
              <span class="badge" style="background-color:#3a87ad"><?php echo $numeroAnteProyecto; ?></span></a>
            </li>
          </ul>
      </li>
      <!-- ************************ -->


      <!-- Grupos TCU -->

      <li id="liSalirs"><a class="color"  href="../funcionariosGruposTCU/administrarGrupos.php"><i class="fas fa-users"></i> Grupos de TCU</a></li>

      <!-- ************************* -->


      <!--       Reportes      -->
      <li class="dropdown" id="liSalir">
          <a class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="white"><i class="fas fa-table"></i> Reportes </span><span style="color: #fe4918" class="caret white"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="over" href="../calificarTCU/calificarDatosProyecto.php"><i class="fas fa-file-pdf"></i></i> Reporte por Estudiantes </a></li>
            <li><a class="over" href="../calificarTCU/calificarDatosProyecto.php"><i class="fas fa-file-pdf"></i></i> Reporte por Grupo </a></li>
            <li><a class="over" href="../calificarTCU/calificarDatosProyecto.php"><i class="fas fa-file-pdf"></i></i> Reporte por Periodo </a></li>
          </ul>
        </li>
        <!-- ************************ -->

      <li class="navbar-right" id="liSalir"><a class="color"  href="../../index.php"><i  class="fas fa-sign-out-alt" aria-hidden="true" title="SALIR"></i></a></li>

      <li class="dropdown navbar-right">
        <a  href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i title="USUARIO" class="fa fa-user white" aria-hidden="true" ></i> <span  class="caret white"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../registro/registroFuncionarios.php?tipo=2"><i class="fas fa-edit"></i> Editar Perfil</a></li>
          <li><a href="../registro/editarContrasena.php?tipo=2"><i class="fas fa-key"></i> Cambiar Contraseña</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- .fondo-encabezado -->
</header>
