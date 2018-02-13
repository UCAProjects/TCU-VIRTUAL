    $(".nav li").on("click", function(){
      $(".nav li").removeClass("active");
      
      $(this).addClass("active");
     
    });


    function mensaje(tipo,mensaje,duracion = 2000){
  		new $.Zebra_Dialog(mensaje,{
                      'type': tipo,
                      'auto_close': duracion,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
    }

    function validarTipoUsuario(){
      var estudiante = document.getElementById('estudiante');
      var funcionario = document.getElementById('funcionario');

      if(!(estudiante.checked || funcionario.checked)){
       mensaje("warning","Debe Seleccionar un tipo de usuario, ya sea Estudiante o Funcionario");
       return 0;
      }else if(estudiante.checked){
        return estudiante.value;
      }else{
        return funcionario.value;  
      }
    }

    function registroUsuario(){
      var status = validarTipoUsuario();
      if(status == 1){
        window.location.href ="vistas/registro/registro.php?tipo=0";
      }else if(status == 2){
        window.location.href = "vistas/registro/registroFuncionarios.php?tipo=0";
      }
    }

    function login(){
      var usuario = $("#usuario").val();
      var contrasena = $("#password").val();
      var status = validarTipoUsuario();
      
      if(status != 0 ){
        var parametros = {"usuario":usuario,"contrasena":contrasena,"tipo":status};
        $.ajax({
          data: parametros,
          type: "POST",
          url: "accesoDatos/login/login.php",
          success:function(data){
            if(data != "error"){
              if(data != "false"){
                if(data == "1"){ //Estudiante Logueado
                  window.location.href = "vistas/datosProyecto/crearGrupo.php?tipo=0";
                }else if(data[0]== '1' && data[2] != '0'){
                  window.location.href = "vistas/principalEstudiantes/principalEstudiantes.php";
                }else if(data[0]== '1'){
                  window.location.href = "vistas/datosProyecto/datosProyecto.php?tipo=0";
                }else if(data == "2"){ // Profesor Logueado
                  window.location.href = "vistas/principalFuncionarios/principalFuncionarios.php";
                }
              }else{
                mensaje("warning","Credenciales Incorrectas");
              }
            }else{
              mensaje("error","Error al procesar la transacción");
            }
          },
          error: function () {
            mensaje("error","Error al procesar la transacción");
          }
        });
                    
      }
    }