<?php
  session_start();
  $tipo = $_GET['tipo']; // TIPO -1 = Estudiante, Tipo N = Funcionarios
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   Datos del Proyecto
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">
</head>
<body>
 <?php
 
    include '../../header.php';
    include '../../conection.php'; //Conección a la DB

    /**
     * Validaciones segun el tipo de usuario que solicita la página
     */
    if($tipo == -1){ // Estudiante Editar 
      include '../../subHeaderEstudiantes.php';
      $grupo = $_SESSION["grupo"];
    }elseif($tipo == 0){ // Estudiante a crear
      $sesionId = $_SESSION["codigo"];
      $grupo = $_SESSION["grupo"];
    }else{
      include '../../subHeaderFuncionarios.php';
      $grupo = $tipo;
    }

    /**
     * Selecciona la información de los estudiantes que pertenecen a un determinado grupo
     */
    $query = "select codigo,nombre_completo,primer_apellido, cedula from tigrupou_tcu.estudiantes where grupo like $grupo";
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $resultEstudiantes = $stmt -> fetchAll();
    $codigo = "";
    $tema = "";
    $organizacion = "";
    $supervisor = "";
    $telefono = "";
    $celular = "";
    $correo = "";
    $direccion = "";

    /**
     * Consulta que seleecióna los datos de TCU correspondientes a un grupo 
     */
    $query = "select * from tigrupou_tcu.datos where grupo like $grupo";
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $resultInfo = $stmt -> fetchAll();
    foreach($resultInfo as $row){
      $codigo = $row["codigo"];
      $tema = $row["tema"];
      $organizacion = $row["organizacion"];
      $supervisor = $row["supervisor"];
      $telefono = $row["telefono"];
      $celular = $row["celular"];
      $correo = $row["correo"];
      $direccion = $row["direccion"];
    }
 ?>
    <main class="site-main">
      <section class="seccion-informacion">
        <div class="contenedor clearfix">
          <div class="">
            <?php 
              if($tipo != -1 and $tipo != 0){ ?>
                    <h2><?php echo $tema ?></h2>
              <?php }else{ ?>
                <h2>Datos del Proyecto</h2>
              <?php } ?>  
            <div  class="ingreso ingresoTamano">
              <form class="formulario" action="../../accesoDatos/datosProyecto/insertarEditarDatosProyecto.php" method="POST">
                <ul>
                  <li>
                    <label for="temaProyecto">Integrantes</label></li>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Cod</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Cédula</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($resultEstudiantes as $row ){
                            ?>
                            <tr>
                              <th scope="row"><?php echo $row["codigo"] ?></th>
                              <td><?php echo $row["nombre_completo"] ?></td>
                              <td><?php echo $row["primer_apellido"] ?></td>
                              <td><?php echo $row["cedula"] ?></td>
                            </tr><?php
                          }
                        ?>
                        </tbody>
                    </table>
                    <hr><br>
                  </li>
                  <div class="row">
                    <div class="col-md-12">
                      <li><input type="hidden" id="grupo" name="grupo" value="<?php echo $grupo ?>"><input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"></li>
                      <li><label for="temaProyecto">Tema del proyecto</label></li>
                      <li><textarea rows="2" id="temaProyecto" name="temaProyecto" class="tamanoCompleto" placeholder="Digite el tema del proyecto" required><?php echo $tema ?></textarea></li>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <li><label for="lugar">Organización donde realizará el T.C.U.</label></li>
                      <li><textarea id="lugar" name="lugar" class="tamanoCompleto" placeholder="Digite la organización o lugar donde realizará el T.C.U." required><?php echo $organizacion ?></textarea></li>
                    </div>
                    <div class="col-md-6">
                      <li><label for="supervisor">Supervisor(a) del T.C.U. </label></li>
                      <li><textarea rows="5" id="supervisor" name="supervisor" class="tamanoCompleto" placeholder="Digite el supervisor(a) del T.C.U." required><?php echo $supervisor ?></textarea></li>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <li><label for="telTrabajo">Teléfono del Trabajo</label></li>
                      <li><input type="text" id="telTrabajo" name="telTrabajo" placeholder="Digite el teléfono del trabajo" value="<?php echo $telefono ?>" class="tamanoCompleto"></li>
                    </div>
                    <div class="col-md-3">
                      <li><label for="cecular">Teléfono Celular</label></li>
                      <li><input type="text" id="celular" name="celular" placeholder="Digite el teléfono celular" class="tamanoCompleto" value="<?php echo $celular ?>"></li>
                    </div>
                    <div class="col-md-6">
                      <li><label for="correo" >Correo</label></li>
                      <li><input type="email" id="correo" name="correo" class="tamanoCompleto" placeholder="Digite el correo electrónico" required value="<?php echo $correo ?>"></li>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <li><label for="direccion">Dirección exacta del lugar dónde realizará el T.C.U.</label></li>
                      <li><textarea id="direccion" name="direccion"  class="tamanoCompleto" placeholder="Digite la dirección exacta del lugar dónde realizará el T.C.U." required><?php echo $direccion ?></textarea></li>
                    </div>
                  </div>
                </ul>
                <br>
                <?php 
                  if($tipo != -1 and $tipo != 0){ ?>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-1">
                        <a  id="linkAnteProyecto" onclick="cargarModal({'grupo':<?php echo $grupo ?>},'Gdiv','Gmodal','../funcionariosGruposTCU/detalleAnteProyecto.php');"><i class="fas fa-file-alt"></i> Ante Proyecto </a>
                      </div>
                      <div class="col-md-3 col-md-offset-1">
                        <a  id="linkAnteProyecto" onclick="cargarModal({'grupo':<?php echo $grupo ?>},'Gdiv','Gmodal','../funcionariosGruposTCU/detalleResumenEjecutivo.php');"><i class="fas fa-file-alt"></i> Resumen Ejecutivo </a>
                      </div>
                    </div>
                                                
                    <?php 
                  } ?>
                <div class="col-md-3 col-md-offset-9">
                  <?php
                    if($tipo != -1 and $tipo != 0){ ?>
                        <a href="javascript:history.back(1)" class="btn btn-block btn-danger buttonForm" id="btnRegresar"><i class="fas fa-arrow-left"></i> Atrás</a>
                    <?php 
                    }else{ ?>
                      <button  class="btn btn-block btn buttonForm" id="btnConfirmar" name="btnConfirmar" type="submit"><i class="far fa-save"></i> Confirmar</button>
                    <?php }
                    ?>              
                </div>
                <br><br><br>
              </form>
            </div>
          </div><!--.programa-evento-->
        </div><!--.contenedor-->
      </section><!--.section programa-->
    </main>

    <?php
    include '../../modal.php';
    include '../../footer.php';
    ?>
  </body>
</html>
