<!doctype html>
<html class="no-js" lang="">
<head>
  <title>
    Horas TCU
  </title>
  <!--
    Full Calendar Styles
  -->
  <link rel='stylesheet' href='../../fullcalendar/fullcalendar.css' />
  <link href='../../fullcalendar-scheduler/scheduler.css' rel='stylesheet' />

  <style>
    .a{
      font-size: 30px;
    }
    .a:hover{
      color: #fe4918;
      font-size: 40px;
    }

    #addLogo{
      font-size: 60px;
      color:#337ab7;
    }

    .fc-time-grid .fc-slats td {
      height: 3em;
    }

  </style>
</head>
<body>
  <?php
    session_start();
    include '../../header.php';
    include '../../conection.php'; //Conección a la DB

      /**
     * Se recibe un grupo por parámetro
     * En caso de ser 0, se entra en modo edición por el estudiante
     * De lo contrario realiza la consulta a partir de ese dato.
     */
    $idGrupo = $_GET["grupo"];

    if($idGrupo != 0){
      $grupo = $idGrupo;
      include '../../subHeaderFuncionarios.php';
    }else{
      $grupo = $_SESSION["grupo"];   
      include '../../subHeaderEstudiantes.php';
    }

    
    /*Codigo que carga todas las actividades de horas Tcu
     desde la base de datos para su posterior uso*/
    $query = "SELECT * FROM tigrupou_tcu.horas_tcu where grupo like $grupo;";
    $stmt = $db->prepare($query);
    $stmt -> execute();
    $result = $stmt -> fetchAll();
    /* -------------------------------------------------------------------------------- */

    /**
     * Se determina las horas totales de Tcu realizadas por un grupo
     */
    $queryHoras = "SELECT sum(numero_horas) as HORAS FROM tigrupou_tcu.horas_tcu WHERE grupo like $grupo";
    $stmt = $db->prepare($queryHoras);
    $stmt -> execute();
    $resultHoras = $stmt -> fetchAll();
    $cantidad = 0;
    foreach($resultHoras as $row){
        $cantidad = $row["HORAS"];
    }
    

    /**
     * Calculo de porcentajes de horas faltantes y horas realizadas.
     */
    $porcRealizadas = round($cantidad * 100 / 150,2);

    $restantes = 150 - $cantidad;

    if($restantes < 0){
      $restantes = 0;
    }

    $porcFaltante = round($restantes * 100 / 150,2);

    
    /**
     * Carga el cronograma de horas propuesto por los grupos
     */
    $queryCronogramaHoras = "SELECT url_cronograma_tcu FROM tigrupou_tcu.cartas_adjuntas WHERE grupo like $grupo";
    $stmt = $db->prepare($queryCronogramaHoras);
    $stmt -> execute();
    $resultCronograma = $stmt -> fetchAll();
    $urlCronograma = "";
    foreach($resultCronograma as $row){
        $urlCronograma = $row["url_cronograma_tcu"];
    }

  ?>

  <main class="site-main">
    <section class="seccion-informacion">
      <div class="contenedor clearfix">

        <div class="" id="content">
            <center><h3>Control de Horas Digital</h3></center>
            <div class="well">
            <span><meter min="0" max="150" id="meter" low="100" high="149" optimum="150" value="0" style="width:100%"></span><br>
              <span><strong >Horas Realizadas:</strong> <?php echo $cantidad . " / " . $porcRealizadas . "%" ?></span><br>
              <span><strong >Horas Pendientes:</strong> <?php echo $restantes . " / " . $porcFaltante . "%" ?> </span><br>
              <span><strong ><a href="<?php echo $urlCronograma; ?> " target="blank"><i class="fas fa-download"></i> Cronograma de Horas</a></strong> </span>
            </div>
            <div id="contenedor" class="well">
              <!-- Cargar modal agregar actividad -->
              <?php 
                if($idGrupo == 0){ ?>
                  <a href="#content" onclick="cargarModal({'fecha':_Date,'codigo':0, 'tipo': <?php echo $idGrupo ?>},'AddModalDiv','addActivity-modal','agregarActividad.php')" id="plusActivity"><i class="fas fa-plus-circle a"></i></a>
                <?php
                }
              ?>
              <!-- Aumentar Zoom -->
              <!--<a href="#content" onclick="zoom()" id="plusActivity"><i class="fas fa-search-plus a"></i></a>  -->
              <!-- Disminuir Zoom -->
              <!-- <a href="#content" onclick="zoomL(0)" id="plusActivity"><i class="fas fa-search-minus a"></i></a> -->

              <div id="calendar"></div> <!-- Se carga el calendario  -->
            </div>
            <br>
        </div><!--.programa-evento-->
      </div><!--.contenedor-->

    </section><!--.section programa-->
  </main>
  <!--
      Moda para agregar responsables a la actividad
  -->
  <div class="modal fade" id="addActivity-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="addModal_content">
        <div class="modal-header" align="center">
            <i id="addLogo" class="fas fa-calendar-plus"></i>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <div id="AddModalDiv"> <!--Div donde se carga el form para ingresar los datos de logueo-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include '../../footer.php';
  ?>

  <!--
    Includes Javascript Files
  -->

  <script src='../../fullcalendar/lib/moment.min.js'></script>
  <script src='../../fullcalendar/fullcalendar.js'></script>
  <script src='../../fullcalendar/locale/es.js'></script>
  <script src='../../fullcalendar-scheduler/scheduler.js'></script>
  <script src='../../js/calendario.js'></script>
  <script>
    setMeter(<?php echo $cantidad?>);
  </script>

  <!--
    Javascrip with FullCalendar Settings
  -->
  <script>
        /*Javascrip encargado de configurar y dar el diseño a fullCalendar  */
        //var calendarHeight = 2.5;
        var _Date;
        $(document).ready(function() {
          $('#calendar').fullCalendar({
            /*Configuración para las etiquetas de años y dias */
            monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNames:['Domingo', 'Lunes', 'Martes', 'Miércoles','Jueves', 'Viernes', 'Sábado'],

            //defaultView: 'agendaWeek',
            contentHeight:'auto',

            /*Configuración de la posición y botones y titulos al lado arriba del calendario */
            header: {
              left: '',
              center: 'title',
              right: 'month,week,prev,next,today'
            },

            /* Establecimiento de la licencia de Full Calendar */
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',

            eventLimit: false , /* Se encargar de poner un limite a los eventos que se ven por día */

           /* Utiliza las actividades cargadas desde la base de datos anteriormente y las muestra en el calendario*/

           events: [
           <?php foreach($result as $event):   /*  Result contiene el resultado de la consulta de todos los evnentos que existan*/
           $start= [$event['fecha'],$event['hora_entrada']];
           $end= [$event['fecha'],$event['hora_salida']];
           if($start[1] == '00:00:00'){
             $start = $start[0];
           }else{
             $start = $event['fecha'] . "T" . $event['hora_entrada'];
           }
           if($end[1] == '00:00:00'){
             $end = $end[0];
           }else{
             $end = $event['fecha'] . "T" . $event['hora_salida'];
           }
           ?>
           {
             id: '<?php echo $event['codigo']; ?>',
             title: '<?php echo "Horas Realizadas: " . $event['numero_horas']; ?>',
             description:'<?php echo $event['actividades_realizadas']; ?>',
             start: '<?php echo $start; ?>',
             end: '<?php echo $end; ?>'
           },
           <?php endforeach; ?>
           ],
              /* ------------------------------------------------------------------------------------------------- */


              /* Cuando el evento es clickeado, carga la página disponible para poder editar*/
              eventClick: function(calEvent, jsEvent, view) {
                cargarModal({'fecha':_Date,'codigo':calEvent.id, 'tipo': <?php echo $idGrupo ?>},'AddModalDiv','addActivity-modal','agregarActividad.php')
              },


           /* Encargado de imprimir el titulo con un mouseover sobre un evento*/
           eventRender: function(event, element) {
                 /*var cal = document.querySelectorAll(".fc-time-grid .fc-slats td");
                 //document.getElementById("myBtn").style.height = "3.5em";
                 for (var i = 0; i < cal.length; i++) {
                   cal[i].style.height = calendarHeight;
                 }*/

               $(element).tooltip({
                  title: event.title,
                  container: "body"
              });
              element.find('.fc-title').append("<br/>" + event.description);
          },

          eventColor: '#378006',

          /*Evento que se ejecuta antes de cargar la vista del calendario*/
          /*Se toma la primera fecha que muestra el calendario y se toma esto para configurar el numero de cada semana*/
          viewRender:function(view,element){
            /*var cal = document.querySelectorAll(".fc-time-grid .fc-slats td");
            //document.getElementById("myBtn").style.height = "3.5em";
            for (var i = 0; i < cal.length; i++) {
              cal[i].style.height = calendarHeight+'em';
            }*/
            var star =   $('#calendar').fullCalendar('getView').start.format('YYYY-MM-DD');/*Toma la primer fecha que tira le calendario*/
            _Date = star;
            if(view.name == "agendaDay"){
              <?php
                if($idGrupo == 0){?>
                  document.getElementById("plusActivity").style.visibility  = 'visible';/*Si el modo vista del calendario es día, pone visible el boton plus*/
                <?php
                } 
              ?>
            }
            else { /*Si el modo vista del calendario es mes se oculta el boton plus*/
              <?php
              if($idGrupo == 0){?>
                document.getElementById("plusActivity").style.visibility  = 'hidden';
              <?php
              } 
              ?>
              
            }
          },
          /*
            *Función que actua al darle clik a un día
            *Cambia modo vista a día y se desplaza a la fecha seleccionada
          */
          dayClick: function(date, jsEvent, view) {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
            $('#calendar').fullCalendar('gotoDate', date);
          },
        });
        });
        /*function zoom(){
          calendarHeight += 1;
          $('#calendar').fullCalendar('prev');
          $('#calendar').fullCalendar('next');
          alert(calendarHeight+'em')
        }*/
      </script>
</body>
</html>