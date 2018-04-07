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
            <div id="contenedor" class="well">
              <a href="#" onclick="cargarModal({'fecha':_Date},'AddModalDiv','addActivity-modal','agregarActividad.php')" id="plusActivity"><i class="fas fa-plus-circle a"></i></a>
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

  <!--
    Javascrip with FullCalendar Settings
  -->
  <script>
        /*Javascrip encargado de configurar y dar el diseño a fullCalendar  */

        var _Date;
        $(document).ready(function() {
          $('#calendar').fullCalendar({
            /*Configuración para las etiquetas de años y dias */
            monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNames:['Domingo', 'Lunes', 'Martes', 'Miércoles','Jueves', 'Viernes', 'Sábado'],

            defaultView: 'agendaDay',

            /*Configuración de la posición y botones y titulos al lado arriba del calendario */
            header: {
              left: '',
              center: 'title',
              right: 'month,prev,next,today'
            },

            /* Establecimiento de la licencia de Full Calendar */
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',

            eventLimit: true, /* Se encargar de poner un limite a los eventos que se ven por día */

           /* Utiliza las actividades cargadas desde la base de datos anteriormente y las muestra en el calendario*/

            events: [
               ],
              /* ------------------------------------------------------------------------------------------------- */

           /* Encargado de imprimir el titulo con un mouseover sobre un evento*/
           eventRender: function(event, element) {
               $(element).tooltip({
                  title: event.title,
                  container: "body"
              });
          },

          /* Cuando el evento es clickeado, carga la página disponible para poder editar*/
          eventClick: function(calEvent, jsEvent, view) {
            verDetalleEvento(calEvent.id); /* función ubicada en ajax.js que se encarga de direcciónar a la pagina de edición */

          },

          /*Evento que se ejecuta antes de cargar la vista del calendario*/
          /*Se toma la primera fecha que muestra el calendario y se toma esto para configurar el numero de cada semana*/
          viewRender:function(view,element){
            var star =   $('#calendar').fullCalendar('getView').start.format('YYYY-MM-DD');/*Toma la primer fecha que tira le calendario*/
            _Date = star;
            if(view.name == "agendaDay"){
              document.getElementById("plusActivity").style.visibility  = 'visible';/*Si el modo vista del calendario es día, pone visible el boton plus*/
            }
            else { /*Si el modo vista del calendario es mes se oculta el boton plus*/
              document.getElementById("plusActivity").style.visibility  = 'hidden';
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
      </script>
</body>
</html>
