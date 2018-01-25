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
    	new $.Zebra_Dialog('Datos imcopletos',{
                      'type': 'warning',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
    	return false;
    }else if(!validarContrasena()){
    	new $.Zebra_Dialog('Las contraseñas no coinciden',{
                      'type': 'warning',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
    	return false;
    }
    return true;
}

function validarRegistroFuncionarios(){
    if(!validarContrasena()){
    	new $.Zebra_Dialog('Las contraseñas no coinciden',{
                      'type': 'warning',
                      'auto_close': 2000,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
    	return false;
    }
    return true;
}