var date = "";
var horaEntrante = "";
var horaSalida = "";
var cantidadHoras = "";
var actividades = "";

function getData(){
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
      var parametros = {"fecha":date,"horaEntrada":horaEntrante,"horaSalida":horaSalida,
                          "cantidadHoras":cantidadHoras,"actividades":actividades};
              $.ajax({
                      data: parametros,
                      type: "POST",
                      url: "../../accesoDatos/calendario/insertarActividad.php",
                      success: function (data) {
                        alert(data);
                        mensaje('confirmation',data,8000);
                        setTimeout(function(){ window.location="calificarDatosProyecto.php"; }, 8000);
                      },
                      error: function () {
                        mensaje('error','Error al cargar la información',3000);
                      }
                    });
  }else {
    alert("Se debe llenar toda la información");
  }
  // var param = pParametros
  // var options = { "backdrop": "static", keyboard: true };
  // $.ajax({
  //   data : param,
  //   type: "POST",
  //   url: pUrl,
  //   success: function (data) {
  //     $('#'+pDivMostrar).html(data);
  //     $('#'+pNombreModal).modal(options);
  //     $('#'+pNombreModal).modal('show');
  //   },
  //   error: function () {
  //     mensaje('error','Error al cargar la información');
  //   }
  // });
}
