<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
  $estado = $_POST["calificacion"]; //Calificacion 4-3-2-6 Rechazado-CorregirConObservaciones-Aprobado-Editado
	$observaciones = $_POST["observaciones"]; // Observaciones de la calificacion
	$documento = $_POST["documento"]; // ID del AnteProyecto o ResumenEjecutivo a evaluar
  $rol = $_POST["rol"]; // Director de carrera o Unidad de extensión
  $tipo = $_POST["tipo"]; // 1 para ante proyecto   2 para resumen ejecutivo
  $guardado = $_POST["guardado"]; // Se existe un registro guardado anteriormente


  $queryNumeroRevisiones = "";
  $queryMaxVersionSelect = "";
  $queryInsert = "";
  $queryUpdate = "";

  switch ($tipo) {
    case 1: // Caso ante proyecto
      $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
      $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
      break;
    case 2: // Caso resumen ejecutivo
      $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
      $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
      break;
  }

  if($guardado == 6) { // Existe un registro ya guardado, se debe editar
    if($estado != 6){ // Se generará la calificación, lo cual significa que hay que actualizar el estado del proyecto 
      switch ($tipo) {
        case 1: // Caso ante proyecto
          $updateCalif = "UPDATE tigrupou_tcu.revision_ante_proyecto SET Observaciones = '$observaciones', estado= $estado WHERE version= VERS and ante_proyecto LIKE $documento and rol LIKE $rol;";
          $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET ESTADOC = $estado WHERE grupo LIKE $documento";
          break;
        case 2: // Caso resumen ejecutivo
          $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET ESTADOC = $estado WHERE grupo LIKE $documento";
          break;
      }
    }

  }else{ // Se debe crear un registro nuevo
      switch ($tipo) {
        case 1: // Caso ante proyecto
          $queryInsert = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto, rol) values(version_value,'$observaciones',$estado,$documento,$rol)";        
          break;
        case 2: // Caso resumen ejecutivo
          $queryInsert = "INSERT INTO tigrupou_tcu.revision_resumen_ejecutivo(version, observaciones,estado,resumen_ejecutivo, rol) values(version_value,'$observaciones',$estado,$documento, $rol)";
          break;
      }

      if($estado != 6){ // Se generá la calificación
        switch ($tipo) {
          case 1: // Caso ante proyecto
            $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET ESTADOC = $estado WHERE grupo LIKE $documento";
            break;
          case 2: // Caso resumen ejecutivo
            $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET ESTADOC = $estado WHERE grupo LIKE $documento";
            break;
        }
      }
  }

























  if($guardado == 0){
    switch ($tipo) {
      case 1: // Caso ante proyecto
        $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
        $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
        $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET ESTADOC = $estado WHERE grupo LIKE $documento";
        $queryInsert = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto, rol) values(version_value,'$observaciones',$estado,$documento,$rol)";        
        break;
      case 2: // Caso resumen ejecutivo
        $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
        $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
        $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET ESTADOC = $estado WHERE grupo LIKE $documento";
        $queryInsert = "INSERT INTO tigrupou_tcu.revision_resumen_ejecutivo(version, observaciones,estado,resumen_ejecutivo, rol) values(version_value,'$observaciones',$estado,$documento, $rol)";
        break;
    }
  
    try {
  
        $stmt = $db->prepare($queryNumeroRevisiones);//consulta a DB
        $stmt -> execute();
  
        //Cantidad de revisiones
         $resulNumeroRevisiones = $stmt -> fetchAll();
        foreach($resulNumeroRevisiones as $row){
            $numeroRevisiones = $row["cantidad"];
        }
        // Calcula la version del nuevo documento
        if($numeroRevisiones == 0){
          $version = 1;
        }else{
          $stmt = $db->prepare($queryMaxVersionSelect);//consulta a DB
           $stmt -> execute();
           $resultMaxVersion = $stmt -> fetchAll();
  
          foreach($resultMaxVersion as $row){
              $maxVersion = $row["max"];
          }
          $version = $maxVersion +1;
        }
  
        // Reemplaza la nueva version en la consulta
        $queryInsert = str_replace("version_value", $version, $queryInsert);
  
        $stmt = $db->prepare($queryInsert);//Inserta a DB
         $stmt -> execute();
  
        if($rol == 1){ //Solo cuando un director de carrera genera la calificacion se actualiza al estudiante 
          $queryUpdate = str_replace("ESTADOC", "estado", $queryUpdate);
        }else{
          $queryUpdate = str_replace("ESTADOC", "estado_be", $queryUpdate);
        }
        $stmt = $db->prepare($queryUpdate);//Inserta a DB
        $stmt -> execute();
         echo "OK";
         //redireccionar a la página principal
  
    } catch (Exception $e) {
      echo $e;
    }
  }else{
    
  }
  

?>
