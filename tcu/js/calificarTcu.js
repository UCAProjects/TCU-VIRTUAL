/** 
 * Función para calificar un Ante Proyecto o Resumen Ejecutivo de TCU
 * 
 * @author Albin Mora Valverde
 * 
 * @param pCodigoAnteProyecto  Codigo del Documento( Ante Proyecto o Resumen Ejecutivo) a calificar
 * @param pEstado Estado en que se encuentra el proyecto, aprobado, aprobado con observaciones o reprobado.
 * @param pTipo Será 1 para enteProyeco y 2 para ResumenEjecutivo.
 * @param pRol Sera 1 para Director de Carrera y 2 para Unidad de extensión.
 * @returns Nothing.
 * 
 **/
function ingresarCalificacion(pCodigoAnteProyecto, pCalificacion, pTipo, pRol, pGuardado) {
    var observaciones = $('#txtA_observaciones').val();
    alert(pEditar);
    debugger;
    var parametros = {
        "calificacion": pCalificacion,
        "observaciones": observaciones,
        "documento": pCodigoAnteProyecto,
        "tipo": pTipo,
        "rol": pRol,
        "guardado": pGuardado
    };

    $.ajax({
        data: parametros,
        type: "POST",
        url: "../../accesoDatos/calificarTcu/insertarCalificacionTcu.php",
        success: function(data) {
            if (data == "OK") {
                mensaje('confirmation', "Se ha registrado la calificación", 2000);
                var url = "calificarDatosProyecto.php?class=" + pTipo;
                setTimeout(function() { window.location = url; }, 2000);
            } else {
                mensaje('error', "Error al procesar la información, intentelo más tarde.", 2000);
            }
        },
        error: function() {
            mensaje('error', 'Error al cargar la información', 3000);
        }
    });
}

function modeLecture() {
    document.getElementById("RevisionMode").style.display = "none";
    document.getElementById("LecturaModo").style.display = "block";
}

function modeRevision() {
    document.getElementById("RevisionMode").style.display = "block";
    document.getElementById("LecturaModo").style.display = "none";
}