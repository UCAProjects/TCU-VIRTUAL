<?php 
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$contrasena = $_POST["contrasena"];
	$codigo = $_POST["codigo"]; //Codigo de la persona a realizar el cambio
	$tipo = $_POST["tipo"]; //Ya sea estudiantes o administrativos
		if($tipo == 1){ //Se actualiza el usuario y contraseña de estudiantes
			try {
					$query = "update tigrupou_tcu.autentificacion_estudiantes set password = '$contrasena' where usuario = $codigo";

					$stmt = $db->prepare($query);//Inserta a DB 
					$stmt -> execute();
					echo "Sus datos se han cambiado éxitosamente";
					
									
				} catch (Exception $e) {
					echo "Error al procesar la información";		
				}			
	     	
		}elseif($tipo ==2){
			try {
					$query = "update tigrupou_tcu.autentificacion_funcionarios set password = '$contrasena' where usuario = $codigo";

					$stmt = $db->prepare($query);//Inserta a DB 
					$stmt -> execute();
					echo "Sus datos se han cambiado éxitosamente";
					
									
				} catch (Exception $e) {
					echo "Error al procesar la información";		
				}		
		  
		}
	 
?>