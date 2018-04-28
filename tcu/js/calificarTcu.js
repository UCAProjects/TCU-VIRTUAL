function ingresarCalificacion(pCodigoAnteProyecto,pEstado){
  debugger;
  var observaciones = $('#txtA_observaciones').val();
  var parametros = {"estado":observaciones,"observaciones":observaciones,"ante_proyecto":pCodigoAnteProyecto};
          $.ajax({
                  data: parametros,
                  type: "POST",
                  url: "../../accesoDatos/calificarTcu/insertarCalificacionTcu.php",
                  success: function (data) {
                    mensaje('confirmation',"Se ha registrado la calificación",2000);
                    setTimeout(function(){ window.location="calificarDatosProyecto.php"; }, 2000);
                  },
                  error: function () {
                    mensaje('error','Error al cargar la información',3000);
                  }
                });
}
