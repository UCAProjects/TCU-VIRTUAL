function ingresarCalificacion(pGrupo,pCodigoAnteProyecto,pEstado){
  var observaciones = $("#txtA_observaciones").value;
  var parametros = {"estado":pEstado,"observaciones":observaciones,"grupo":pGrupo,"ante_proyecto":pCodigoAnteProyecto};
          $.ajax({
                  data: parametros,
                  type: "POST",
                  url: "../../accesoDatos/calificarTcu/insertarEditarCalificacionTcus.php",
                  success: function (data) {
                    alert(data);
                  },
                  error: function () {
                    mensaje('error','Error al cargar la información',3000);
                  }
                });
}