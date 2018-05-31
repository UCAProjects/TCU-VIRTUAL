<?php
	session_start();
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$estudiantes= $_POST["estudiantes"];
	$tipo = $_POST["tipo"];

		if($tipo == 0){ //INSERTAR ESTUDIANTES A UN GRUPO
			try {
					$fecha = date('Y-m-d');
					$query = "insert into tigrupou_tcu.grupos(fecha, descripcion) values('$fecha','Grupo TCU')";
					$stmt = $db->prepare($query);//Inserta a DB
					$stmt -> execute();
					$id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente
					$cantidad = 0;
					$valor = false;
					$cedulas = [];
					foreach ($estudiantes as $rowE) {
						$cod = $rowE[0];
						//echo $cod;
						$query = "select grupo, cedula from tigrupou_tcu.estudiantes where codigo like $cod";
						$stmt = $db->prepare($query);//Inserta a DB
			     	$stmt -> execute();
			     	$result = $stmt -> fetchAll();

						foreach ($result as $row ){
							if($row["grupo"] != ""){// VALOR NO NULL
								$valor = true;
								array_push($cedulas, $row["cedula"]);
							}else{
								  $cantidad += 1;
						     	$queryUpdate = "update tigrupou_tcu.estudiantes set  grupo = $id where codigo like $cod";
						     	$stmt = $db->prepare($queryUpdate);//Inserta a DB
						     	$stmt -> execute();
						     	$_SESSION["grupo"] = $id;
							}
						}
					}

					//Se determina a partir del numero de estudiantes de cada carrera a que carrea va a pertenecer el TCU para revisiones.


 						$query = "SELECT carrera, COUNT(carrera ) totpages FROM tigrupou_tcu.estudiantes where grupo = $id GROUP BY carrera ORDER BY totpages DESC LIMIT 1";
						$stmt = $db->prepare($query);//Inserta a DB
			     		$stmt -> execute();
			     		$result = $stmt -> fetchAll();

			     		foreach ($result as $row ) {
							$carrera = $row["carrera"];
							$queryUpdate = "update tigrupou_tcu.grupos set  carrera = $carrera where codigo like $id";
						     $stmt = $db->prepare($queryUpdate);//Inserta a DB
						     $stmt -> execute();
						}

					if($valor and $cantidad >0){
							echo "Los estudiantes con cedulas:" . implode(",", $cedulas) . " no pudieron ser agregados ya que pertenecen a otro grupo de TCU.";
					}else if($valor and $cantidad == 0){
						echo "No se pudo crear el grupo, ya que los estudiantes con cédulas:" . implode(",", $cedulas) . " no pudieron ser agregados debido a que pertenecen a otro grupo de TCU.";
					}else{
						echo "Creado con éxito.";
					}
					if($cantidad == 0){
						$query = "delete from tigrupou_tcu.grupos where codigo like $id";
						$stmt = $db->prepare($query);//Inserta a DB
			     		$stmt -> execute();
					}

						} catch (Exception $e) {
							echo "Error al procesar la información";
						}

		}else{ //uPDATE
		  try {
			$cantidad = 0;
			$valor = false;
			$cedulas = [];
			foreach ($estudiantes as $rowE) {
						$cod = $rowE[0];
						$query = "select grupo, cedula from tigrupou_tcu.estudiantes where codigo like $cod";
						$stmt = $db->prepare($query);//Inserta a DB
			     		$stmt -> execute();
			     		$result = $stmt -> fetchAll();

						foreach ($result as $row ) {
							if($row["grupo"]!= ""){// VALOR NO NULL
								$valor = true;
								array_push($cedulas, $row["cedula"]);
							}else{
								$cantidad +=1;
						     	$queryUpdate = "update tigrupou_tcu.estudiantes set  grupo = $tipo where codigo like $cod";
						     	$stmt = $db->prepare($queryUpdate);//Inserta a DB
						     	$stmt -> execute();
							}
						}
					}
					if($valor and $cantidad >0){
							echo "Los estudiantes con cedulas:" . implode(",", $cedulas) . " no pudieron ser agregados ya que pertenecen a otro grupo de TCU.";
					}else if($valor and $cantidad == 0){
						echo "No se pudieron agregar, ya que los estudi antes con cédulas:" . implode(",", $cedulas) . " pertenecen a otro grupo de TCU.";
					}else{
						echo "Agregados con éxito.";
					}
			} catch (Exception $e) {
				echo "Error al procesar la información";
			}
		}

?>
