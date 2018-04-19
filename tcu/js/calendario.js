var date = "";
var horaEntrante = "";
var horaSalida = "";
var cantidadHoras = "";
var actividades = "";
var codigo = "";
var calendarHeight = "2.5em";

function getData(){
  codigo = $("#Codigo").val();
  date = $("#Fecha").val();
  horaEntrante = $("#inTime").val();
  horaSalida = $("#outTime").val();
  cantidadHoras = $("#quantity").val();
  actividades = $("#actividadesR").val();
}

function validar(){
  if(date!="" && horaEntrante!="" && horaSalida!="" && cantidadHoras !="" && actividades !=""){
    return true;
  }
  return false;
}

function agregarActividad(){
  getData();
  if(validar()){
      debugger;
      var parametros = {"codigo":codigo, "fecha":date,"horaEntrada":horaEntrante,"horaSalida":horaSalida,
                          "cantidadHoras":cantidadHoras,"actividades":actividades};
              $.ajax({
                      data: parametros,
                      type: "POST",
                      url: "../../accesoDatos/calendario/insertarActividad.php",
                      success: function (data) {
                        if(data == "ERROR"){
                            alert("Ha ocurrido un error inesperado, intentelo nuevamente");
                        }else if(data =="OK"){
                          alert("Ingreso con éxito");
                          setTimeout(function(){ window.location="calendarioHoras.php"; }, 2000);
                        }

                      },
                      error: function () {
                        mensaje('error','Error al cargar la información',3000);
                      }
                    });
  }else {
    alert("Se debe llenar toda la información");
  }

}
//Add more Zoom to calendar
function zoomM(){
  var cal = document.querySelectorAll(".fc-time-grid .fc-slats td");
  //document.getElementById("myBtn").style.height = "3.5em";
  for (var i = 0; i < cal.length; i++) {
    cal[i].style.height = calendarHeight;
}
}
//Subtract zoom to calendar.fc-time-grid .fc-slats td {
  //height: ;
function zoomL(){

}
