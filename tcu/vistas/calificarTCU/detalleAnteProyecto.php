



<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
   TCU
 </title>
 <link rel="stylesheet" href="../../css/datosProyecto.css">

 <style type="text/css">
	#divE {
    overflow-y: scroll;
    height: 800px  !important;
    width: 800px !important;
    margin-right: 9px;
    resize: none; /* Remove this if you want the user to resize the textarea */
}
</style>

</head>
<body>
 <?php 
    session_start();
    include '../../header.php';
    include '../../subHeaderFuncionarios.php';
    include '../../conection.php'; //Conección a la DB

    $carrera = $_SESSION["carreraFuncionario"];
    $query = "SELECT G.codigo, G.descripcion from tigrupou_tcu.grupos G JOIN tigrupou_tcu.ante_proyecto A ON G.codigo LIKE A.grupo where G.carrera  like $carrera and A.estado like 1";

    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();

   
    
 ?>
<main class="site-main">
            <section class="seccion-informacion">
              <div class="contenedor clearfix">
                <div class="">
                  <h2>Ante Proyecto</h2>
                  <div  class="ingreso ingresoTamano">
                      <form class="">
                        
                        <div id="divE" style="background-color: white; height: ">
                        	<center>
                        		<img src="../../img/uca.png" alt="Smiley face">  <br><br><br><br>
                       			<h3>Tema</h3>
                       			Deseño de residuos tóxicos 

                       			<br>

                       			<h3>Intergrantes</h3>
                       			Albin Mora Valverde, 2014084952 <br>
                       			Albin Mora Valverde, 2014084952 <br>
                       			Albin Mora Valverde, 2014084952 <br>

                       			<br>

                       			<h3>Organización</h3>
                       			Instituto Ténologíco de Costa Rica <br>

                       			<h3>Supervisor</h3>
                       			Juan Carlos Oreamuno Gutierrez <br><br><br><br><br><br>

                       			------------------------------------------------------------------------------------------------------------------ 

                       			
                       		</center>

                       		<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>

<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>

<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>
<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>
<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>
<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>
<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>
<h3>Problema a resolver</h3>
                       			Una revolución (del latín revolutio, "una vuelta") es un cambio social fundamental en la estructura de poder o la organización que toma lugar en un periodo relativamente corto o largo dependiendo la estructura de la misma. Aristóteles describía dos tipos de revoluciones políticas:

Cambio completo desde una constitución a otra.
Modificación desde una constitución existente.1​
Los expertos aún debaten qué puede constituir una revolución y que no. Estudios sobre revoluciones suelen analizar los eventos en la Historia de Occidente desde una perspectiva psicológica, pero también más análisis incluyen eventos globales e incorporar puntos de vista de las ciencias sociales, incluyendo la sociología y las ciencias políticas.

Sus orígenes pueden tener motivos de diversa índole, un cambio tecnológico, un cambio social o un nuevo paradigma basta para que una sociedad cambie radicalmente su estructura y gobierno. Las revoluciones pueden ser pacíficas aunque en general implican violencia, al enfrentarse grupos conservadores con el anterior régimen y aquellos que aspiran al cambio, o incluso entre los que aspiran a un nuevo sistema, pudiendo haber así varias facciones enfrentadas. En la actualidad las revoluciones son consideradas los puntos de inflexión de la historia, de los que parten la mayoría de sistemas políticos y sociales actuales. Revoluciones decisivas en la historia mundial serían Revolución de las Trece Colonias, la Revolución francesa, las revoluciones independentistas de Latinoamérica o la Revolución de Octubre. <br>

                        </div>

                        
                        
                      </form>
                  </div>
                </div><!--.programa-evento-->
              </div><!--.contenedor-->

            </section><!--.section programa-->
          </main>


    <script src="../../js/principalEstudiantes.js"></script>
          <?php 
          include '../../footer.php';
          ?>
          <script src="../../js/datosProyecto.js"></script>
        </body>
        </html>
