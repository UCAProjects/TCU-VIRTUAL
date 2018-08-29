<?php
  //session_start();
    include '../../conection.php'; //Conección a la DB

      $carrera = $_SESSION["carreraFuncionario"];
      $rol = $_SESSION["rolFuncionario"];

      if($rol == 1){ // Director de Carrera
        $queryA = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado like 1 ";
        $queryR = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado like 1 ";
      }elseif ($rol == 2) { // Bienestar Estudiantil
        $queryA = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado_be like 1 ";
        $queryR = "select count(*) total from tigrupou_tcu.grupos G JOIN tigrupou_tcu.resumen_ejecutivo A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado_be like 1 ";
      }

      $stmt = $db->prepare($queryA);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $numeroAnteProyecto = 0;
      foreach($result as $row){
          $numeroAnteProyecto = $row["total"];
      }

      $stmt = $db->prepare($queryR);
      $stmt -> execute();
      $result = $stmt -> fetchAll();
      $numeroResumenEjecutivo = 0;
      foreach($result as $row){
          $numeroResumenEjecutivo = $row["total"];
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
					<span class="white">
						<i class="fas fa-check-circle"></i>
						Calificar TCU
					</span>
					<span class="caret white colorNaranja"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="over" href="../calificarTCU/calificarDatosProyecto.php?class=1">
							<i class="fas fa-clipboard-check"></i> Ante Proyecto
							<span class="badge" style="background-color:#3a87ad">
								<?php echo $numeroAnteProyecto; ?>
							</span>
						</a>
					</li>
					<li>
						<a class="over" href="../calificarTCU/calificarDatosProyecto.php?class=2">
							<i class="fas fa-clipboard-check"></i> Resumen Ejecutivo
							<span class="badge" style="background-color:#3a87ad">
								<?php echo $numeroResumenEjecutivo; ?>
							</span>
						</a>
					</li>
				</ul>
			</li>
			<!-- ************************ -->


			<!-- Grupos TCU -->

			<li id="liSalirs">
				<a class="color" href="../funcionariosGruposTCU/administrarGrupos.php">
					<i class="fas fa-users"></i> Proyectos TCU</a>
			</li>

			<!-- ************************* -->


			<!--       Reportes      -->
			<li class="dropdown" id="liSalir">
				<a class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="white">
						<i class="fas fa-table"></i> Reportes </span>
					<span class="caret white colorNaranja"></span>
				</a>
				<ul class="dropdown-menu">
					<!-- <li><a class="over" href="../reportes/reportes.php?id=1"><i class="fas fa-file-pdf"></i></i> Reporte por Estudiante </a></li> -->
					<!--<li>
						<a class="over" href="../reportes/reportes.php?id=2">
							<i class="fas fa-file-pdf"></i>
							</i> Reporte por Periodo </a>
					</li>
					<li>
						<a class="over" href="../reportes/reportes.php?id=3">
							<i class="fas fa-file-pdf"></i>
							</i> Reporte por Sede </a>
					</li>
					<li>
						<a class="over" href="../reportes/reportes.php?id=4">
							<i class="fas fa-file-pdf"></i>
							</i> Reporte por Carrera </a>
					</li>
					<li>
						<a class="over" href="../reportes/reportes.php?id=5">
							<i class="fas fa-file-pdf"></i>
							</i> Reporte por Estatus </a>
					</li> -->
					<li>
						<a class="over" href="../reportes/reportes.php?id=6">
							<i class="fas fa-file-pdf"></i>
							</i> Reporte General </a>
					</li>
				</ul>
			</li>
			<!-- ************************ -->

			<!-- Convalidar TCU -->
			<li id="liSalirs">
				<a class="color" href="../convalidaciones/convalidaciones.php">
				<i class="fas fa-clone"></i> Convalidar TCU</a>
			</li>


			<li class="navbar-right" id="liSalir">
				<a class="color" href="../../index.php">
					<i class="fas fa-sign-out-alt" aria-hidden="true" title="SALIR"></i>
				</a>
			</li>

			<li class="dropdown navbar-right">
				<a href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i title="USUARIO" class="fa fa-user white" aria-hidden="true"></i>
					<span class="caret white colorNaranja"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="../registro/registroFuncionarios.php?tipo=2">
							<i class="fas fa-edit"></i> Editar Perfil</a>
					</li>
					<li>
						<a href="../registro/editarContrasena.php?tipo=2">
							<i class="fas fa-key"></i> Cambiar Contraseña</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- .fondo-encabezado -->
</header>