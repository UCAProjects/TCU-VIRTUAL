<!doctype html>
<html class="no-js" lang="">

<head>
	<title>
		TCU
	</title>
	<!-- Reportería se plantea hacer en menú -->
</head>

<body>
	<?php
        session_start(); 
        //$sesionId = $_SESSION["codigo"];
        //$grupo = $_SESSION["grupo"];

        include '../../header.php'; 
        include '../../subHeaderFuncionarios.php'; 
        include '../../conection.php'; //Conección a la DB

        $id = $_GET["id"];
      ?>

	<link rel='stylesheet' href='../../css/stilos.css' />
	<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />
	<?php
          $url = "";
          switch ($id){
            case '2':
                $url =  "busquedaPeriodo.php";
                break;
            case '3':
                $url =  "busquedaSede.php";
                break;
            case '4':
                $url =  "busquedaCarrera.php";
                break;
            case '5':
                $url =  "busquedaEstado.php";
                break;
            default:
                $url =  "busquedaPeriodo.php";
                break;
          }
        ?>


	<!--[if lte IE 9] >  <p class="browserupgrade" > You are using an <strong> outdated </strong > browser . Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p> 
        <! [endif]-->
	<!--Add your site or application content here -->

	<main class="site-main">
		<section class="seccion-informacion">
			<div class="contenedor clearfix">
				<div class="">
					<br>
					<div class="well">
						<div id="divBusqueda"></div>
						<!-- Se carga la sección para hacer la busqueda -->
						<br>
						<hr>
						<div id="result"> </div>
						<!-- Se carga los resultados de la busqueda anterior -->
					</div>
				</div>
			</div>
			<!-- . programa - evento -->
			</div>
			<!-- . contenedor -->
		</section>
		<!-- . section programa -->
	</main>

	<?php
          include '../../footer.php'; 
  ?>
        <script>
          cargarFormularios('<?php echo $url;?>','divBusqueda');
        </script>
        <script src="../../js/principalEstudiantes.js"></script>  
        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>  
        <script src="../../js/datosProyecto.js"></script>  

        <script> 
          var _TwoPeriodDate = false;
          $(document).ready(function () {
            $('#radioBtn a').on('click', function() {
              var sel = $(this).data('title'); 
              var tog = $(this).data('toggle'); 
              $('#' + tog).prop('value', sel); 
              $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive'); 
              $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active'); 

              var formTwoYear = document.getElementById("year2"); 
              if (sel == "N") {
                formTwoYear.style.display = "none";
                _TwoPeriodDate = false; 
              }else {
                formTwoYear.style.display = "block";
                _TwoPeriodDate = true;
              }
            }); 
          });

          function sendPeriodReport(){ //Faltan validaciones
                var firtsDate = $("#yearO").val();
                var query = "";
                if(firtsDate != ""){
                    if(_TwoPeriodDate){
                        var secondDate = $("#yearT").val();
                        if(secondDate != ""){
                            var query = "SELECT * FROM tigrupou_tcu.grupos WHERE year(fecha) between " + firtsDate +
                                " AND " +  secondDate;
                        }
                    }else{
                        var query = "SELECT * FROM tigrupou_tcu.grupos WHERE year(fecha) LIKE " +  firtsDate;
                    }
                }
                cargarFormulariosPost('resGrupo.php','result',{query:query});
          }

          function sendSedeReport(){
              var e = document.getElementById("selSede");
              var codSede = e.options[e.selectedIndex].value;
              var query = "";
              if(codSede != "0"){
                  query = "SELECT * FROM tigrupou_tcu.grupos WHERE sede like " + codSede;
              }
              cargarFormulariosPost('resGrupo.php','result',{query:query});
          }

          function sendCarreraReport(){
              var e = document.getElementById("selCarrera");
              var codSede = e.options[e.selectedIndex].value;

              var query = "";
              if(codSede != "0"){
                  query = "SELECT * FROM tigrupou_tcu.grupos WHERE carrera like " + codSede;
              }
              alert(query);
              cargarFormulariosPost('resGrupo.php','result',{query:query});
          }

          function sendEstadoReport(){
              var e = document.getElementById("selEstado");
              var codEst = e.options[e.selectedIndex].value;

              var query = "";
              if(codEst != "-1"){
                  query = "SELECT * FROM tigrupou_tcu.grupos WHERE estado like " + codEst;
              }
              cargarFormulariosPost('resGrupo.php','result',{query:query});
          }
        </script>  
        
      </body> 
    </html>