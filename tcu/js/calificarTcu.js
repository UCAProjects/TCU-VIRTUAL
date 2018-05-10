function ingresarCalificacion(pCodigoAnteProyecto,pEstado, pTipo){
  var observaciones = $('#txtA_observaciones').val();
  var parametros = {"estado":pEstado,"observaciones":observaciones,"documento":pCodigoAnteProyecto, "tipo": pTipo};
          $.ajax({
                  data: parametros,
                  type: "POST",
                  url: "../../accesoDatos/calificarTcu/insertarCalificacionTcu.php",
                  success: function (data) {
                    if(data == "OK"){
                      mensaje('confirmation',"Se ha registrado la calificación",2000);
                      var url = "calificarDatosProyecto.php?class=" + pTipo;
                      setTimeout(function(){ window.location=url; }, 2000);
                    }else{
                        mensaje('error',"Error al procesar la información, intentelo más tarde.",2000);
                    }
                  },
                  error: function () {
                    mensaje('error','Error al cargar la información',3000);
                  }
                });
}
