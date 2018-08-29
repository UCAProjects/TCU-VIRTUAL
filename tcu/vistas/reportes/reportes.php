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
            case '6':
                $url =  "busquedaGeneral.php";
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
			<div class="" style="margin-left:1%;margin-right:1%">
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

          
          function createQuery(pCont, pStr){
              if(pCont == 0){
                  return " WHERE " + pStr;
              }
              else{
                  return " AND " + pStr;
              }
          }

          function sendGeneralReport(){
            var cont = 0; /** Controla el numero de condiciones activas */
            var query = "SELECT G.codigo, G.fecha, G.descripcion, C.carrera, E.descripcion AS estado, S.sede AS sede, CONCAT(P.anio,' - ',SP.sub_periodo,' ', P.numero_periodo) AS periodo FROM tigrupou_tcu.grupos G  LEFT JOIN tigrupou_tcu.carreras C ON G.carrera LIKE C.codigo  LEFT JOIN tigrupou_tcu.estado E ON G.estado LIKE E.codigo  LEFT JOIN tigrupou_tcu.sedes S ON G.sede LIKE S.codigo LEFT JOIN tigrupou_tcu.periodos P ON G.periodo LIKE P.codigo LEFT JOIN tigrupou_tcu.sub_periodo SP ON P.sub_periodo LIKE SP.codigo AND P.codigo LIKE G.periodo ";

            /** Select Carrera */
            var e = document.getElementById("selCarrera");
            var codCarrera = e.options[e.selectedIndex].value;

            /** Select Sede */
            var e = document.getElementById("selSede");
            var codSede = e.options[e.selectedIndex].value;

            var e = document.getElementById("selEstado");
            var codEst = e.options[e.selectedIndex].value;

            var e = document.getElementById("selPeriodo");
            var codPeriod = e.options[e.selectedIndex].value;

            if(codPeriod != "0"){
                qSede = "G.periodo like " + codPeriod;
                query += createQuery(cont,qSede);
                cont ++;
            }

            if(codEst != "-1"){
                qEstado = "G.estado like " + codEst;
                query += createQuery(cont,qEstado);
                cont ++;
            }

            if(codSede != "0"){
                qSede = "G.sede like " + codSede;
                query += createQuery(cont,qSede);
                cont ++;
            }

            if(codCarrera != "0"){
                qCarrera = "G.carrera like " + codCarrera;
                query += createQuery(cont,qCarrera);
                cont ++;
            }
            query += ";"
            cargarFormulariosPost('resGrupo.php','result',{query:query});
          }
        </script>  
        
      </body> 
    </html>