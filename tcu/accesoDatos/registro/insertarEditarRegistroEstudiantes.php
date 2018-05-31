<?php
	include("../../conection.php");// conexión a DB
	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$correo= $_POST["correo"];
	$telefono= $_POST["telefono"];
	$carrera = $_POST["carrera"];
	$grado = $_POST["grado"];
	$periodo = $_POST["periodo"];
	$sede = $_POST["sede"];
	$telefonoT = $_POST["telefonoT"];
	$lugarTrabajo= $_POST["lugarTrabajo"];
	$tipo= $_POST["tipo"];
	$codigo= $_POST["codigo"];
	$usuario = "";
	$contrasena = "";

	if(isset($_POST["usuario"])){
		$usuario = $_POST["usuario"];
	}
	if(isset($_POST["contrasena"])){
		$contrasena = $_POST["contrasena"];
	}

	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
		if($tipo == 0){
			try {
			$ano = date('Y');
			$query = "insert into tigrupou_tcu.estudiantes(primer_apellido,segundo_apellido,nombre_completo,cedula,correo_electronico,telefono_trabajo,celular,carrera,grado,cuatrimestre,aino,sede,lugar_trabajo) values('$apellido1','$apellido2','$nombre','$cedula','$correo','$telefonoT','$telefono',$carrera,$grado,$periodo,'$ano',$sede,'$lugarTrabajo')";

			$stmt = $db->prepare($query);//Inserta a DB
	     	$stmt -> execute();
	     	$id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente


	     	// insertar usuario y contraseña
	     	$queryAutentificacion = "insert into tigrupou_tcu.autentificacion_estudiantes(nombre_usuario,password,usuario)
values('$usuario','$contrasena',$id)";

			$stmtAu = $db->prepare($queryAutentificacion);//Inserta a DB
	     	$stmtAu -> execute();

	     	session_start();
      		$_SESSION["codigo"] = $id;
      		$_SESSION["usuario"] = $nombre_usuario;
      		$_SESSION["grupo"] = "";

	     	redirect("../../vistas/datosProyecto/tipoGrupo.php?tipo=0");


			}catch (Exception $e) {
				?>
						<script type="text/javascript">
							alert("ERROR AL PROCESAR LA INFORMACIÓN ");
               				history.back();
						</script><?php
			}
		}else{
			try {
				$query = "update tigrupou_tcu.estudiantes set primer_apellido = '$apellido1',segundo_apellido = '$apellido2' ,nombre_completo = '$nombre' ,cedula = '$cedula',correo_electronico = '$correo',telefono_trabajo = '$telefonoT',celular = '$telefono',carrera = $carrera,grado = $grado,cuatrimestre = $periodo,sede = $sede ,lugar_trabajo = '$lugarTrabajo' where codigo like $codigo ";

				$stmt = $db->prepare($query);//Actualiza la DB
		     	$stmt -> execute();

		     	$query = "update tigrupou_tcu.autentificacion_estudiantes set nombre_usuario = '$cedula' where usuario like $codigo ";
		     	$stmt = $db->prepare($query);//Actualiza la DB
		     	$stmt -> execute();
		     	redirect("../../vistas/principalEstudiantes/principalEstudiantes.php");

			} catch (Exception $e) {
				?>
						<script type="text/javascript">
							alert("ERROR AL PROCESAR LA INFORMACIÓN ");
               				history.back();
						</script><?php
			}
		}
	}
?>
