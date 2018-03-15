<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$temaProyecto = $_POST["temaProyecto"];
	$lugar = $_POST["lugar"];
	$supervisor = $_POST["supervisor"];
	$telTrabajo = $_POST["telTrabajo"];
	$celular = $_POST["celular"];
	$correo = $_POST["correo"];
	$direccion = $_POST["direccion"];
	$grupo = $_POST["grupo"];
	$codigo = $_POST["codigo"];
	
		if(isset($_POST["btnConfirmar"])){ //Si se presiona el boton de confirmar
			if($codigo == ""){
				try {
					$query = "insert into tigrupou_tcu.datos(tema,organizacion,supervisor,telefono,celular,correo,direccion,grupo) values('$temaProyecto','$lugar','$supervisor','$telTrabajo','$celular','$correo','$direccion',$grupo)";

					$queryUp = "UPDATE tigrupou_tcu.grupos SET descripcion  = '$temaProyecto' WHERE codigo LIKE $grupo";

					$stmt = $db->prepare($query);//Inserta a DB 
	     			$stmt -> execute();

	     			$stmt = $db->prepare($queryUp);//Inserta a DB 
	     			$stmt -> execute();
	     	
	     			redirect("../../vistas/datosProyecto/anteProyecto.php");
	     			//redireccionar a la página principal
			
				}catch (Exception $e) {
					?>
						<script type="text/javascript">
							alert("ERROR AL PROCESAR LA INFORMACIÓN \n\n  -Puede que ya éxista información asociada a este grupo,\n   de lo contrario, inténtelo más tarde.");
               				history.back();
						</script><?php
			
				}
			}else{
				$query = "update tigrupou_tcu.datos set tema = '$temaProyecto' ,organizacion = '$lugar',supervisor = '$supervisor',telefono = '$telTrabajo',celular = '$celular',correo = '$correo' ,direccion = '$direccion'  where codigo like $codigo";

				$stmt = $db->prepare($query);//Actializa a DB 
	     		$stmt -> execute();
	     		redirect("../../vistas/principalEstudiantes/principalEstudiantes.php");
			}
		
			
	}
	 
?>