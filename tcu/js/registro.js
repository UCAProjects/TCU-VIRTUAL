$( document ).ready(function() {
    $('#cedula').on('input', function() { 
      $('#usuario').val($(this).val());
    });
});

function validarContrasena(){
	var contrasena = $("#contrasena").val();
    var contrasena2 = $("#contrasena2").val();
    if(contrasena == contrasena2){
    	return true;
    }
    return false;
}

function validarRegistroEstudiantes(){
	var carrera = document.getElementById("carrera");
    var valueCarrera = carrera.options[carrera.selectedIndex].value;

    var grado = document.getElementById("grado");
    var valueGrado = grado.options[grado.selectedIndex].value;

    var periodo = document.getElementById("periodo");
    var valuePeriodo = periodo.options[periodo.selectedIndex].value;

    var sede = document.getElementById("sede");
    var valueSede = sede.options[sede.selectedIndex].value;

    if(valueCarrera == 0 || valueGrado == 0 ||valuePeriodo == 0 || valueSede == 0){
      mensaje('warning','Datos imcopletos');
    	return false;

    }else if(!validarContrasena()){
      mensaje('warning','Las contraseñas no coinciden')
    	return false;
    }
    return true;
}

function validarRegistroFuncionarios(){
    if(!validarContrasena()){
      mensaje('warning','Las contraseñas no coinciden')
    	return false;
    }
    return true;
}

function validarEditarUsuarioContrasena(cod,tipo){
  var contrasenaA = $('#contrasenaA').val();
  if(contrasenaA != ''){
      var parametros = {"id":cod,"tipo":tipo}
      $.ajax({
          data: parametros,
          type: "POST",
          url: "../../accesoDatos/registro/consultasRegistro.php",
          success: function (data) {
            if(data != "Error al procesar la información"){
              if(data != contrasenaA){
                mensaje('error','Contraseña Incorrecta');
              }else{
                var contrasenaN = $('#contrasenaN').val();
                var contrasenaN2 = $('#contrasenaN2').val();
                if(contrasenaN != "" && contrasenaN2 != ""){
                  if(contrasenaN == contrasenaN2){
                    cambiarContrasena(cod,contrasenaN,tipo);
                  }else{
                    mensaje('error','Las nuevas contraseñas no coinciden');
                  }
                }else{
                  mensaje('warning','Datos incompletos');
                }
              }
            }else{
              mensaje('error','Error al procesar la información');
            }
          },
          error: function () {
            mensaje('error','Error al cargar la información');
          }
      });
  }else{
    mensaje('warning','Datos incompletos');
  }
}

function cambiarContrasena(cod, contrasena, tipo){
  var parametros = {"codigo":cod,"tipo":tipo, "contrasena":contrasena}
  $.ajax({
          data: parametros,
          type: "POST",
          url: "../../accesoDatos/registro/editarUsuarioContrasena.php",
          success: function (data) {
            mensaje('information',data)
          },
          error: function () {
            mensaje('error','Error al cargar la información');
          }
      });
}

function valueSelect(id,value){
  $("#" + id).val(value);
}


