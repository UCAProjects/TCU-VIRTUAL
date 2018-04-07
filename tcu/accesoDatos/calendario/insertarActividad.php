<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$_Fecha = $_POST["fecha"];
	$_HoraEntrada = $_POST["horaEntrada"];
	$_HoraSalida = $_POST["horaSalida"];
  $_CantidadHoras = $_POST["cantidadHoras"];
  $_Actividades = $_POST["actividades"];


  $fechaEntrada = $_Fecha . 'T' . $_HoraEntrada;
  $fechaSalida = $_Fecha . 'T' . $_HoraSalida;


  try {

  	$queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $ante_proyecto";

  	$stmt = $db->prepare($queryNumeroRevisiones);//consulta a DB
     	$stmt -> execute();

     	$resulNumeroRevisiones = $stmt -> fetchAll();
    	foreach($resulNumeroRevisiones as $row){
      		$numeroRevisiones = $row["cantidad"];
    	}
    	echo $numeroRevisiones;
    	if($numeroRevisiones == 0){
    		$version = 1;
    	}else{
    		$queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $ante_proyecto";

    		$stmt = $db->prepare($queryMaxVersionSelect);//consulta a DB
     		$stmt -> execute();

     		$resultMaxVersion = $stmt -> fetchAll();
    		foreach($resultMaxVersion as $row){
      			$maxVersion = $row["max"];
    		}
    		$version = $maxVersion +1;
    	}


  	$query = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto) values($version,'$observaciones',$estado,$ante_proyecto)";


  	$stmt = $db->prepare($query);//Inserta a DB
     	$stmt -> execute();

        $update = "UPDATE tigrupou_tcu.ante_proyecto SET estado = $estado WHERE codigo LIKE $ante_proyecto";
        $stmt = $db->prepare($update);//Inserta a DB
        $stmt -> execute();

     	echo "OK";
     			//redireccionar a la página principal

  } catch (Exception $e) {
  	echo "ERROR";
  }

?>
