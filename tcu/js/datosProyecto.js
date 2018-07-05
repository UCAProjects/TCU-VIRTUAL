var arrayEstudiantesSelecciondos = [];


function abandonarGrupo(cod) {
    $.Zebra_Dialog('Esta seguro que desea abandonar este grupo?', {
        'type': 'question',
        'position': ['right - 450', 'top + 150'],
        'buttons': [{
                caption: 'SI',
                callback: function() {
                    var parametros = { "id": cod, "tipo": 3 };
                    $.ajax({
                        data: parametros,
                        type: "POST",
                        url: "../../accesoDatos/datosProyecto/consultasDatosProyecto.php",
                        success: function(data) {
                            if (data != 0) {
                                mensaje('confirmation', data, 3000);

                                function redirect() {
                                    setTimeout(function() { window.location = "crearGrupo.php?tipo=0"; }, 3000);
                                }
                                redirect();
                            } else {
                                mensaje('warning', "Error al procesar la información", 3000);
                            }
                        },
                        error: function() {
                            mensaje('error', 'Error al cargar la información');
                        }
                    });
                }
            },
            { caption: 'No', callback: function() {} },
        ]
    });
}



function consultaCed(pCed = null) {
    var ced = $('#cedula').val();
    if (pCed != null) {
        ced = pCed;
    }
    if (ced != '') {
        var parametros = { "id": ced, "tipo": 1 }
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/datosProyecto/consultasDatosProyecto.php",
            success: function(data) {
                if (data != 0) {
                    agregarEstudianteTabla(data);
                } else {
                    mensaje('warning', 'No se ha encontrado información que coincida con la búsqueda deseada');
                }
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    } else {
        mensaje('warning', 'Cédula no digita');
    }
}

function agregarInfoTabla(data) {
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

function eliminarElemento(cod) {
    for (var i = 0; i < arrayEstudiantesSelecciondos.length; i++) {
        if (arrayEstudiantesSelecciondos[i][0] == cod) {
            arrayEstudiantesSelecciondos.splice(i, 1);
        }
    }
    $("#" + cod).remove();
}

function validarEstudiantesRepetidos(cod) {
    for (var i = 0; i < arrayEstudiantesSelecciondos.length; i++) {
        if (arrayEstudiantesSelecciondos[i][0] == cod) {
            return false;
        }
    }
    return true;
}


function cargarResultados() {
    var nombre = $('#nombre').val();
    if (nombre != '') {
        var parametros = { "id": nombre, "tipo": 2 };
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/datosProyecto/consultasDatosProyecto.php",
            success: function(data) {
                if (data != 0) {
                    $('#resultadoBusqueda').html(data);
                } else {
                    mensaje('error', 'Error al cargar la información');
                }

            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    }
}

function agregarEstudianteTabla(datas) {
    var array = datas.split(",");
    if (validarEstudiantesRepetidos(array[0])) {
        arrayEstudiantesSelecciondos.push(array);
        var data = { codigo: array[0], cedula: array[1], nombre: array[2], apellidos: array[3] };
        agregarInfoTabla(data);
        mensaje('confirmation', 'El estudiante ha sido agregado con éxito');
    } else {
        mensaje('warning', 'El estudiante ya ha sido agregado anteriormente');
    }
}


function agregarGrupo(tipo) {
    if (arrayEstudiantesSelecciondos.length > 0) {
        var parametros = { "estudiantes": arrayEstudiantesSelecciondos, "tipo": tipo };
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/datosProyecto/insertarEditarGrupo.php",
            success: function(data) {
                if (data == "Error al procesar la información") {
                    mensaje('error', data);
                } else {
                    if (data[0] == "N") {
                        mensaje('confirmation', data, 5000);
                    } else {
                        mensaje('confirmation', data, 3000);
                        if (tipo == 0) {
                            setTimeout(function() { window.location = "datosProyecto.php?tipo=0"; }, 3000);
                        } else {
                            setTimeout(function() { window.location = "../principalEstudiantes/principalEstudiantes.php"; }, 5000);
                        }
                    }
                }
            },
            error: function() {
                mensaje('error', 'Error al cargar la información', 3000);
            }
        });
    } else {
        mensaje('warning', 'No se han seleccionado estudiantes', 3000);
    }
}

function validateNumber() {
    var number = document.getElementById('uploadEvidencias').files.length;
    if (number != 10) {
        document.getElementById('errorLabel').innerHTML = "Recuerde que deben ser exactamente 10 las imágenes adjuntas como evidencias";
        return false;
    }
    //alert($('#uploadEvidencias input[type=file]').get(0).files.length);
}

function redirectGrupo(tipo, id) {
    debugger;
    if ($('#grupal').prop('checked')) {
        window.location.href = "crearGrupo.php?tipo=" + tipo;
    }
    if ($('#individual').prop('checked')) {
        var arrayEstudiante = [];
        var arrayEstudianteF = [];
        arrayEstudiante.push(id);
        arrayEstudiante.push(id);
        arrayEstudianteF.push(arrayEstudiante);

        var parametros = { "estudiantes": arrayEstudianteF, "tipo": tipo };
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/datosProyecto/insertarEditarGrupo.php",
            success: function(data) {
                if (data == "Error al procesar la información") {
                    mensaje('error', data);
                } else {
                    if (data[0] == "N") {
                        mensaje('confirmation', data, 5000);
                    } else {
                        mensaje('confirmation', data, 3000);
                        if (tipo == 0) {
                            setTimeout(function() { window.location = "datosProyecto.php?tipo=0"; }, 3000);
                        } else {
                            setTimeout(function() { window.location = "../principalEstudiantes/principalEstudiantes.php"; }, 5000);
                        }
                    }
                }
            },
            error: function() {
                mensaje('error', 'Error al cargar la información', 3000);
            }
        });
    }
}