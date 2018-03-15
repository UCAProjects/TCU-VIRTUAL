
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
            <li><a class="over" href="../calificarTCU/calificarDatosProyecto.php">Ante Proyecto <span class="circle green"><?php echo $numeroAnteProyecto; ?></span></a></li>
          </ul>
        </li>
      <li id="liSalirs"><a class="color"  href="../funcionariosGruposTCU/administrarGrupos.php"> Grupos de TCU</a></li>
      <li id="liSalir"><a class="color"  href="#"> Adjuntos</a></li>

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
</header><!--  <style type="text/css">
    .nav li a:hover{
    background-color:#fe4918;
    color:white;
}

 </style>


 <nav class="navbar bg-inverse" style="background-color: #BDC3C7">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  class="navbar-brand" href="#">
        <i style="color: #fe4918" title="INICIO" class="fa fa-university" aria-hidden="true"></i>
      </a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a style="color: #fe4918" class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="white">Datos del Proyecto </span><span style="color: #fe4918" class="caret white"></span></a>
          <ul class="dropdown-menu">
            <li><a class="over" href="../datosProyecto/crearGrupo.php?tipo=1">Editar Grupo de Trabajo</a></li>
            <li><a href="../datosProyecto/datosProyecto.php?tipo=1">Editar Datos del Proyecto</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a style="color: #fe4918" href="#" class="dropdown-toggle color" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i title="USUARIO" class="fa fa-user white" aria-hidden="true" ></i> <span style="color: #fe4918" class="caret white"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../registro/registro.php?tipo=1">Editar Perfil</a></li> 
          </ul>
        </li>
         <li><a class="color" style="color: #fe4918" href="#"><i class="fa fa-sign-out white" aria-hidden="true" title="SALIR"></i></a></li>
      </ul>
    </div>
  </div>
</nav> 
 -->
<!-- <div class="row">
  <div class="col-md-9 col-md-offset-1">
    <ul class="nav nav-pills">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  class="navbar-brand" href="#">
        <img width="40px" style="margin-top: -10px" alt="Brand" title="INICIO" src="../../img/uca.png">
      </a>
    </div>

  <li class="dropdown">
          <a class="color" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos del Proyecto <span  class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Editar Grupo de Trabajo</a></li>
            <li><a href="#">Editar Datos del Proyecto</a></li>
          </ul>
        </li>
 </ul></div>
<div class="col-md-2">
  <ul class="nav nav-pills">
    <li class="dropdown">
          <a class="color" class="color" style="color: #fe4918" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i title="USUARIO" class="fa fa-user " aria-hidden="true" ></i> <span  class="caret white"></span></a>
          <ul class="dropdown-menu">
            <li><a  href="#">Editar Perfil</a></li> 
          </ul>
        </li>
         <li><a class="color" style="color: #fe4918" href="#"><i  class="fa fa-sign-out white" aria-hidden="true" title="SALIR"></i></a></li>
  </ul>
</div>

</div> -->