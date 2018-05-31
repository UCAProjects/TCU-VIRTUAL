<form action="../../accesoDatos/datosProyecto/insertarAnteProyecto.php" enctype="multipart/form-data" id="insertarAnteProyecto-form" method="post">
	<label for="uploadedSolicitud">Adjuntar carta de solicitud para realización del TCU</label>
	<input name="uploadedSolicitud[]" type="file" id="uploadedSolicitud[]" accept="application/pdf"  />
	<br>
	<label for="uploadedAceptacion">Adjuntar carta de aceptación emita por la empresa donde realizará el TCU.</label>
	<input name="uploadedAceptacion[]" type="file" id="uploadedAceptacion[]" accept="application/pdf"/>
	<br>
	<label for="uploadedAceptacion">Adjuntar cronograma de realización del TCU.</label>
	<input name="uploadedCronograma[]" type="file" id="uploadedCronograma[]"/>
	<br>
	<div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-segundary" id="btn_Enviar" name="btn_Enviar"><i class="far fa-paper-plane"></i> Enviar</button>
      </div>
    </div>
</form>
