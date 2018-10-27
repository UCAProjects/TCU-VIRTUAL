$(document).ready(function() {
    $('#cedula').on('input', function() {
        $('#usuario').val($(this).val());
    });
});

function validarContrasena() {
    var contrasena = $("#contrasena").val();
    var contrasena2 = $("#contrasena2").val();
    if (contrasena == contrasena2) {
        return true;
    }
    return false;
}

$("#cedula").change(function() {
    existCed($("#cedula").val())
});

function existCed(ced) {
    var parametros = { "cedula": ced };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../../accesoDatos/registro/consultarced.php",
        success: function(data) {
            if (data == 0) {
                return false;
            } else {
                mensaje('warning', 'Ya existe un usuario asociado a esta cédula, por favor digitarla de nuevo', 5000);
                $("#cedula").val("");
                $("#usuario").val("");
                return true;
            }
        },
        error: function() {
            mensaje('error', 'Error al cargar la información', 3000);
            return true;
        }
    });
    return true;
}

function validarRegistroEstudiantes() {
    var carrera = document.getElementById("carrera");
    var valueCarrera = carrera.options[carrera.selectedIndex].value;

    var grado = document.getElementById("grado");
    var valueGrado = grado.options[grado.selectedIndex].value;

    var periodo = document.getElementById("periodo");
    var valuePeriodo = periodo.options[periodo.selectedIndex].value;

    var sede = document.getElementById("sede");
    var valueSede = sede.options[sede.selectedIndex].value;

    var cedula = $("#cedula").val();

    if (valueCarrera == 0 || valueGrado == 0 || valuePeriodo == 0 || valueSede == 0) {
        mensaje('warning', 'Datos imcopletos');
        return false;

    } else if (!validarContrasena()) {
        mensaje('warning', 'Las contraseñas no coinciden')
        return false;
    } else if (isNaN(cedula)) {
        mensaje('warning', 'La cedula no debe contener guiones, ni ningún carácter especial')
        return false;
    }else{
        var ced = $("#cedula").val();
        var parametros = { "cedula": ced };
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/registro/consultarced.php",
            success: function(data) {
                if (data == 0) {
                    break;
                } else {
                    mensaje('warning', 'Ya existe un usuario asociado a esta cédula, por favor digitarla de nuevo', 5000);
                    $("#cedula").val("");
                    $("#usuario").val("");
                    return false;
                }
            },
            error: function() {
                mensaje('error', 'Error al cargar la información', 3000);
                return false;
            }
        });
    }
    return true;
}

function validarRegistroFuncionarios() {
    if (!validarContrasena()) {
        mensaje('warning', 'Las contraseñas no coinciden')
        return false;
    }
    return true;
}

function validarEditarUsuarioContrasena(cod, tipo) {
    var contrasenaA = $('#contrasenaA').val();
    if (contrasenaA != '') {
        var parametros = { "id": cod, "tipo": tipo }
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../../accesoDatos/registro/consultasRegistro.php",
            success: function(data) {
                if (data != "Error al procesar la información") {
                    if (data != contrasenaA) {
                        mensaje('error', 'Contraseña Incorrecta');
                    } else {
                        var contrasenaN = $('#contrasenaN').val();
                        var contrasenaN2 = $('#contrasenaN2').val();
                        if (contrasenaN != "" && contrasenaN2 != "") {
                            if (contrasenaN == contrasenaN2) {
                                cambiarContrasena(cod, contrasenaN, tipo);
                            } else {
                                mensaje('error', 'Las nuevas contraseñas no coinciden');
                            }
                        } else {
                            mensaje('warning', 'Datos incompletos');
                        }
                    }
                } else {
                    mensaje('error', 'Error al procesar la información');
                }
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    } else {
        mensaje('warning', 'Datos incompletos');
    }
}

function cambiarContrasena(cod, contrasena, tipo) {
    var parametros = { "codigo": cod, "tipo": tipo, "contrasena": contrasena }
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../../accesoDatos/registro/editarUsuarioContrasena.php",
        success: function(data) {
            mensaje('information', data);
            setTimeout(location.reload(true), 3000);
        },
        error: function() {
            mensaje('error', 'Error al cargar la información');
        }
    });
}

function valueSelect(id, value) {
    $("#" + id).val(value);
}