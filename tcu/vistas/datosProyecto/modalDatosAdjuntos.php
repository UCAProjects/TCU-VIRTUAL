<form action="../../accesoDatos/datosProyecto/insertarAnteProyecto.php" enctype="multipart/form-data" id="insertarAnteProyecto-form" method="post">
	<label for="uploadedSolicitud">Adjuntar carta de solicitud para realización del TCU</label>
	<input name="uploadedSolicitud[]" type="file" id="uploadedSolicitud[]" accept="application/pdf" required/>
	<br>
	<label for="uploadedAceptacion">Adjuntar carta de aceptación emitida por la institución donde realizará el TCU.</label>
	<input name="uploadedAceptacion[]" type="file" id="uploadedAceptacion[]" accept="application/pdf" required/>
	<br>
	<label for="uploadedAceptacion">Adjuntar cronograma de realización del TCU.</label>
	<input name="uploadedCronograma[]" type="file" id="uploadedCronograma[]" accept="application/pdf" required/>
	<br>
	<label class="label label-primary">Solo se admiten archivos en formato PDF. De lo contrario, no se procesarán sus documentos. </label>
	<br>
	<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-segundary" id="btn_Enviar" name="btn_Enviar"><i class="far fa-paper-plane"></i> Enviar</button>
      </div>
    </div>
</form>

<script>
	$(function(){
        $("#uploadedSolicitud").on('change', function(event) {
					alert("dd")
            var file = event.target.files[0];
            
            if(!file.type.match('image/jp.*')) {
                alert("only JPG images");
                $("#form-id").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

        });
    });
</script>
</script>