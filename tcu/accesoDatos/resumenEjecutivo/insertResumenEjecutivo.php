<?php
  session_start();
  include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
  include '../../conection.php'; //Conección a la DB

  //Inicialización de variables
  $boolConclusion = false;
  $grupo = $_SESSION["grupo"];
  $directorio = '../../upload/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
  if(isset($_POST["btn_Enviar"])){ //Si se presiona el boton de confirmar
    $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET estado = 1 WHERE grupo like $grupo;";
    echo "string";
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
        $dir=opendir($directorio); //Abrimos el directorio de destino
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

  if($boolConclusion){
    echo "string";
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
    $stmt = $db->prepare($queryInsertCartas);
    $stmt -> execute();
    $stmt = $db->prepare($queryUpdate);
    $stmt -> execute();
    redirect("../../vistas/principalEstudiantes/principalEstudiantes.php");
  }
}
?>
