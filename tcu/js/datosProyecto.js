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