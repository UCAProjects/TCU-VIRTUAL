(function() {
  "use strict";
  document.addEventListener('DOMContentLoaded', function() {
    function cargarModal(pParametros,pDivMostrar,pNombreModal,pUrl){
      debugger;
      var param = pParametros
      var options = { "backdrop": "static", keyboard: true };
      $.ajax({
        data : param,
        type: "POST",
        url: pUrl,
        success: function (data) {
          $(pDivMostrar).html(data);
          $(pNombreModal).modal(options);
          $(pNombreModal).modal('show');
        },
        error: function () {
          alert("Error al cargar la información");
        }
      });
    }

    function agregarInfoTabla(data){
      const row2 = agregarLineaTabla(data);
      $('#tbodyAgregarEstudiantes').append(row2);
    }

    //Crear una fila nueva en la tabla encargados
      function agregarLineaTabla(data) {
        return (
          `<tr>` +
            `<td>${data.codigo}</td>` +
            `<td>${data.cedula}</td>` +
            `<td>${data.nombre}</td>` +
             `<td>${data.apellidos}</td>` +
             `<td>${data.codigo}</td>` +
          `</tr>`
        );
      }

}); // CIERRE DE CARGA DEL DOM
})();
