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
                          alert("Operación realizada con éxito");
                          setTimeout(function(){ window.location="calendarioHoras.php"; }, 1000);
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

function eliminarActividad(){
  mCodigo = $("#Codigo").val();
  var parametros = {"codigo":mCodigo};
              $.ajax({
                      data: parametros,
                      type: "POST",
                      url: "../../accesoDatos/calendario/eliminarActividad.php",
                      success: function (data) {
                        if(data == "ERROR"){
                            alert("Ha ocurrido un error inesperado, intentelo nuevamente");
                        }else if(data =="OK"){
                          alert("Se ha eliminado con éxito");
                          setTimeout(function(){ window.location="calendarioHoras.php"; }, 1000);
                        }
                      },
                      error: function () {
                        mensaje('error','Error al cargar la información',3000);
                      }
                    });
}

function computeHour(){
  mInTime = $("#inTime").val();
  mOutTime = $("#outTime").val();
  if(mInTime != "" && mOutTime != ""){
    var dateI = moment(mInTime,'HH:mm');
    var dateO = moment(mOutTime,'HH:mm');
    var seconds = (dateO - dateI)/1000;
    var minuts = seconds / 60;
    var hours = minuts / 60;
    document.getElementById("quantity").value = parseFloat(hours).toFixed(2);;
  }

}
