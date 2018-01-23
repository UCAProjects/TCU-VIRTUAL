var arrayEstudiantesSelecciondos=[];

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
        new $.Zebra_Dialog('Error al cargar la información',{
                      'type': 'error',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
      }
    });
}

function consultaCed(){
  var ced = $('#cedula').val();
  if(ced != ''){
    var parametros = {"id":ced,"tipo":1}
          $.ajax({
                  data: parametros,
                  type: "POST",
                  url: "consultasDatosProyecto.php",
                  success: function (data) {
                    if(data != 0){
                      agregarEstudianteTabla(data);   
                    }else{
                      new $.Zebra_Dialog('No se ha encontrado información que coincida con la búsqueda deseada',{
                      'type': 'warning',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
                    }
                  },
                  error: function () {
                    new $.Zebra_Dialog('Error al cargar la información',{
                      'type': 'error',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
                  }
                });
  }else{
    new $.Zebra_Dialog('Cédula no digita',{
                      'type': 'warning',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
  }
}

function agregarInfoTabla(data){
          const row2 = agregarLineaTabla(data);
          $('#tbodyAgregarEstudiantes').append(row2);
        }


//Crear una fila nueva en la tabla encargados
  function agregarLineaTabla(data) {
    return (
      `<tr id="${data.codigo}">` +
        `<td>${data.codigo}</td>` +
        `<td>${data.cedula}</td>` +
        `<td>${data.nombre}</td>` +
         `<td>${data.apellidos}</td>` +
         `<td><a onclick="eliminarElemento(${data.codigo})" ><i class="fa fa-times" aria-hidden="true"></i></a></td>` +
      `</tr>`
    );
  }
  
  function eliminarElemento(cod){
    for (var i = 0; i < arrayEstudiantesSelecciondos.length; i++) {
      if(arrayEstudiantesSelecciondos[i][0] ==cod){
        arrayEstudiantesSelecciondos.splice(i, 1);
      }
    }
    $("#" + cod).remove();
  }

  function validarEstudiantesRepetidos(cod){
    for (var i = 0; i < arrayEstudiantesSelecciondos.length; i++) {
       if(arrayEstudiantesSelecciondos[i][0] ==cod){
        return false;
      }
    }
    return true;
  }


  function cargarResultados(){
  var nombre = $('#nombre').val();
  if(nombre != ''){
    var parametros = {"id":nombre,"tipo":2};
          $.ajax({
                  data: parametros,
                  type: "POST",
                  url: "consultasDatosProyecto.php",
                  success: function (data) {
                    if(data != 0){
                      $('#resultadoBusqueda').html(data);
                    }
                    else{
                      new $.Zebra_Dialog('Error al cargar la información',{
                      'type': 'error',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
                    }
                    
                  },
                  error: function () {
                    
                  }
                });
        }
}
function agregarEstudianteTabla(datas){
  var array = datas.split(",");
  if(validarEstudiantesRepetidos(array[0])){
  arrayEstudiantesSelecciondos.push(array);
  var data = {codigo :array[0],cedula:array[1] ,nombre: array[2] ,apellidos:array[3]};
  agregarInfoTabla(data);
  new $.Zebra_Dialog('El estudiante ha sido agregado con éxito',{
        'type': 'confirmation',
        'auto_close': 2000,
        'buttons':  false,
        'modal': false,
        'position': ['right - 20', 'top + 10'],

      });
  }else{
    new $.Zebra_Dialog('El estudiante ya ha sido agregado anteriormente',{
        'type': 'warning',
        'auto_close': 2000,
        'buttons':  false,
        'modal': false,
        'position': ['right - 20', 'top + 10'],

      });
  }
}