<?php
  session_start();
  include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
  include '../../conection.php'; //Conección a la DB

  $boolRealizacion = false;
  $boolAceptacion = false;
  $grupo = $_SESSION["grupo"];

  $directorio = '../../upload/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
  if(isset($_POST["btn_Enviar"])){ //Si se presiona el boton de confirmar
    $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET estado = 1 WHERE grupo like $grupo;";

    foreach($_FILES['uploadedSolicitud']['tmp_name'] as $key => $tmp_name)
    {
      //Validamos que el archivo exista
      if($_FILES["uploadedSolicitud"]["name"][$key]) {
        $filename = $_FILES["uploadedSolicitud"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["uploadedSolicitud"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $tipo = $_FILES['uploadedSolicitud']['type'][$key];

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        $date = date('H-i-s');
        $dir=opendir($directorio); //Abrimos el directorio de destino
        $target_pathSolicitud = $directorio.$date.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_pathSolicitud)) {
          $boolRealizacion = true;
        }
        else {
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
    }
   }

   foreach($_FILES["uploadedAceptacion"]['tmp_name'] as $key => $tmp_name)
   {
     //Validamos que el archivo exista
     if($_FILES["uploadedAceptacion"]["name"][$key]) {
       $filename = $_FILES["uploadedAceptacion"]["name"][$key]; //Obtenemos el nombre original del archivo
       $source = $_FILES["uploadedAceptacion"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
       $tipo = $_FILES['uploadedAceptacion']['type'][$key];

       //Validamos si la ruta de destino existe, en caso de no existir la creamos
       if(!file_exists($directorio)){
         mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
       }
       $date = date('H-i-s');
       $dir=opendir($directorio); //Abrimos el directorio de destino
       $target_pathAceptacion = $directorio.$date.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
       //Movemos y validamos que el archivo se haya cargado correctamente
       //El primer campo es el origen y el segundo el destino
       if(move_uploaded_file($source, $target_pathAceptacion)) {
         $boolAceptacion = true;
       }
       else {
         echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
       }
       closedir($dir); //Cerramos el directorio de destino
   }
  }

  if($boolAceptacion and $boolRealizacion){
    $queryInsertCartas = "INSERT INTO tigrupou_tcu.cartas_adjuntas (url_carta_solicitud, url_carta_aceptacion, grupo) VALUES ( \"$target_pathSolicitud\", \"$target_pathAceptacion\", $grupo);";
    echo $queryInsertCartas;
    $stmt = $db->prepare($queryInsertCartas);
    $stmt -> execute();

    $stmt = $db->prepare($queryUpdate);
    $stmt -> execute();

    redirect("../../vistas/principalEstudiantes/principalEstudiantes.php");
  }
}
?>
