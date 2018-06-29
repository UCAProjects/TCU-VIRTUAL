    /**
     * Genera animaciones a las navbar al ser
     * seleccionadas.
     **/
    $(".nav li").on("click", function() {
        $(".nav li").removeClass("active");

        $(this).addClass("active");

    });


    /**
     * Función que se encarga de utilizar las bibliotecas
     * de Zebra Dialog para generar mensajes de alert en
     * patalla, segun el tipo que lo desee el usuario.
     *
     * Param tipo: tipo de mensaje, warning, success, etc
     * Param mensaje: mensaje a ser mostrado por el alert.
     * Param duracion: duracion que será visible el mensaje.
     *Return Zebra_Dialog.
     **/
    function mensaje(tipo, mensaje, duracion = 2000) {
        new $.Zebra_Dialog(mensaje, {
            'type': tipo,
            'auto_close': duracion,
            'buttons': false,
            'modal': false,
            'position': ['right - 20', 'top + 10'],
        });
    }

    /**
     * Verifica si el estudiante a loguearse es un estudiante o un
     * funcionario, esto por medio de los radio button de selección
     * En caso de no selección ningun tipo de usuario, se desplegará
     * un mensjae de error adviertiendo que se debe realizar la selección.
     * **/
    function validarTipoUsuario() {
        var estudiante = document.getElementById('estudiante');
        var funcionario = document.getElementById('funcionario');
        if (!(estudiante.checked || funcionario.checked)) {
            mensaje("warning", "Debe Seleccionar un tipo de usuario, ya sea Estudiante o Funcionario");
            return 0;
        } else if (estudiante.checked) {
            return estudiante.value;
        } else {
            return funcionario.value;
        }
    }

    function registroUsuario() {
        var status = validarTipoUsuario();
        if (status == 1) {
            window.location.href = "vistas/registro/registro.php?tipo=0";
        } else if (status == 2) {
            window.location.href = "vistas/registro/registroFuncionarios.php?tipo=0";
        }
    }

    function login() {
        var usuario = $("#usuario").val();
        var contrasena = $("#password").val();
        var status = validarTipoUsuario();
        if (status != 0) {
            var parametros = { "usuario": usuario, "contrasena": contrasena, "tipo": status };
            $.ajax({
                data: parametros,
                type: "POST",
                url: "accesoDatos/login/login.php",
                success: function(data) {
                    if (data != "error") {
                        if (data != "false") {
                            if (data == "1") { //Estudiante Logueado
                                window.location.href = "vistas/datosProyecto/tipoGrupo.php?tipo=0";
                            } else if (data[0] == '1' && data[2] != '0') {
                                window.location.href = "vistas/principalEstudiantes/principalEstudiantes.php";
                            } else if (data[0] == '1') {
                                window.location.href = "vistas/datosProyecto/datosProyecto.php?tipo=0";
                            } else if (data == "2") { // Profesor Logueado
                                window.location.href = "vistas/principalFuncionarios/principalFuncionarios.php";
                            } else {
                                mensaje("warning", "Credenciales Incorrectas");
                            }
                        } else {
                            mensaje("error", "Error al procesar la transacción");
                        }
                    }
                },
                error: function() {
                    mensaje("error", "Error al procesar la transacción");
                }
            });
        }
    }

    function cargarModal(pParametros, pDivMostrar, pNombreModal, pUrl) {
        var param = pParametros
        var options = { "backdrop": "static", keyboard: true };
        $.ajax({
            data: param,
            type: "POST",
            url: pUrl,
            success: function(data) {
                $('#' + pDivMostrar).html(data);
                $('#' + pNombreModal).modal(options);
                $('#' + pNombreModal).modal('show');
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    }

    function reglamento() {
        var options = { "backdrop": "static", keyboard: true };
        $.ajax({
            type: "POST",
            url: "../../accesoDatos/reglamento/updateReglamento.php",
            success: function(data) {

            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    }

    function cargarFormularios(pUrl, id) {
        var options = { "backdrop": "static", keyboard: true };
        $.ajax({
            type: "GET",
            url: pUrl,
            contentType: "application/json; charset=utf-8",
            datatype: "json",
            success: function(data) {
                $('#' + id).html(data);
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    }



    function cargarFormulariosPost(pUrl, id, pParametros) {
        var param = pParametros
        var options = { "backdrop": "static", keyboard: true };
        $.ajax({
            data: param,
            type: "POST",
            url: pUrl,
            success: function(data) {
                $('#' + id).html(data);
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    }



    function aumentarProgress(value) {
        var valueMeter = $("#meter").val() + value;
        $("#meter").val(valueMeter);
        $("#" + valueMeter).addClass('active');
    }

    function disminuirProgress(value) {
        var valueMeter = $("#meter").val() - value;
        $("#meter").val(valueMeter);
        $("#" + valueMeter).addClass('active');
        for (id = valueMeter + value; id <= 100; id += value) {
            $("#" + id).removeClass('active');
        };
    }

    function guardar(numeroPagina, grupo, tipo, codAux = 0) { // Insert : 1 Insert; 2 Update
        var url = "";
        if (tipo == 1) { //Insertar AnteProyecto
            url = "../../accesoDatos/datosProyecto/insertarEditarAnteProyecto.php";
        } else if (tipo == 2) { // Insertar Resumen Ejécutivo
            url = "../../accesoDatos/resumenEjecutivo/insertarEditarResumenEjecutivo.php";
        }
        var texto = $("#" + numeroPagina).val();
        var cod = $("#hiddenCodigo").val();
        if (codAux != 0)
            cod = codAux;
        var parametros = { "codigo": cod, "numeroPagina": numeroPagina, "texto": texto, "grupo": grupo }
        $.ajax({
            data: parametros,
            type: "POST",
            url: url,
            success: function(data) {
                mensaje('information', 'Guardando..', 1000)
            },
            error: function() {
                mensaje('error', 'Error al cargar la información');
            }
        });
    };