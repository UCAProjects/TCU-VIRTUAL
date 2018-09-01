
<?php
  
  session_start();
  include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
  include '../../conection.php'; //Conección a la DB

  //Inicialización de variables
  $boolConclusion = false;
  $grupo = $_SESSION["grupo"];
  $directorio = '../../upload/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
  if(isset($_POST["btn_Enviar"])){ //Si se presiona el boton de confirmar

    $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET estado = 1, estado_be = 1 WHERE grupo like $grupo;";

    foreach($_FILES['uploadedAprobacion']['tmp_name'] as $key => $tmp_name)
    {
      //Validamos que el archivo exista
      if($_FILES["uploadedAprobacion"]["name"][$key]) {
        $filename = $_FILES["uploadedAprobacion"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["uploadedAprobacion"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $tipo = $_FILES['uploadedAprobacion']['type'][$key];

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        $date = date('H-i-s');
        $dir= opendir($directorio); //Abrimos el directorio de destino
        $target_pathSolicitud = $directorio.$date.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_pathSolicitud)) {
          $boolConclusion = true;
        }
        else {
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
          closedir($dir); //Cerramos el directorio de destino
      }
   }


   foreach($_FILES['uploadBitacora']['tmp_name'] as $key => $tmp_name)
   {
      //Validamos que el archivo exista
      if($_FILES["uploadBitacora"]["name"][$key]) {
        $filename = $_FILES["uploadBitacora"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["uploadBitacora"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $tipo = $_FILES['uploadBitacora']['type'][$key];

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        $date = date('H-i-s');
        $dir= opendir($directorio); //Abrimos el directorio de destino
        $target_pathBitacora = $directorio.$date.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_pathBitacora)) {
          $boolBitacora = true;
        }
        else {
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
          closedir($dir); //Cerramos el directorio de destino
      }
   }
   
   $queryDeleteFile = "SELECT URL FROM tigrupou_tcu.evidencias_adjuntas WHERE GRUPO LIKE $grupo";
   $stmt = $db->prepare($queryDeleteFile);
   $stmt -> execute();
   $resultDelete = $stmt -> fetchAll();
      foreach ($resultDelete as $row) {
        $url = $row["URL"];
        unlink($url);
      }
   
   $queryDeleteEvidencias = "DELETE FROM tigrupou_tcu.evidencias_adjuntas WHERE GRUPO LIKE $grupo";
   $stmt = $db->prepare($queryDeleteEvidencias);
   $stmt -> execute();

   foreach($_FILES['uploadEvidencias']['tmp_name'] as $key => $tmp_name)
   {
      //Validamos que el archivo exista
      if($_FILES["uploadEvidencias"]["name"][$key]) {
        $filename = $_FILES["uploadEvidencias"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["uploadEvidencias"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $tipo = $_FILES['uploadEvidencias']['type'][$key];

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        $date = date('H-i-s');
        $dir= opendir($directorio); //Abrimos el directorio de destino
        $target_pathEvidencias = $directorio.$date.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_pathEvidencias)) {
          $queryEvidencias = "INSERT tigrupou_tcu.evidencias_adjuntas(grupo,url) values($grupo,\"$target_pathEvidencias\")";
          $stmt = $db->prepare($queryEvidencias);
          $stmt -> execute();
        }
        else {
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
          closedir($dir); //Cerramos el directorio de destino
      }
   }

  if($boolConclusion and $boolBitacora){
    $queryVerification = "SELECT count(*) as CONT FROM tigrupou_tcu.cartas_adjuntas WHERE grupo LIKE $grupo;";
    $stmt = $db->prepare($queryVerification);
    $stmt -> execute();
    $resultVerfication = $stmt -> fetchAll();
    foreach($resultVerfication as $row){
        $cont = $row["CONT"];
    }
    $queryInsertCartas = "";
    if($cont == 0){
      $queryInsertCartas = "INSERT INTO tigrupou_tcu.cartas_adjuntas (url_carta_conclusion, grupo) VALUES ( \"$target_pathSolicitud\", $grupo);";

    }else{
      $queryInsertCartas = "UPDATE tigrupou_tcu.cartas_adjuntas SET url_carta_conclusion = \"$target_pathSolicitud\" WHERE grupo = $grupo;";
    }
    $queryBitacora = "UPDATE tigrupou_tcu.cartas_adjuntas SET url_bitacora = \"$target_pathBitacora\" WHERE grupo = $grupo;";

    $stmt = $db->prepare($queryInsertCartas);
    $stmt -> execute();
    $stmt = $db->prepare($queryBitacora);
    $stmt -> execute();
    $stmt = $db->prepare($queryUpdate);
    $stmt -> execute();
    redirect("../../vistas/principalEstudiantes/principalEstudiantes.php");
  }
}
?>
